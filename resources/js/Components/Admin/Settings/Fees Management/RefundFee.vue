<script>
import axios from 'axios';
import NormalButton from '../../../Misc/Buttons/NormalButton.vue';
import CheckIcon from '../../../Misc/Icons/CheckIcon.vue';
import EditIcon from '../../../Misc/Icons/EditIcon.vue';
import PlusIcon from '../../../Misc/Icons/PlusIcon.vue';
import SearchIcon from '../../../Misc/Icons/SearchIcon.vue';
import SettingsInput from '../../../Misc/Input/SettingsInput.vue';
import InputLabel from '../../../Misc/Input/InputLabel.vue';
import Pagination from '../../../Misc/Pagination/Pagination.vue';
import { successMessage, errorMessage } from '@/utils/toast.js';
import SelectMenu from "@/Components/Misc/Select Menu/SelectMenu.vue";
import Swal from "sweetalert2";
export default {
    name: 'Fees',
    components: {
        SelectMenu,
        NormalButton,
        SearchIcon,
        EditIcon,
        PlusIcon,
        CheckIcon,
        SettingsInput,
        InputLabel,
        Pagination,
    },
    data() {
        return {
            fees_data: [],
            selected: null,
            pagination: {
                current_page: 1,
            },
            branch_currency: [],
            queryField: '',
            selectedIds: [],
            refund_fee: '',
            bulk_action: [
                {
                    value: 1,
                    label: 'Service Fee'
                }
            ],
            isOpen: false,
            selectedAction: '',
            error: [],
            search: '',
        }
    },
    methods: {
        async getFees(option) {
            this.$Progress.start();
            if (option) {
                console.log('options', option.label);
            }
            await axios.get(`/api/fees?page=${this.fees_data.current_page}`, {
                params: {
                    queryField: option ? this.queryField.label : null,
                    search: this.search,
                }
            }).then((response) => {
                this.fees_data = response.data;
                this.pagination = response.data;
                this.selectedIds = [];
                this.$Progress.finish();
            }).catch((errors) => {
                this.$Progress.fail();
            })
        },
        async updateAmount(id, amount) {
            Swal.fire({
                title: 'Are you sure you want to logout?',
                icon: 'warning',
                iconColor: 'rgba(238, 62, 44, 1)',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Apply!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put(`/api/fees/service-fee/${id}`, {
                        refund_fee: amount
                    }).then((response) => {
                        successMessage('Success!', response.data.message, 'top-right');
                    }).catch((errors) => {

                    })
                    this.selected = null;
                    this.getFees();
                }
            })
        },
        async getBranchCurrency() {
            await axios.get('/api/fees/branch-currency')
                .then((response) => {
                    this.branch_currency = response.data;
                });
        },
        async updateMultipleServiceFee() {
            Swal.fire({
                title: 'Are you sure you want to update?',
                icon: 'warning',
                iconColor: 'rgba(238, 62, 44, 1)',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Apply!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put("/api/fees/update/refund-fees", {
                        ids: this.selectedIds,
                        refund_fee: this.refund_fee,
                    }).then((response) => {
                        if (this.selectedIds.length === 0) {
                            errorMessage("Opps!", "Something went wrong.", "top-right");
                            let message = '';
                            this.error = [
                                message = 'Select item to update service fee'
                            ];
                        } else {
                            successMessage('Success!', response.data.message, 'top-right');
                            this.getFees();
                            this.refund_fee = "";
                            this.error = [];
                        }
                    }).catch((errors) => {
                        errorMessage("Opps!", "Something went wrong.", "top-right");
                        if (errors.response.status === 422) {
                            this.error = errors.response.data.errors;
                        }
                    });
                }
            })

        },
        editAmount(id) {
            this.selected = id;
        },
        selectAll() {
            if (this.allSelected) {
                this.selectedIds = this.fees_data.data.map(item => item.id);
            } else {
                this.selectedIds = [];
            }
        },
        openServiceFee() {
            if (this.selectedAction.label === 'Service Fee') {
                this.isOpen = true;
            }
        },
    },
    created() {
        this.getFees()
        this.getBranchCurrency();
    },
    watch: {
        queryField(newValue) {
            this.getFees(newValue);
        },
        selectedAction(newValue) {
            if (newValue === null) {
                this.isOpen = false;
                this.selectedIds = [];
            }
        }
    },
    computed: {
        allSelected: {
            get: function () {
                if (this.fees_data.data) {
                    return this.fees_data.data.length === this.selectedIds.length;
                }
            },
            set(value) {
                if (value) {
                    this.selectedIds = this.fees_data.data.map(item => item.id);
                } else {
                    this.selectedIds = [];
                }
            }
        },
    },
}
</script>

