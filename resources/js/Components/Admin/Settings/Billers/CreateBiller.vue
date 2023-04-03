<script>
import SmallHeading from '../../../Misc/Heading/SmallHeading.vue';
import InputLabel from '../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../Misc/Input/SettingsInput.vue';
import InformationCircleIcon from '../../../Misc/Icons/InformationCircle.vue';
import XmarkIcon from '../../../Misc/Icons/XmarkIcon.vue';
import NormalButton from '../../../Misc/Buttons/NormalButton.vue';
import { Form } from 'vform';
import PlusIcon from '../../../Misc/Icons/PlusIcon.vue';
import MinusIcon from '../../../Misc/Icons/MinusIcon.vue';
import { successMessage, errorMessage } from '@/utils/toast.js';
import axios from 'axios';
import SelectMenuV2 from "@/Components/Misc/Select Menu/SelectMenuV2.vue";

export default {
    components: {
        SelectMenuV2,
        SmallHeading,
        SettingsInput,
        InformationCircleIcon,
        XmarkIcon,
        NormalButton,
        PlusIcon,
        MinusIcon,
        InputLabel,
    },
    data() {
        return {
            biller_category: [],
            companies: [],
            branches: [],
            input_type: [
                { value: 1, label: 'alpha numeric', type: 'text' },
                { value: 2, label: 'email', type: 'email' },
                { value: 3, label: 'number', type: 'number' },
                { value: 4, label: 'date', type: 'date' },
                { value: 5, label: 'select', type: 'select' },
            ],
            paymentType: [
                { id: 1, label: 'One Time Charge', value: 'single', for: 'otc' },
                { id: 2, label: 'Amount Range', value: 'range', for: 'ar' },
            ],
            requiredOptions: [
                { label: 'True', },
                { label: 'False', }
            ],
            biller: new Form({
                category: '',
                name: '',
                payment_type: '',
                amount_range: [
                    {
                        from: '',
                        to: '',
                    }
                ],
                providers: '',
                fields: [],
            }),
            testProvider: [
                { value: 1, label: 'Test Provider 1' },
                { value: 2, label: 'Test Provider 2' }
            ],
            openAmountRange: false,
            validationErrors: [],
            providers: [],
        }
    },
    watch: {
        payment_type(newValue) {
            if (newValue) {
                this.openAmountRange = false;
            }
        },
    },
    methods: {
        async getBillerCategory() {
            await axios.get('/api/maintenance/biller-category/list')
                .then((response) => {
                    this.biller_category = response;
                })
                .catch((error) => {

                })
        },
        async getCompanies() {
            const response = await axios.get("/api/companies");
            this.companies = response.data;
        },
        async getBranch(company) {
            console.log(company);
            const response = await axios.get(`/api/branches/${company.value}/get`);
            this.branches = response.data;
        },
        async storeBiller() {
            await this.biller.post('/api/billers')
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right');
                    this.biller.reset();
                    this.backToBillers();
                    this.openAmountRange = false;
                })
                .catch((errors) => {
                    this.validationErrors = errors.response.data.errors;
                    errorMessage("Opps!", "Something went wrong.", "top-right");
                    // this.validationErrors.amount_range.forEach((response) => {
                    //     console.log(response);
                    // });
                })
        },
        async getProviders() {
            axios.get('/api/maintenance/provider/list')
                .then((response) => {
                    this.providers = response.data
                })
        },
        backToBillers() {
            this.$router.push("/app/settings/billers");
        },
        addFieldRow() {
            this.biller.fields.push({
                field_name: '',
                type: '',
                label: '',
                length: '',
                decimal: '',
                required: true,
            });
        },
        removeFieldRow(itemData) {
            this.biller.fields.splice(this.biller.fields.indexOf(itemData), 1);
        },
        toggleAmountRange(data) {
            data.value === "range" ? this.openAmountRange = true : this.openAmountRange = false;
        },
        addAmountRange() {
            this.biller.amount_range.push({
                from: null,
                to: null,
            });
        },
        removeAmountRange(data) {
            this.biller.amount_range.splice(this.biller.amount_range.indexOf(data), 1);
        },
        paymentTypes() {
            this.openAmountRange = false;
            this.biller.amount_range = [];
        }

    },
    created() {
        this.getBillerCategory();
        this.getCompanies();
        this.getProviders();
    }
}
</script>
<template>
    <div class="w-full border shadow-md bg-white border-white">
        <form @submit.prevent="storeBiller()">
            <div class="mt-6">
                <SmallHeading label="Biller Details" class="pl-6 w-[30%]" />
                <div class="px-4 py-2">
                    <div class="w-full">
                        <div class="flex items-center space-x-3 ">
                            <div class="w-full">
                                <InputLabel label="Biller Category" />
                                <v-select :class="{ 'border-[2px] border-mid-red': validationErrors.category }"
                                    v-model="biller.category" placeholder="Select Biller Category"
                                    :options="biller_category.data"
                                    class="w-full uppercase border border-gray-300 shadow-sm"></v-select>
                                <span class="text-mid-red uppercase text-[10px] absolute" v-if="validationErrors.category">
                                    {{ validationErrors.category[0] }}
                                </span>
                            </div>
                            <div class="w-full">
                                <InputLabel label="Biller Name" />
                                <SettingsInput :class="{ 'border border-mid-red': validationErrors.name }"
                                    v-model="biller.name" placeholder="Enter Biller Name" class="w-full uppercase" />
                                <span class="text-mid-red uppercase text-[10px] absolute" v-if="validationErrors.name">
                                    {{ validationErrors.name[0] }}
                                </span>
                            </div>

                        </div>
                        <div class="flex items-center space-x-3 ">
                            <div class="w-[30%]">
                                <InputLabel label="Providers" />
                                <v-select v-model="biller.providers" label="name" :options="providers"
                                    class="border border-gray-300">
                                </v-select>
                            </div>
                            <div>
                                <InputLabel label="Payment Type" />
                                <div class="space-x-2 flex" v-for="payment in paymentType">
                                    <input @change="payment.value === 'range' ? openAmountRange = true : paymentTypes()"
                                        v-model="biller.payment_type" type="radio" :id="payment.for" :value="payment">
                                    <label class="uppercase text-[12px] tracking-wider" :for="payment.for">
                                        {{ payment.label }}
                                    </label>
                                </div>
                            </div>
                            <div class="absolute w-[30%] left-[55rem]">
                                <Transition>
                                    <div v-if="openAmountRange"
                                        class=" mt-4 relative bg-white border border-gray-300 shadow-sm">
                                        <div class="w-full flex items-center justify-end space-x-2 p-2">
                                            <SmallHeading label="Amount Range" class="text-center w-full " />
                                            <button v-if="this.biller.amount_range.length > 1"
                                                @click.prevent="removeAmountRange(index)"
                                                class="duration-300 font-bold text-mid-red border-mid-red hover:bg-mid-red hover:text-white border-[3px] py-[4.5px] p-2">
                                                <MinusIcon class="h-5" />
                                            </button>
                                            <button @click.prevent="addAmountRange"
                                                class="duration-300 font-bold text-[#f0921e] border-[#F9951E] hover:bg-#F9951E hover:text-white border-[3px] py-[4.5px] p-2">
                                                <PlusIcon class="h-5" />
                                            </button>
                                        </div>
                                        <div class="w-full flex items-center space-x-3 px-2 pb-2"
                                            v-for="(amount_range, index) in biller.amount_range">
                                            <div class="w-full">
                                                <InputLabel label="From" />
                                                <SettingsInput v-model="amount_range.from" placeholder="Enter Amount Range"
                                                    class="w-full uppercase" />
                                            </div>
                                            <div class="w-full">
                                                <InputLabel label="To   " />
                                                <SettingsInput v-model="amount_range.to" placeholder="Enter Amount Range"
                                                    class="w-full uppercase" />
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center p-2 space-x-3">
                                            <NormalButton @click.prevent="openAmountRange = false" label="Close"
                                                class="duration-300 h-8 w-[30%] font-bold text-[12px] tracking-widest uppercase bg-[#3e3e3e] text-white border-[#3e3e3e] hover:bg-[#1e1d1d] hover:text-white border-[3px]" />
                                        </div>
                                    </div>
                                </Transition>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <SmallHeading label="Custom Fields" class="pl-6 w-[30%]" />
                    <!-- add if needed border-b-[2px] border-gray-200-->
                    <div class="flex justify-between mb-4 px-4">
                        <button></button>
                        <NormalButton @click.prevent="addFieldRow()" label="Add Field"
                            class="font-rubik-light tracking-widest uppercase text-[14px] border-[3px] px-4 py-2 duration-300 font-bold text-[#f0921e] border-[#F9951E] hover:bg-#F9951E hover:text-white" />
                    </div>
                </div>
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="inline-block min-w-full py-4 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="px-2 py-3 whitespace-nowrap uppercase tracking-wider font-rubik-light text-center text-[12px] font-bold text-gray-900">
                                            Field ID
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 uppercase tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-gray-900">
                                            Field Name
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 w-[20%] uppercase whitespace-nowrap tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-gray-900">
                                            type
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 uppercase tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-gray-900">
                                            Label
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 uppercase whitespace-nowrap tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-gray-900">
                                            Length
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 text-center uppercase tracking-wider font-rubik-light  text-[12px] font-semibold text-gray-900">
                                            Mandatory
                                        </th>
                                        <th scope="col"
                                            class="px-2 py-3 uppercase tracking-wider font-rubik-light text-[12px] font-semibold text-gray-900">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="(itemField, index) in biller.fields" :key="index"
                                        class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap uppercase py-3 px-2 text-center text-sm font-rubik-light tracking-wider">
                                            {{ index + 1 }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                            <SettingsInput v-model="itemField.field_name" placeholder="Enter Field Name"
                                                class="w-full uppercase font-rubik-light" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                            <!--                                        <SelectMenuV2 />-->
                                            <select v-model="itemField.type"
                                                class="w-full p-[.5rem] uppercase tracking-wider text-[12px] bg-white border border-gray-300">
                                                <option class="after:text-uppercase" v-for="input in input_type"
                                                    :value="input">
                                                    {{ input.label }}
                                                </option>
                                            </select>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                            <SettingsInput v-model="itemField.label" placeholder="Enter Label"
                                                class="w-full uppercase font-rubik-light" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap flex space-x-2 uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                            <SettingsInput v-model="itemField.length" placeholder="Enter Length"
                                                class="w-full uppercase font-rubik-light" />

                                            <SettingsInput v-model="itemField.decimal"
                                                v-if="itemField.type.type === 'number'" placeholder="Enter Decimal"
                                                class="w-full uppercase font-rubik-light" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-center py-3 px-2 text-sm font-rubik-light tracking-wider">
                                            <input v-model="itemField.required" id="helper-checkbox"
                                                aria-describedby="helper-checkbox-text" type="checkbox" class="w-4 h-4">
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                            <button @click.prevent="removeFieldRow(index)">
                                                <XmarkIcon class="hover:text-white bg-white text-mid-red border border-mid-red
                                                                             hover:bg-mid-red rounded-full " />
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="px-4 space-x-5 text-center my-[36px]">
                <a @click="backToBillers()" type="submit"
                    class="border-[3px] hover:cursor-pointer transition ease-in-out delay-150 hover:translate-y-1 duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 px-20 text-sm font-medium text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Close
                </a>

                <NormalButton type="submit" label="save"
                    class="border-[3px] transition ease-in-out delay-150 hover:translate-y-1 duration-300 hover:border-[#F26400] border-#F9951E bg-white py-2 px-20 text-sm font-medium text-[#F9951E] uppercase tracking-widest shadow-sm hover:bg-[#F26400] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" />
            </div>
        </form>
    </div>
</template>
<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
