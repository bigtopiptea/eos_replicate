<script>
import { Form } from 'vform';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import EditIcon from '../../../../Misc/Icons/EditIcon.vue';
import PlusIcon from '../../../../Misc/Icons/PlusIcon.vue';
import InputLabel from '../../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../../Misc/Input/SettingsInput.vue';
import { successMessage, errorMessage } from '@/utils/toast.js';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import axios from "axios";

export default {
    components: {
        Pagination,
        SmallHeading,
        InputLabel,
        SettingsInput,
        PlusIcon,
        EditIcon
    },
    data() {
        return {
            pickup_anywhere: new Form({
                id: "",
                ref: "OTC",
                name: "",
                provider: "",
                transaction_type_id: "",
                transaction_type: "",
            }),
            cash_pickup_anywhere: [],
            validationErrors: [],
            pagination: {
                current_page: 1,
            },
            isEdit: false,
            providers: [],
        }
    },
    methods: {
        async getTransactionTypes() {
            await axios
                .get(`/api/maintenance/transaction-type/name?ref=${this.pickup_anywhere.ref}`)
                .then((response) => {
                    const result = response.data.filter((obj) => {
                        this.pickup_anywhere.transaction_type = obj.meta_value;
                        this.pickup_anywhere.transaction_type_id = obj.id;
                    });
                });
        },
        async getCashPickupAnywhere() {
            await axios.get(`/api/maintenance/cash-pickup-anywhere?page=${this.pagination.current_page}`)
                .then((response) => {
                    this.cash_pickup_anywhere = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                });
        },
        async storePickupAnywhere() {
            await this.pickup_anywhere.post('/api/maintenance/cash-pickup-anywhere')
                .then((response) => {
                    this.getCashPickupAnywhere();
                    successMessage('Success!', response.data.message, 'top-right');
                    this.pickup_anywhere.reset();
                    this.getTransactionTypes();
                })
                .catch((errors) => {
                    errorMessage('Opps!', 'Something went wrong!', 'top-right');
                    this.validationErrors = errors.response.data.errors;
                });
        },
        async getProviders() {
            await axios.get('/api/maintenance/provider/list')
                .then((response) => {
                    this.providers = response.data
                })
        },
        editMode(otc){
            this.isEdit = true;
            this.pickup_anywhere.id = otc.otc.id;
            this.pickup_anywhere.name = otc.otc.name;
            this.pickup_anywhere.provider = otc.otc.get_provider;
        },
        updateOTC(){
            this.pickup_anywhere.put(`/api/maintenance/cash-pickup-anywhere/name/${this.pickup_anywhere.id} `)
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right');
                    this.getTransactionTypes();
                    this.getCashPickupAnywhere();
                    this.pickup_anywhere.reset();
                    this.validationErrors = [];
                    this.isEdit = false;
                }).catch((errors) => {
                    errorMessage('Opps!', 'Something went wrong!', 'top-right');
                    this.validationErrors = errors.response.data.errors;
            })
        }
    },
    created() {
        this.getCashPickupAnywhere();
        this.getTransactionTypes();
        this.getProviders();
    }
}
</script>
<template>
    <div class="w-full p-4">
        <SmallHeading label="Cash Pickup Anywhere" class="text-center" />
        <div class="bg-white p-2 shadow-md border border-gray-100 rounded-sm">
            <div class="w-full mb-4">
                <form @submit.prevent="isEdit ? updateOTC() : storePickupAnywhere()">
                    <div class="flex items-center space-x-2">
                        <div class="w-full relative">
                            <InputLabel label="Name" />
                            <label v-if="pickup_anywhere.errors.has('name')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ pickup_anywhere.errors.get('name') }}
                            </label>
                            <SettingsInput placeholder="Enter OTC Name" v-model="pickup_anywhere.name" :class="{'border border-red-500' : pickup_anywhere.errors.has('name')}"
                                           class="w-full uppercase" />
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Provider" />
                            <label v-if="pickup_anywhere.errors.has('provider')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ pickup_anywhere.errors.get('provider') }}
                            </label>
                            <v-select placeholder="Select Provider" :class="{'border-2 border-mid-red' : pickup_anywhere.errors.has('provider')}" v-model="pickup_anywhere.provider" class="border border-gray-300" :options="providers" label="name"></v-select>
                        </div>
                        <div class="w-full">
                            <InputLabel label="Transaction Type" />
                            <SettingsInput v-model="pickup_anywhere.transaction_type" disabled
                                class="w-full bg-gray-200 placeholder:text-black uppercase font-bold" />
                        </div>
                        <button
                            class="mt-6 hover:bg-[#f9951e] duration-300 text-[#f9951e] hover:text-white border-2 px-2 py-[0.04rem] border-[#f9951e]">
                            <PlusIcon v-if="!isEdit" class="w-6 h-6" />
                            <EditIcon v-else />
                        </button>
                    </div>

                </form>
            </div>
            <table class="min-w-full divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Transaction Type
                        </th>
                        <th scope="col"
                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Provider
                        </th>
                        <th scope="col"
                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Name
                        </th>
                        <th scope="col"
                            class="py-3.5 pr-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="otc in cash_pickup_anywhere" :key="biller">
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ otc.transaction_type.meta_value }}
                        </td>
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ otc.otc.get_provider.name }}
                        </td>
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ otc.otc.name }}
                        </td>
                        <td
                            class="whitespace-nowrap uppercase text-center py-4 pr-4 text-sm font-rubik-light tracking-wider">
                            <button>
                                <EditIcon @click.prevent="editMode(otc)" class="text-[#F9951E] hover:text-#3e3e3e" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination @paginate="getCashPickupAnywhere()" :pagination="pagination" :offset="5" />
    </div>
</template>