<template>
    <div class="w-full border shadow-md bg-white border-white">
        <div class="flex items-center justify-between px-8 mt-4">
            <div class="w-full">
                <InputLabel label="Currency" />
                <v-select @option:selected="getFees" v-model="queryField" label="label" :options="branch_currency"
                    placeholder="Sort By Currency" class="w-[30%] border border-gray-300 shadow-sm"></v-select>
            </div>
            <div class="w-full">
                <form class="flex items-center justify-end mr-4">
                    <div class="relative w-[50%]">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <SearchIcon />
                        </div>
                        <input v-model="search" type="text" id="simple-search"
                            class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                            placeholder="Search" />
                    </div>
                    <NormalButton @click.prevent="getFees" label="Go"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                    <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                </form>
            </div>
        </div>
        <div class="flex items-center justify-between px-8 mt-6">
            <div class="w-full flex items-center space-x-4">
                <v-select v-model="selectedAction" @option:selected="openServiceFee()" :options="bulk_action"
                    placeholder="Bulk Action" class="w-[15%] border border-gray-300 shadow-sm"></v-select>
                <form @submit.prevent="updateMultipleServiceFee()">
                    <div v-if="isOpen" class="-mt-6 flex items-center space-x-2">
                        <div>
                            <InputLabel label="Service Fee" />
                            <SettingsInput :class="{ 'border border-mid-red': error.refund_fee || error[0] }"
                                v-model="refund_fee" placeholder="Enter Service Fee" class="w-full uppercase" />
                            <span class="text-mid-red uppercase text-[10px] absolute" v-if="error.refund_fee">
                                {{ error.refund_fee[0] }}
                            </span>
                            <span class="text-mid-red uppercase text-[10px] absolute">
                                {{ error[0]}}
                            </span>
                        </div>
                        <div class="mt-[24.5px]">
                            <NormalButton label="Apply"
                                class="duration-300 text-sm hover:bg-[#e6922b] border border-[rgb(237,145,33)] tracking-wider bg-[rgb(239,133,4)] py-[7px] px-4 text-white uppercase font-rubik-light" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-4 flex flex-col">
                <div class="mb-8 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">

                                <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="p-2 whitespace-nowrap space-x-3 uppercase tracking-wider font-rubik-light text-left text-[12px] font-semibold text-gray-900">
                                            <input v-model="allSelected" @change="selectAll" type="checkbox" />
                                            <span>Transaction Type</span>
                                        </th>
                                        <th scope="col"
                                            class="p-2 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-[12px] font-semibold text-gray-900">
                                            Bank Name/Biller Name
                                        </th>
                                        <th scope="col"
                                            class="p-2 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-[12px] font-semibold text-gray-900">
                                            Currency
                                        </th>
                                        <th scope="col"
                                            class="p-2 whitespace-nowrap uppercase tracking-wider font-rubik-light text-[12px] font-semibold text-gray-900">
                                            Refund Fee
                                        </th>
                                        <th scope="col"
                                            class="p-2 text-left whitespace-nowrap uppercase tracking-wider font-rubik-light text-[12px] font-semibold text-gray-900">
                                            Last Date Updated
                                        </th>
                                        <th scope="col"
                                            class="p-2 text-left whitespace-nowrap uppercase tracking-wider font-rubik-light text-[12px] font-semibold text-gray-900">
                                            Last Updated By
                                        </th>
                                        <th scope="col"
                                            class="p-2 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-[12px] font-semibold text-gray-900">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="item in fees_data.data" :key="item.id" class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap space-x-3 uppercase p-2 text-[12px] font-rubik-light tracking-wider">
                                            <input v-model="selectedIds" :value="item.id" type="checkbox" />
                                            <span>
                                                {{ item.biller.transaction_type.meta_value }}
                                            </span>
                                        </td>
                                        <td class="uppercase p-2 text-[12px] font-rubik-light tracking-wider">
                                            {{ item.biller.name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase p-2 text-[12px] font-rubik-light tracking-wider">
                                            {{ item.currency }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-right uppercase p-2 text-[12px] font-rubik-light tracking-wider">
                                            <span v-if="selected != item.id">{{ item.refund_fee }}</span>
                                            <form @submit.prevent="updateAmount(item.id, item.refund_fee)" v-else>
                                                <div class="relative -left-[4.99rem] -top-3">
                                                    <input type="double" v-model="item.refund_fee"
                                                        class="absolute text-center border-2 border-[#F9951E] w-full font-rubik-light py-1" />
                                                </div>
                                            </form>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-2 text-center text-[12px] font-rubik-light tracking-wider">
                                            {{
                                                item.updated_at ?
                                                    $moment(item.updated_at).format('MMMM D YYYY, h:mm:ss a')
                                                    : ''
                                            }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-left uppercase p-2 text-[12px] font-rubik-light tracking-wider">
                                            {{ item.fullname.last_name }}, {{ item.fullname.first_name }} {{
                                                item.fullname.middle_name
                                            }}
                                        </td>


                                        <td class="text-center uppercase p-2 text-sm font-rubik-light tracking-wider">
                                            <button v-if="selected != item.id" @click.prevent="editAmount(item.id)">
                                                <EditIcon class="text-[#f0921e] h-5" />
                                            </button>
                                            <button @click.prevent="updateAmount(item.id, item.refund_fee)"
                                                class="bg-green-500 rounded-full text-white " v-else>
                                                <CheckIcon class="h-[20px] w-[20px] " />
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <Pagination @paginate="getFees()" v-if="pagination.last_page > 1" :pagination="pagination"
                        :offset="5" />
                </div>
            </div>
        </div>
    </div>
    <vue-progress-bar></vue-progress-bar>
</template>
