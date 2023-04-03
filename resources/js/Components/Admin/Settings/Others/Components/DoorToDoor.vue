<script>
import { Form } from 'vform';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import PlusIcon from '../../../../Misc/Icons/PlusIcon.vue';
import InputLabel from '../../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../../Misc/Input/SettingsInput.vue';
import { successMessage, errorMessage } from '@/utils/toast.js';
import axios from 'axios';
import EditIcon from '../../../../Misc/Icons/EditIcon.vue';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";

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
            dtd: new Form({
                id: '',
                ref: "DTD",
                name: "",
                provider: "",
                transaction_type_id: "",
                transaction_type: "",
            }),
            door_to_doors: [],
            validationErrors: [],
            pagination: {
                current_page: 1,
            },
            providers: [],
            editMode: false,
        }
    },
    methods: {
        async getTransactionTypes() {
            await axios
                .get(`/api/maintenance/transaction-type/name?ref=${this.dtd.ref}`)
                .then((response) => {
                    const result = response.data.filter((obj) => {
                        this.dtd.transaction_type = obj.meta_value
                        this.dtd.transaction_type_id = obj.id;
                    });
                });
        },
        async getDoortoDoors() {
            await axios.get(`/api/maintenance/door-to-door?page=${this.pagination.current_page}`)
                .then((response) => {
                    this.door_to_doors = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                });
        },
        async storeDoorToDoor() {
            await this.dtd.post('/api/maintenance/door-to-door')
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right');
                    this.getDoortoDoors();
                    this.dtd.reset();
                    this.validationErrors = [];
                    this.getTransactionTypes();
                })
                .catch((errors) => {
                    errorMessage('Opps!', 'Something went wrong in door to door', 'top-right');
                    this.validationErrors = errors.response.data.errors;
                })
        },
        async getProviders() {
            await axios.get('/api/maintenance/provider/list')
                .then((response) => {
                    this.providers = response.data
                })
        },
        editDoorToDoor(dtd){
            this.editMode = true;
            this.validationErrors = [];
            this.dtd.name = dtd.dtd.name;
            this.dtd.id = dtd.dtd.id;
            this.dtd.provider = dtd.dtd.get_provider;
        },
        updateDoorToDoor(){
            this.dtd.put(`/api/maintenance/door-to-door/name/${this.dtd.id}`)
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right');
                    this.getDoortoDoors();
                    this.editMode = false;
                    this.dtd.reset();
                    this.getTransactionTypes();
                }).catch((errors) => {
                    errorMessage('Opps!', 'Something went wrong in door to door', 'top-right');
                    this.validationErrors = errors.response.data.errors;
            })
        }
    },
    created() {
        this.getDoortoDoors();
        this.getTransactionTypes();
        this.getProviders();
    }
}
</script>
<template>
    <div class="w-full p-4">
        <SmallHeading label="Door to Door" class="text-center" />
        <div class="bg-white p-2 shadow-md border border-gray-100 rounded-sm">
            <div class="w-full mb-4">
                <form @submit.prevent="editMode ? updateDoorToDoor() : storeDoorToDoor()">
                    <div class="flex items-center space-x-2">
                        <div class="w-full relative">
                            <InputLabel label="Name" />
                            <label v-if="dtd.errors.has('name')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ dtd.errors.get('name') }}
                            </label>
                            <SettingsInput placeholder="Enter Door to Door name" :class="{'border border-red-500' : dtd.errors.has('name')}"
                                           class="w-full uppercase" v-model="dtd.name" />
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Provider" />
                            <label v-if="dtd.errors.has('provider')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ dtd.errors.get('provider') }}
                            </label>
                            <v-select placeholder="Select Provider" :class="{'border-2 border-mid-red' : dtd.errors.has('provider')}" v-model="dtd.provider" class="border border-gray-300" :options="providers" label="name"></v-select>
                        </div>
                        <input hidden type="text" v-model="dtd.transaction_type_id" />
                        <div class="w-full">
                            <InputLabel label="Transaction Type" />
                            <SettingsInput v-model="dtd.transaction_type" disabled
                                class="w-full bg-gray-200 placeholder:text-black uppercase font-bold" />
                        </div>
                        <button
                            class="mt-6 hover:bg-[#f9951e] duration-300 text-[#f9951e] hover:text-white border-2 px-2 py-[0.04rem] border-[#f9951e]">
                            <PlusIcon v-if="!editMode"  class="w-6 h-6" />
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
                    <tr v-for="door_to_door in door_to_doors" :key="door_to_door.id">
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ door_to_door.transaction_type.meta_value}}
                        </td>
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ door_to_door.dtd.get_provider.name}}
                        </td>
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ door_to_door.dtd.name }}
                        </td>
                        <td
                            class="whitespace-nowrap uppercase text-center py-4 pr-4 text-sm font-rubik-light tracking-wider">
                            <button>
                                <EditIcon @click="editDoorToDoor(door_to_door)" class="text-[#F9951E] hover:text-#3e3e3e" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination @paginate="getDoortoDoors()" :pagination="pagination" :offset="5" />
    </div>
</template>
