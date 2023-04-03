<script>
import axios from "axios";
import { Form } from "vform";
import NormalButton from "../../../../Misc/Buttons/NormalButton.vue";
import SmallHeading from "../../../../Misc/Heading/SmallHeading.vue";
import EditIcon from "../../../../Misc/Icons/EditIcon.vue";
import PlusIcon from "../../../../Misc/Icons/PlusIcon.vue";
import SearchIcon from "../../../../Misc/Icons/SearchIcon.vue";
import InputLabel from "../../../../Misc/Input/InputLabel.vue";
import SettingsInput from "../../../../Misc/Input/SettingsInput.vue";
import CircleCheckIcon from "../../../../Misc/Icons/CircleCheckIcon.vue";
import { successMessage, errorMessage } from '@/utils/toast.js';
import Pagination from "../../../../Misc/Pagination/Pagination.vue";

export default {
    components: {
        SearchIcon,
        NormalButton,
        EditIcon,
        SmallHeading,
        SettingsInput,
        InputLabel,
        PlusIcon,
        CircleCheckIcon,
        Pagination
    },
    data() {
        return {
            biller: new Form({
                id: '',
                ref: "BILLER_CATEGORY",
                transaction_type: "",
                meta_value: "",
                transaction_type_id: "",
            }),
            transactions: [],
            billers: [],
            isBillerCategoryEdit: false,
            billerCategoryErrors: [],
            pagination: {
                current_page: 1,
            },
        };
    },
    methods: {
        async getBillerCategory() {
            await axios
                .get(`/api/maintenance/biller-category?page=${this.pagination.current_page}`)
                .then((response) => {
                    this.billers = response.data.data;
                    this.pagination = response.data;
                    this.getTransactionTypes();
                })
                .catch((error) => { });
        },
        async storeBillerCategory() {
            await this.biller
                .post("/api/maintenance/biller-category")
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right')
                    this.getBillerCategory();
                    this.biller.reset();
                    this.billerCategoryErrors = [];
                })
                .catch((errors) => {
                    this.billerCategoryErrors = errors.response.data.errors;
                    errorMessage('Opps!', 'Something went wrong in adding biller category', 'top-right');
                });
        },
        async updateBillerCategory() {
            console.log(this.biller);
            await axios.put(`/api/maintenance/biller-category/${this.biller.id}`, this.biller)
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right');
                    this.getBillerCategory();
                    this.biller.reset();
                    this.isBillerCategoryEdit = false;
                    this.billerCategoryErrors = [];
                })
                .catch((errors) => {
                    errorMessage('Opps!', 'Something went wrong in updating biller category', 'top-right');
                    this.billerCategoryErrors = errors.response.data.errors;
                })
        },

        //transaction type start
        async getTransactionTypes() {
            await axios
                .get('/api/maintenance/transaction-type/name?ref=' + 'BP')
                .then((response) => {
                    const result = response.data.filter((obj) => {
                        this.biller.transaction_type_id = obj.id;
                        this.biller.transaction_type = obj.meta_value;
                    });
                });
        },

        editBillerCategory(biller) {
            console.log(biller);
            this.biller.id = biller.value;
            this.biller.meta_value = biller.category
        },
        selectedTransactionType() {
            this.biller.transaction_type = this.biller.transaction_type.label;
        },
    },
    mounted() { },
    created() {
        this.getTransactionTypes();
        this.getBillerCategory();
    },
};
</script>
<template>
    <!--  -->
    <div class="w-full p-4">
        <SmallHeading label="Biller category" class="text-center" />
        <div class="bg-white p-2 shadow-md border border-gray-100 rounded-sm">
            <div class="w-full mb-4">
                <form @submit.prevent="isBillerCategoryEdit ? updateBillerCategory() : storeBillerCategory()">
                    <div class="flex items-center space-x-2">
                        <div class="w-full">
                            <InputLabel label="Biller Category" />
                            <SettingsInput :class="billerCategoryErrors.meta_value ? 'border border-red-500' : ''"
                                v-model="biller.meta_value" class="uppercase w-full"
                                placeholder="Enter Category Name" />
                            <span v-if="billerCategoryErrors.meta_value"
                                class="text-xs absolute uppercase text-red-500 tracking-widest">
                                {{ billerCategoryErrors.meta_value[0] }}
                            </span>
                        </div>
                        <div class="w-full">
                            <input hidden type="text" v-model="biller.transaction_type_id" />
                            <InputLabel label="Transaction Type" />
                            <SettingsInput v-model="biller.transaction_type" disabled
                                class="w-full bg-gray-200 placeholder:text-black uppercase font-bold" />
                            <span v-if="billerCategoryErrors.transaction_type"
                                class="text-xs absolute uppercase text-red-500 tracking-widest">
                                {{ billerCategoryErrors.transaction_type[0] }}
                            </span>
                        </div>
                        <button
                            class="mt-6 hover:bg-[#f9951e] duration-300 text-[#f9951e] hover:text-white border-2 px-2 py-[0.04rem] border-[#f9951e]">
                            <PlusIcon v-if="!isBillerCategoryEdit" class="w-6 h-6" />
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
                            Biller Category Name
                        </th>
                        <th scope="col"
                            class="py-3.5 pr-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="biller in billers" :key="biller">
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ biller.transaction_type.meta_value }}
                        </td>
                        <td class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                            {{ biller.label }}
                        </td>
                        <td
                            class="whitespace-nowrap uppercase text-center py-4 pr-4 text-sm font-rubik-light tracking-wider">
                            <button>
                                <EditIcon @click.prevent="
                                    editBillerCategory(biller),
                                    (isBillerCategoryEdit = true)
                                " class="text-[#3e3e3e] hover:text-#F9951E" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="!billers" class="text-center mt-5">
                <h1 class="text-[#3e3e3e] font-rubik-light uppercase tracking-widest">
                    No Items in the billers Table
                </h1>
            </div>
        </div>
        <Pagination @paginate="getBillerCategory()" :offset="5" :pagination="pagination" />
    </div>
    <!-- -->
</template>
