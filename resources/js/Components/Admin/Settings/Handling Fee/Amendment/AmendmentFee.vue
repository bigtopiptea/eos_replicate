<script>
import { Form } from 'vform';
import NormalButton from '../../../../Misc/Buttons/NormalButton.vue';
import SearchIcon from '../../../../Misc/Icons/SearchIcon.vue';
import InputLabel from '../../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../../Misc/Input/SettingsInput.vue';
import Slideover from '../../../../Misc/Slideover/Slideover.vue';
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";

import { successMessage, errorMessage } from '@/utils/toast.js';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";

export default {
    name: 'Service Fee',
    components: {
        Pagination,
        EditIcon,
        InputLabel,
        NormalButton,
        SearchIcon,
        SettingsInput,
        Slideover
    },
    data() {
        return {
            slideoverOpen: false,
            service_fee: new Form({
                tie_up: "",
                transaction_type: "",
                bank_or_biller_name: "",
                currency: "",
                service_fee: "",
            }),
            currencies: [],
            transaction_type: [],
            billers: [],
            getBillers: [],
            validationErrors: [],
            pagination: {
                current_page: 1,
            },
            handlingFeeCurrencies: [],
            queryField: '',
            user: this.$store.state.auth.user.company_name,
            bulk_action: [
                { label: 'Service Fee', value: 1 }
            ],
            isOpen: false,
            selectedAction: '',
            selectedIds: [],
            fee: '',
            tie_up: '',
        }
    },
    watch: {
        queryField(newValue) {
            this.getAllBillers(newValue);
        },
        selectedAction(newValue) {
            if (newValue === null) {
                this.isOpen = false;
            }
        }
    },
    methods: {
        async getAllBillers(option) {
            this.$Progress.start();
            if (this.tie_up) {
                this.pagination.current_page = 1;
            }
            await axios.get(`/api/biller-type/list?page=${this.pagination.current_page}`, {
                params: {
                    queryField: option ? this.queryField.label : null,
                    tie_up: this.tie_up
                }
            }).then((response) => {
                this.getBillers = response.data.data;
                this.pagination = response.data;
                this.$Progress.finish();
            });
        },
        async storeServiceFee() {
            await this.service_fee.post('/api/service_fee/store')
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right')
                    this.slideoverOpen = false;
                    this.getAllBillers();
                    this.service_fee.reset();
                    this.getHandlingFeeCurrencies();
                })
                .catch((errors) => {
                    errorMessage('Opps!', 'Something went wrong.', 'top-right');
                    this.validationErrors = errors.response.data.errors;
                })
        },
        async getCountryCurrency() {
            await axios.get('/api/country/currency')
                .then((response) => {
                    this.currencies = response.data;
                })
                .catch((errors) => [

                ]);
        },
        async getTransactionTypes() {
            await axios.get('/api/maintenance/transaction_type/list')
                .then((response) => {
                    this.transaction_type = response.data;
                })
        },
        async getBillerByTransactionType(transaction_type) {
            await axios.get(`/api/biller-type/list/${transaction_type.value}`)
                .then((response) => {
                    this.billers = response.data;
                });
        },
        async getHandlingFeeCurrencies() {
            await axios.get('/api/handling-fee/currency')
                .then((response) => {
                    this.handlingFeeCurrencies = response.data;
                })
        },
        async updateMultipleServiceFee() {
            await axios.put('/api/service-fee/update', {
                ids: this.selectedIds,
                service_fee: this.fee,
            }).then((response) => {
                this.getAllBillers();
                successMessage('Success!', response.data.message, 'top-right');
            }).catch((errors) => {
                errorMessage('Opps!', 'Something went wrong.', 'top-right');
            })
        },
        getUserCompanyId() {
            this.service_fee.tie_up = this.user.id;
        },
        closeSlideOver() {
            this.slideoverOpen = false;
            this.validationErrors = [];
        },
        selectedBulkOption() {
            if (this.selectedAction.label === 'Service Fee') {
                this.isOpen = true;
            }
        },
        selectAll() {
            if (this.allSelected) {
                this.selectedIds = this.getBillers.map(item => item.id);
            } else {
                this.selectedIds = [];
            }
        },
        computed: {
            allSelected: {
                get: function () {
                    if (this.getBillers) {
                        return this.getBillers.length === this.selectedIds.length;
                    }
                },
                set(value) {
                    if (value) {
                        this.selectedIds = this.getBillers.map(item => item.id);
                    } else {
                        this.selectedIds = [];
                    }
                }
            }
        },
    },
    created() {
        this.getAllBillers();
        this.getCountryCurrency();
        this.getTransactionTypes();
        this.getHandlingFeeCurrencies();
    },
}
</script>
<template>
    <vue-progress-bar></vue-progress-bar>
    <Slideover :show="slideoverOpen" @close="closeSlideOver" title="Add new Service Fee">
        <form @submit.prevent="storeServiceFee()">
            <div class="absolute inset-0 px-10">
                <div class="w-full my-4">
                    <InputLabel label="Tie-up Partner" />
                    <v-select @option:selected="getUserCompanyId" class="border border-gray-300 shadow-sm"
                        :class="{ 'border-[2px] border-mid-red': validationErrors.tie_up }" :options="user.name"
                        placeholder="Select Tie-Up partner">
                    </v-select>
                    <span v-if="validationErrors.tie_up"
                        class="text-[10px] absolute uppercase text-red-500 tracking-widest">
                        {{ validationErrors.tie_up[0] }}
                    </span>
                </div>
                <div class="w-full my-4">
                    <InputLabel label="Transaction Type" />
                    <v-select class="border border-gray-300 shadow-sm"
                        :class="{ 'border-[2px] border-mid-red': validationErrors.transaction_type }"
                        @option:selected="getBillerByTransactionType" :options="transaction_type"
                        v-model="service_fee.transaction_type" placeholder="Select Transaction Type">
                    </v-select>
                    <span v-if="validationErrors.transaction_type"
                        class="text-[10px] absolute uppercase text-red-500 tracking-widest">
                        {{ validationErrors.transaction_type[0] }}
                    </span>
                </div>
                <div class="w-full my-4">
                    <InputLabel label="Bank/Biller Name" />
                    <v-select class="border border-gray-300 shadow-sm"
                        :class="{ 'border-[2px]  border-mid-red': validationErrors.bank_or_biller_name }"
                        :options="billers" v-model="service_fee.bank_or_biller_name"
                        placeholder="Select Bank/Biller Name"></v-select>
                    <span v-if="validationErrors.bank_or_biller_name"
                        class="text-[10px] absolute uppercase text-red-500 tracking-widest">
                        {{ validationErrors.bank_or_biller_name[0] }}
                    </span>
                </div>
                <div class="w-full my-4 ">
                    <InputLabel label="Currency" />
                    <v-select class="border border-gray-300 shadow-sm"
                        :class="{ 'border-[2px] border-mid-red': validationErrors.currency }" :options="currencies"
                        v-model="service_fee.currency" placeholder="Select Currency"></v-select>
                    <span v-if="validationErrors.currency"
                        class="text-[10px] absolute uppercase text-red-500 tracking-widest">
                        {{ validationErrors.currency[0] }}
                    </span>
                </div>
                <div class="w-full">
                    <InputLabel label="Service Fee" />
                    <SettingsInput :class="{ 'border border-mid-red': validationErrors.service_fee }"
                        v-model="service_fee.service_fee" class="w-full uppercase" placeholder="Enter Service Fee" />
                    <span v-if="validationErrors.service_fee"
                        class="text-[10px] absolute uppercase text-red-500 tracking-widest">
                        {{ validationErrors.service_fee[0] }}
                    </span>
                </div>
                <div class="flex items-center space-x-4 relative top-24">
                    <a @click.prevent="closeSlideOver()" class="border-[3px] text-center hover:cursor-pointer transition ease-in-out delay-150 hover:translate-y-1
                        duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 w-full text-sm font-medium
                        text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d]
                        hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Close
                    </a>
                    <NormalButton label="Save"
                        class="border-[3px] transition ease-in-out delay-150 hover:translate-y-1 duration-300 hover:border-[#F26400] border-#F9951E bg-white py-2 w-full text-sm font-medium text-[#F9951E] uppercase tracking-widest shadow-sm hover:bg-[#F26400] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" />
                </div>
            </div>
        </form>
    </Slideover>
    <div>
        <div class="flex items-center justify-between px-8 mt-4">
            <div v-if="this.$store.state.auth.user.role === 'admin'" class="w-full">
                <InputLabel label="Tie-up Partner" />
                <v-select placeholder="Select Tie-up Partner"
                    class="w-[20%] border border-gray-300 shadow-sm"></v-select>
            </div>
            <div v-if="this.$store.state.auth.user.role !== 'admin'" class="w-full">
                <NormalButton @click="slideoverOpen = !slideoverOpen" label="Add New Service Fee"
                    class="h-[40px] text-[14px] text-[#F9951E] float-right font-rubik-light duration-300 hover:bg-[#f78c0c] hover:text-white w-[200px] uppercase tracking-wider border-[3px] border-[#F9951E]" />
            </div>
        </div>
        <div class="flex items-center justify-between px-8">
            <div class="w-full">
                <InputLabel label="Currency" />
                <v-select @option:selected="getAllBillers" v-model="queryField" :options="handlingFeeCurrencies"
                    placeholder="Sort By Currency" class="w-[20%] border border-gray-300 shadow-sm"></v-select>
            </div>

        </div>
        <div class="flex items-center justify-between px-8 mt-6">
            <div class="w-full flex items-center space-x-4">
                <v-select v-model="selectedAction" @option:selected="selectedBulkOption" :options="bulk_action"
                    placeholder="Bulk Action" class="w-[40%] border border-gray-300 shadow-sm"></v-select>
                <div v-if="isOpen">
                    <form class="-mt-6 flex items-center space-x-2" @submit.prevent="updateMultipleServiceFee()">
                        <div>
                            <InputLabel label="Service Fee" />
                            <SettingsInput v-model="fee" placeholder="Enter Service Fee" class="w-full uppercase " />
                        </div>
                        <div class="mt-[24.5px]">
                            <NormalButton label="Apply"
                                class="duration-300 text-sm hover:bg-[#e6922b] border border-[rgb(237,145,33)] tracking-wider bg-[rgb(239,133,4)] py-[7px] px-4 text-white uppercase font-rubik-light" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full">
                <form class="flex items-center w-[80%] float-right">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <SearchIcon />
                        </div>
                        <input v-model="tie_up" type="text" id="simple-search"
                            class="bg-gray-50 h-[40px] border border-r-0 border-gray-300 text-gray-900 text-sm block w-full pl-10 p-2.5"
                            placeholder="Search" required />
                    </div>
                    <NormalButton @click.prevent="getAllBillers" label="Go"
                        class="p-1.5 px-3 uppercase h-[40px] bg-[#F9951E] text-sm font-medium text-white" />
                    <NormalButton label="Export" :class="{ 'hidden': !selectedIds.length }"
                        class="p-1.5 px-3 uppercase h-[40px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                </form>
            </div>
        </div>
        <div class="inline-block min-w-full py-4 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#D7D7D7]">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col"
                                class="p-4  space-x-3 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                <input v-model="allSelected" @change="selectAll" type="checkbox" />
                                <span>
                                    Transaction Type
                                </span>
                            </th>
                            <th scope="col"
                                class="p-4 uppercase whitespace-nowrap tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                Bank Name/Biller name
                            </th>
                            <th v-if="this.$store.state.auth.user.role === 'admin'" scope="col"
                                class="p-4 uppercase whitespace-nowrap tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                                Tie-up name
                            </th>
                            <th scope="col"
                                class="p-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                                Currency
                            </th>
                            <th scope="col"
                                class="p-4  uppercase whitespace-nowrap tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                                Service Fee
                            </th>
                            <th scope="col"
                                class="p-4  text-center uppercase tracking-wider font-rubik-light text-sm font-semibold text-gray-900">
                                Last Updated
                            </th>
                            <th scope="col"
                                class="p-4  uppercase whitespace-nowrap tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                                Last Updated By
                            </th>
                            <th scope="col"
                                class="p-4  uppercase tracking-wider font-rubik-light  text-sm font-semibold text-gray-900">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="biller in getBillers" class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap space-x-4 uppercase p-4 text-sm font-rubik-light tracking-wider">
                                <input v-model="selectedIds" :value="biller.id" type="checkbox" />
                                <span>
                                    {{ biller.transaction_type.meta_value }}
                                </span>
                            </td>
                            <td
                                class="whitespace-nowrap text-left uppercase p-4 text-sm font-rubik-light tracking-wider">
                                {{ biller.get_biller.name }}
                            </td>
                            <td v-if="this.$store.state.auth.user.role === 'admin'"
                                class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                {{ biller.get_company.name }}
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                {{ biller.currency }}
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                {{ biller.service_fee }}
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                {{ $moment(biller.created_at).format('MMMM D YYYY, h:mm:ss a') }}
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                {{ biller.get_user.first_name }} {{ biller.get_user.last_name }}
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                <button>
                                    <EditIcon class="text-[#f0921e] h-5" />
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination @paginate="getAllBillers" :pagination="pagination" :offset="5" class="mt-5" />
        </div>
    </div>
</template>
