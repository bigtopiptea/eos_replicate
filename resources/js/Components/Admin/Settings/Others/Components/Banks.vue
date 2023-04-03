<script>
import { Form } from "vform";
import EditIcon from "../../../../Misc/Icons/EditIcon.vue";
import PlusIcon from "../../../../Misc/Icons/PlusIcon.vue";
import InputLabel from "../../../../Misc/Input/InputLabel.vue";
import SettingsInput from "../../../../Misc/Input/SettingsInput.vue";
import { successMessage, errorMessage } from "@/utils/toast.js";
import SmallHeading from "../../../../Misc/Heading/SmallHeading.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import MinusIcon from "@/Components/Misc/Icons/MinusIcon.vue";
import XmarkIcon from "@/Components/Misc/Icons/XmarkIcon.vue";
import store from "@/store";

export default {
    components: {
        XmarkIcon,
        MinusIcon,
        Slideover,
        NormalButton,
        Pagination,
        InputLabel,
        SettingsInput,
        PlusIcon,
        EditIcon,
        SmallHeading,
    },
    data() {
        return {
            bank: new Form({
                id: '',
                code_id: '',
                ref: "CBA",
                meta_id: "",
                meta_value: "",
                payment_type: "",
                transaction_type_id: "",
                provider: "",
                amount_range: [
                    {
                        from: null,
                        to: null,
                    }
                ],
            }),
            banks: [],
            bankErrors: [],
            isBankEdit: false,
            pagination: {
                current_page: 1,
            },
            slideoverOpen: false,
            providers: [],
            paymentType: [
                { id: 1, label: 'One Time Charge', value: 'single', for: 'otc' },
                { id: 2, label: 'Amount Range', value: 'range', for: 'ar' },
            ],
            openAmountRange: false,
        };
    },
    methods: {
        //bank start
        async getBanks() {
            await axios
                .get(`/api/maintenance/bank?page=${this.pagination.current_page}`)
                .then((response) => {
                    this.banks = response.data.data;
                    this.pagination = response.data;
                    this.getTransactionTypes();
                })
                .catch((error) => { });
        },
        async storeBank() {
            await this.bank
                .post("/api/maintenance/bank")
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.slideoverOpen = false;
                    this.getBanks();
                    this.bank.reset();
                    this.bankErrors = [];
                })
                .catch((errors) => {
                    errorMessage(
                        "Opps!",
                        "Something went wrong in adding a bank.",
                        "top-right"
                    );
                    this.bankErrors = errors.response.data.errors;
                });
        },
        editBank(bank) {
            this.slideoverOpen = true;
            this.isBankEdit = true;
            this.bank.id = bank.id
            this.bank.code_id = bank.biller_name.id;
            this.bank.provider = bank.biller_name.get_provider;
            this.bank.meta_value = bank.biller_name.name;
            this.bank.meta_id = bank.meta_id;
            this.bank.payment_type = bank.biller_name.payment_type;

            const amountRange = JSON.parse(bank.biller_name.amount_range);

            let result = amountRange.map((range) => {
                return range;
            });

            this.bank.amount_range = result;
        },
        async updateBank() {
            await this.bank.put(`/api/maintenance/bank/${this.bank.id}`, this.bank)
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.slideoverOpen = false;
                    this.isBankEdit = false;
                    this.getBanks();
                    this.bank.reset();
                    this.bankErrors = [];
                })
                .catch((errors) => {
                    console.log(errors);
                    errorMessage(
                        "Opps!",
                        "Something went wrong in updating a bank.",
                        "top-right"
                    );
                    this.bankErrors = errors.response.data.errors;

                });
        },
        //end bank
        async getTransactionTypes() {
            await axios
                .get(`/api/maintenance/transaction-type/name?ref=${this.bank.ref}`)
                .then((response) => {
                    const result = response.data.filter((obj) => {
                        this.bank.transaction_type = obj.meta_value;
                        this.bank.transaction_type_id = obj.id;
                    });
                });
        },
        async getProviders() {
            axios.get('/api/maintenance/provider/list')
                .then((response) => {
                    this.providers = response.data
                })
        },
        paymentTypes() {
            this.openAmountRange = false;
        },
        addAmountRange() {
            this.bank.amount_range.push({
                from: null,
                to: null,
            });
        },
        removeAmountRange(data) {
            this.bank.amount_range.splice(this.bank.amount_range.indexOf(data), 1);
        },
        closeSlider() {
            this.slideoverOpen = false;
            // this.bank.reset();
            this.paymentTypes();
            this.bankErrors = [];
        }
    },
    created() {
        this.getBanks();
        this.getTransactionTypes();
        this.getProviders();
    },
};
</script>
<template>
    <div class="w-full p-4">
        <div class="my-4 float-right mx-2 ">
            <NormalButton @click="slideoverOpen = true" label="Add New Bank"
                class="border bg-[#F9951E] text-white stracking-widest px-4 py-2 uppercase text-[11px] duration-300 bg-gradient-to-r hover:from-red-500" />
        </div>
        <Slideover :title="isBankEdit ? 'Edit Bank' : 'Create New Bank'" @close="closeSlider" :show="slideoverOpen">
            <div>
                <form @submit.prevent="isBankEdit ? updateBank() : storeBank()">
                    <div class="w-full relative">
                        <InputLabel label="Bank Code" />
                        <label v-if="bankErrors.meta_id"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ bankErrors.meta_id[0] }}
                        </label>
                        <SettingsInput v-model="bank.meta_id" :class="bankErrors.meta_id ? 'border border-red-500' : ''"
                            class="w-full uppercase" placeholder="Enter Bank Code (BDO, AUB)" />
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Bank name" />
                        <label v-if="bankErrors.meta_value"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ bankErrors.meta_value[0] }}
                        </label>
                        <SettingsInput v-model="bank.meta_value"
                            :class="bankErrors.meta_value ? 'border border-red-500' : ''" class="w-full uppercase"
                            placeholder="Enter Bank Name (Banco de Oro, Asian United Bank)" />
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Provider" />
                        <label v-if="bankErrors.provider"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ bankErrors.provider[0] }}
                        </label>
                        <v-select v-model="bank.provider" :class="bankErrors.provider ? 'border-2 border-red-500' : ''"
                            label="name" :options="providers" placeholder="Select Provider"
                            class="w-full border border-gray-300" />
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Payment Type" />
                        <label v-if="bankErrors.payment_type"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ bankErrors.payment_type[0] }}
                        </label>
                        <div class="flex space-x-3">
                            <div class="space-x-1" v-for="payment in paymentType">
                                <input @change="payment.value === 'range' ? openAmountRange = true : paymentTypes()"
                                    v-model="bank.payment_type" type="radio" :id="payment.for" :value="payment.label">
                                <label class="uppercase text-[10px] tracking-wider" :for="payment.for">
                                    {{ payment.label }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-4 items-center absolute bottom-0 inset-x-0">
                        <a @click="closeSlider()" type="submit"
                            class="border-[3px] hover:cursor-pointer transition ease-in-out delay-150 hover:translate-y-1 duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 px-14 text-sm font-medium text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Close
                        </a>
                        <NormalButton type="submit" :label="isBankEdit ? 'update' : 'save'"
                            class="border-[3px] transition ease-in-out
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        delay-150 hover:translate-y-1 duration-300
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        hover:border-[#F26400] border-#F9951E bg-white
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        py-2 px-14 text-sm font-medium text-[#F9951E]
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        uppercase tracking-widest shadow-sm hover:bg-[#F26400]
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        hover:text-white focus:outline-none focus:ring-2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        focus:ring-indigo-500 focus:ring-offset-2" />
                    </div>
                    <Transition>
                        <div v-if="openAmountRange || bank.payment_type === 'Amount Range'"
                            class="mt-4 relative bg-white h-64 overflow-y-scroll shadow-sm">
                            <div class="flex">
                                <div class="w-full flex items-center space-x-2 p-2">
                                    <button @click.prevent="openAmountRange = false;"
                                        class="duration-300 font-bold text-[#3e3e3e] border-[#3e3e3e] hover:bg-[#3e3e3e] hover:text-white border-[3px] py-[4.5px] p-2">
                                        <XmarkIcon class="h-5" />
                                    </button>
                                </div>
                                <div class="w-full flex items-center justify-end space-x-2 p-2">
                                    <button @click.prevent="removeAmountRange(index)"
                                        v-if="this.bank.amount_range.length > 1"
                                        class="duration-300 font-bold text-mid-red border-mid-red hover:bg-mid-red hover:text-white border-[3px] py-[4.5px] p-2">
                                        <MinusIcon class="h-5" />
                                    </button>
                                    <button @click.prevent="addAmountRange"
                                        class="duration-300 font-bold text-[#f0921e] border-[#F9951E] hover:bg-#F9951E hover:text-white border-[3px] py-[4.5px] p-2">
                                        <PlusIcon class="h-5" />
                                    </button>
                                </div>
                            </div>
                            <div class="w-full flex items-center space-x-3 px-2 pb-2"
                                v-for="(amount_range, index) in bank.amount_range">
                                <div class="w-full relative">
                                    <InputLabel label="From" />
                                    <SettingsInput
                                        :class="bank.errors.has('amount_range.' + index + '.from') ? 'border border-red-500' : ''"
                                        v-model="amount_range.from" placeholder="Enter Amount Range"
                                        class="w-full uppercase" />
                                    <label v-if="bank.errors.has('amount_range.' + index + '.from')"
                                        class="text-[8px] absolute right-0 uppercase text-red-500 tracking-widest">
                                        {{ bank.errors.get('amount_range.' + index + '.from') }}
                                    </label>
                                </div>
                                <div class="w-full relative">
                                    <InputLabel label="To" />
                                    <SettingsInput
                                        :class="bank.errors.has('amount_range.' + index + '.to') ? 'border border-red-500' : ''"
                                        v-model="amount_range.to" placeholder="Enter Amount Range"
                                        class="w-full uppercase" />
                                    <label v-if="bank.errors.has('amount_range.' + index + '.to')"
                                        class="text-[8px] absolute right-0 uppercase text-red-500 tracking-widest">
                                        {{ bank.errors.get('amount_range.' + index + '.to') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </Transition>
                </form>
            </div>

        </Slideover>
        <div class="bg-white p-2 shadow-md border border-gray-100 rounded-sm">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Bank Code
                        </th>
                        <th scope="col"
                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Bank Name
                        </th>
                        <th scope="col"
                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                            Provider
                        </th>
                        <th scope="col"
                            class="py-3.5 pr-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr v-for="bank in banks" :key="bank">
                        <td class="whitespace-nowrap uppercase pl-4 py-2 text-sm font-rubik-light tracking-wider">
                            {{ bank.meta_id }}
                        </td>
                        <td class="whitespace-nowrap uppercase pl-4 py-2 text-sm font-rubik-light tracking-wider">
                            {{ bank.biller_name.name }}
                        </td>
                        <td class="whitespace-nowrap uppercase pl-4 py-2 text-sm font-rubik-light tracking-wider">
                            {{ bank.biller_name.get_provider.name }}
                        </td>
                        <td
                            class="whitespace-nowrap uppercase text-center py-2 pr-4 text-sm font-rubik-light tracking-wider">
                            <button>
                                <EditIcon @click.prevent="editBank(bank)" class="text-[#3e3e3e] hover:text-#F9951E" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="banks.length < 0" class="text-center mt-5">
                <h1 class="text-[#3e3e3e] font-rubik-light uppercase tracking-widest">
                    No Items in the Banks Table
                </h1>
            </div>
        </div>
        <Pagination @paginate="getBanks" :pagination="pagination" :offset="5" class="mt-4" />
    </div>
</template>
