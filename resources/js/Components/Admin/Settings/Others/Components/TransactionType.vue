<script>
import { Form } from 'vform';

import InputLabel from '../../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../../Misc/Input/SettingsInput.vue';
import PlusIcon from '../../../../Misc/Icons/PlusIcon.vue';
import EditIcon from '../../../../Misc/Icons/EditIcon.vue';
import { successMessage, errorMessage } from '@/utils/toast.js';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";

export default {
    components: {
        Pagination,
        InputLabel,
        SettingsInput,
        PlusIcon,
        EditIcon,
        SmallHeading
    },
    data() {
        return {
            transaction: new Form({
                id: "",
                meta_id: "",
                meta_name: 'TRANSACTION_TYPE',
                meta_value: '',
            }),
            transactions: [],
            isTransactionEdit: false,
            transactionTypeErrors: [],
            pagination: {
                current_page: 1,
            }
        }
    },
    methods: {
        //transaction type start
        async getTransactionTypes() {
            await axios.get(`/api/maintenance/transaction-type?page=${this.pagination.current_page}`)
                .then((response) => {
                    this.transactions = response.data.data;
                    this.pagination = response.data;
                })
        },
        async storeTransactionType() {
            await this.transaction.post('/api/maintenance/transaction-type')
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right')
                    this.getTransactionTypes()
                    this.transaction.reset();
                    this.transactionTypeErrors = [];
                })
                .catch((errors) => {
                    this.transactionTypeErrors = errors.response.data.errors;
                    errorMessage('Opps!', 'Something went wrong in adding a transaction type.', 'top-right')
                })
        },
        async updateTransactionType() {
            await axios.put(`/api/maintenance/transaction-type/${this.transaction.id}`, this.transaction)
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right');
                    this.getTransactionTypes();
                    this.transaction.reset();
                    this.transactionTypeErrors = [];
                    this.isTransactionEdit = false;
                })
                .catch((errors) => {
                    this.transactionTypeErrors = errors.response.data.errors;
                    errorMessage('Opps!', 'Something went wrong in updating transaction type.', 'top-right')
                });

        },
        editTransactionType(transaction) {
            this.transaction.id = transaction.value;
            this.transaction.meta_id = transaction.abbrevation;
            this.transaction.meta_value = transaction.label;
        },
        //transaction type end
    },
    created() {
        this.getTransactionTypes();
    }
}
</script>
<template>
    <div class="w-full p-4">
        <SmallHeading label="Transaction Type" class="text-center" />
        <div class="bg-white p-2 shadow-md border border-gray-100 rounded-sm">
            <div class="w-full mb-4">
                <form @submit.prevent="isTransactionEdit ? updateTransactionType() : storeTransactionType()">
                    <div class="flex items-center space-x-2">
                        <div class="w-full relative">
                            <InputLabel label="Abbrevation" />
                            <label v-if="transaction.errors.has('meta_id')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ transaction.errors.get('meta_id') }}
                            </label>
                            <SettingsInput :class="transaction.errors.has('meta_id') ? 'border border-red-500' : ''"
                                v-model="transaction.meta_id" class="uppercase w-full"
                                placeholder="Enter Abbrevation" />
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Transaction Type" />
                            <label v-if="transaction.errors.has('meta_value')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ transaction.errors.get('meta_value') }}
                            </label>
                            <SettingsInput :class="transaction.errors.has('meta_value') ? 'border border-red-500' : ''"
                                v-model="transaction.meta_value" class="uppercase w-full"
                                placeholder="Enter Transaction Type" />
                        </div>
                        <button
                            class="mt-6 hover:bg-[#f9951e] duration-300 text-[#f9951e] hover:text-white border-2 px-2 py-[0.04rem] border-[#f9951e]">
                            <PlusIcon v-if="!isTransactionEdit" class="w-6 h-6" />
                            <EditIcon v-else class="w-6 h-6" />
                        </button>
                    </div>
                </form>
            </div>
            <table class="min-w-full divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 space-x-3 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Abbrevation
                        </th>
                        <th scope="col"
                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Transaction Type
                        </th>
                        <th scope="col"
                            class="py-3.5 pr-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="transaction in transactions" :key="transaction">
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ transaction.abbrevation }}
                        </td>
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ transaction.label }}
                        </td>
                        <td
                            class="whitespace-nowrap uppercase text-center py- pr-4 text-sm font-rubik-light tracking-wider">
                            <button>
                                <EditIcon @click.prevent="editTransactionType(transaction), isTransactionEdit = true"
                                    class="text-[#3e3e3e] hover:text-#F9951E" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="transactions.length < 0" class="text-center mt-5">
                <h1 class="text-[#3e3e3e] font-rubik-light uppercase tracking-widest">No Items
                    in the
                    Transactions Table
                </h1>
            </div>
        </div>
        <Pagination @paginate="getTransactionTypes" :pagination="pagination" :offset="5" />
    </div>
</template>
