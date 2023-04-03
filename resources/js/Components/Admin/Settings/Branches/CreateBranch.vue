<script>
import Title from "@/Components/Misc/Section/Title.vue";
import ImageUploadIcon from "../../../Misc/Icons/ImageUploadIcon.vue";
import SettingsInput from "../../../Misc/Input/SettingsInput.vue";
import SelectMenu from "../../../Misc/Select Menu/SelectMenu.vue";
import SmallHeading from "../../../Misc/Heading/SmallHeading.vue";
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import CompanySelectMenu from "../../../Misc/Select Menu/CompanySelectMenu.vue";
import PlusIcon from "../../../Misc/Icons/PlusIcon.vue";
import MinusIcon from "../../../Misc/Icons/MinusIcon.vue";
import ExclaMationCircleIcon from "../../../Misc/Icons/ExclamationCircleIcon.vue";
import InputLabel from "../../../Misc/Input/InputLabel.vue";
import ErrorMessage from "../../../Misc/Form Validation/ErrorMessage.vue";

import { Form } from "vform";
import axios from "axios";
import moment from "moment";

import { errorMessage, successMessage } from '@/utils/toast.js';


export default {
    components: {
        Title,
        ImageUploadIcon,
        SettingsInput,
        SelectMenu,
        SmallHeading,
        NormalBtn,
        CompanySelectMenu,
        PlusIcon,
        MinusIcon,
        ErrorMessage,
        ExclaMationCircleIcon,
        InputLabel,
    },
    data() {
        return {
            form: Form.make({
                logo: "",
                company: "",
                branch_id: "",
                type_of_charging: "",
                type_of_fee: "",
                branch_name: "",
                contact_no: "",
                branch_address: "",
                country: "",
                city: "",
                region: "",
                province: "",
                reference_number: "",
                preview_reference_number: "",
                zip_code: "",
                currencies: [
                    {
                        from_currency: null,
                        to_currency: null,
                    },
                    {
                        from_currency: null,
                        to_currency: null,
                    },
                ],
                user_id: this.$store.state.auth.user.id
            }),
            status: [{ name: "active" }, { name: "in-active" }],
            type_of_fee: [
                { value: 1, label: 'Percentage' },
                { value: 2, label: 'Fixed Amount' }
            ],
            type_of_charging: [
                { value: 1, label: 'Add (BILLING)', title: 'add' },
                { value: 2, label: 'Less (BENE-DEDUCT)', title: 'less' },
            ],
            currency: [],
            partnerCode: "",
            companies: [],
            countries: [],
            states: [],
            provinces: [],
            cities: [],
            formattedDate: "",
            count: 1,
            url: null,
            errors: [],
        };
    },
    methods: {
        async getCompanies() {
            const response = await axios.get("/api/companies");
            this.companies = response.data;
        },
        async getCountries() {
            axios.get("/api/country/list")
                .then((response) => (this.countries = response.data));
        },
        async getStatesByCountry(country) {
            await axios.get(`/api/state/${country.value}/list`)
                .then((response) => {
                    this.states = response.data;

                })
                .catch((errors) => [

                ]);
        },
        async getProvinces(region) {
            await axios.get(`/api/province/${region.country_id}/${region.value}/${region.fips_code}/list`)
                .then((response) => {
                    this.provinces = response.data;

                })
                .catch((errors) => [

                ]);
        },
        async getCityByProvince(province) {
            await axios.get(`/api/city/${province.iso2}/list`)
                .then((response) => {
                    this.cities = response.data;

                })
                .catch((errors) => [

                ]);
        },
        async getCountryCurrency() {
            await axios.get('/api/country/currency')
                .then((response) => {
                    this.currency = response.data;

                })
                .catch((errors) => [

                ]);
        },
        async storeBranch() {
            await this.form
                .post("/api/branches")
                .then((response) => {
                    successMessage('Success!', response.data.message, 'top-right')
                    this.returnBranch();
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        errorMessage('Opps!', 'Something went wrong.', 'top-right')
                        this.errors = error.response.data.errors;
                    }
                });
        },
        generateBranchId() {
            let company_name = this.form.company.name;
            this.form.branch_id = company_name.split(" ").map(word => word.charAt(0)).join("")
                + '-' + this.form.branch_name.split(" ").map(word => word.charAt(0)).join("");
        },
        reference_number() {
            let dateNow = Date.now();
            this.formattedDate = moment(dateNow).format("MDY");

            if (this.form.reference_number === "") {
                this.form.preview_reference_number = "";
            } else {
                this.form.preview_reference_number =
                    this.form.reference_number + '-' + this.formattedDate + '-' + '0001';
            }
        },
        pickFile() {
            let input = this.$refs.fileBranchPix;
            let file = input.files;

            if (file && file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.url = e.target.result;
                    this.form.logo = e.target.result;
                };
                reader.readAsDataURL(file[0]);
                this.$emit("input", file[0]);
            }
        },
        addSelection() {
            this.form.currencies.push({
                from_currency: null,
                to_currency: null,
            });
        },
        removeSelection(index) {
            this.form.currencies.splice(index, 1);
        },
        returnBranch() {
            this.$router.push("/app/settings/branch");
        },
    },
    async created() { },
    async mounted() {
        await this.getCompanies();
        await this.getCountries();
        await this.getCountryCurrency();
    },
};
</script>
<template>
    <div class="w-full border shadow-md bg-white border-white h-screen">
        <form @submit.prevent="storeBranch()">
            <div class="grid grid-cols-2">
                <div class="flex p-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <span v-if="!url"
                                class="relative h-28 w-28 overflow-hidden rounded-full bg-[#ECECEC] flex justify-center items-center">
                                <ImageUploadIcon class="h-8" />
                            </span>
                            <img class="m-auto  h-20" :src="url" />
                        </div>
                        <div class="text-left">
                            <div class="text-[10px]  mb-4">
                                <p>MAX. FILE SIZE: <strong>1MB</strong></p>
                                <p>SUPPORTED FILE TYPES: <strong>JPG, JPEG, PNG</strong></p>
                            </div>
                            <input type="file" id="files" class="hidden" @change="pickFile" accept="image/*"
                                ref="fileBranchPix" />
                            <label
                                class="text-white transition ease-in-out delay-150 hover:translate-y-1 duration-300
                                                                                                                                                                 hover:border-[#F26400] tracking-wider hover:text-white bg-[#F9951E] text-[12px] uppercase
                                                                                                                                                                 font-bold py-1 px-6 hover:cursor-pointer border-[3px] border-[#F9951E]"
                                for="files">
                                Upload
                            </label>
                        </div>
                    </div>
                </div>
                <!-- company -->
                <div class="p-4 ml-40">
                    <div class="w-full relative">
                        <InputLabel label="Company" />
                        <label v-if="form.errors.has('company')"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ form.errors.get('company') }}
                        </label>
                        <v-select label="name" @option:selected="generateBranchId"
                            :class="{ 'border-mid-red border-2': form.errors.has('company') }" v-model="form.company"
                            placeholder="Select Company" class="border w-full border-gray-300"
                            :options="companies"></v-select>
                        <!-- {{ form }} -->
                        <!-- <v-select label="name" :class="{ 'border-mid-red border-2': form.errors.has('company') }"
                                                                                                                                v-model="form.company" placeholder="Select Company" class="border w-full border-gray-300"
                                                                                                                                :options="companies"></v-select> -->
                    </div>
                    <div class="w-full">
                        <InputLabel label="Branch Id" />
                        <div class="flex w-full items-center">
                            <SettingsInput v-model="form.branch_id" disabled placeholder="[Auto-Generated]"
                                class="uppercase bg-[#eaeaea] placeholder:text-black w-full text-center placeholder:text-[10px]" />
                        </div>
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Type of Charging" />
                        <label v-if="form.errors.has('type_of_charging')"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ form.errors.get('type_of_charging') }}
                        </label>
                        <v-select :class="{ 'border-mid-red border-2': form.errors.has('type_of_charging') }"
                            v-model="form.type_of_charging" placeholder="SELECT TYPE OF CHARGING TO CUSTOMERS"
                            class="border w-full border-gray-300" :options="type_of_charging"></v-select>
                    </div>
                    <div class="w-full relative">
                        <InputLabel label="Type of Fee" />
                        <label v-if="form.errors.has('type_of_fee')"
                            class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                            {{ form.errors.get('type_of_fee') }}
                        </label>
                        <v-select :class="{ 'border-mid-red border-2': form.errors.has('type_of_fee') }"
                            v-model="form.type_of_fee" placeholder="SELECT TYPE OF FEE"
                            class="border w-full border-gray-300" :options="type_of_fee"></v-select>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <SmallHeading label="Branch Details" class="text-center w-[20%] text-[12px]" />
                <div class="p-4">
                    <div class="flex space-x-4 px-4 ">
                        <div class="w-full relative">
                            <InputLabel label="Branch Name" />
                            <label v-if="form.errors.has('branch_name')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('branch_name') }}
                            </label>
                            <div class="flex w-full items-center">
                                <SettingsInput @input="generateBranchId" v-model="form.branch_name" id="branch-name" :class="
                                    form.errors.has('branch_name')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                " placeholder="Enter Branch Name" required="required" />
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Branch Contact Number" />
                            <label v-if="form.errors.has('contact_no')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('contact_no') }}
                            </label>
                            <div class="flex items-center">
                                <SettingsInput v-model="form.contact_no" label="Contact No." :class="
                                    form.errors.has('contact_no')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                " placeholder="Enter Contact No." required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="flex px-4 py-2">
                        <div class="w-full relative">
                            <InputLabel label="Branch Address" />
                            <label v-if="form.errors.has('branch_address')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('branch_address') }}
                            </label>
                            <div class="flex items-center">
                                <SettingsInput v-model="form.branch_address"
                                    placeholder="No., Street, Phase / Village / Subdivision / Municipality"
                                    label="Branch Address" :class="form.errors.has('branch_address')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                    " required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 px-4 ">
                        <div class="w-full relative">
                            <InputLabel label="Country" />
                            <label v-if="form.errors.has('country')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('country') }}
                            </label>
                            <div class="flex items-center ">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Select Country"
                                    v-model="form.country"
                                    :class="form.errors.has('country') ? 'w-full border-[2px] border-red-500' : 'w-full'"
                                    @option:selected="getStatesByCountry" :options="countries"></v-select>

                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Region" />
                            <label v-if="form.errors.has('region')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('region') }}
                            </label>
                            <div class="flex items-center">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Enter Region "
                                    v-model="form.region" :class="
                                        form.errors.has('region')
                                            ? 'w-full border-[2px] border-red-500'
                                            : 'w-full'
                                    " @option:selected="getProvinces" :options="states"></v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Province" />
                            <label v-if="form.errors.has('province')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('province') }}
                            </label>
                            <div class="flex items-center">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Select Province "
                                    v-model="form.province" :class="
                                        form.errors.has('province')
                                            ? 'w-full border-[2px] border-red-500'
                                            : 'w-full'
                                    " @option:selected="getCityByProvince" :options="provinces"></v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="City" />
                            <label v-if="form.errors.has('city')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('city') }}
                            </label>
                            <div class="flex items-center">
                                <v-select class="border border-gray-300 shadow-sm" placeholder="Select City "
                                    v-model="form.city" :class="
                                        form.errors.has('city')
                                            ? 'w-full border-[2px] border-red-500'
                                            : 'w-full'
                                    " :options="cities">
                                </v-select>
                            </div>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="Zip Code" />
                            <label v-if="form.errors.has('zip_code')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('zip_code') }}
                            </label>
                            <div class="flex items-center">
                                <SettingsInput v-model="form.zip_code" :class="
                                    form.errors.has('zip_code')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                " label="Zip Code" placeholder="Enter Zip Code" required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="flex px-4 py-2 space-x-4">
                        <div class="w-full relative">
                            <InputLabel label="Enter Reference Number" />
                            <label v-if="form.errors.has('reference_number')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('reference_number') }}
                            </label>
                            <div class="flex items-center">
                                <SettingsInput @input="reference_number" v-model="form.reference_number"
                                    placeholder="Enter Prefix" label="Branch Address" :class="form.errors.has('reference_number')
                                        ? 'bg-white w-full placeholder:tracking-widest border-red-500 border-[1px] placeholder:text-gray-500 uppercase'
                                        : 'bg-white w-full placeholder:tracking-widest placeholder:text-gray-500 uppercase'
                                    " required="required" />
                            </div>
                        </div>
                        <div class="w-full">
                            <InputLabel label="Preview of Reference Number" />
                            <div class="flex items-center">
                                <SettingsInput disabled v-model="form.preview_reference_number"
                                    placeholder="[Auto Generated]" label="Branch Address"
                                    class="bg-[#eaeaea] text-center w-full placeholder:tracking-widest placeholder:text-[#3e3e3e] uppercase"
                                    required="required" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center space-x-4 ">
                    <SmallHeading label="Currencies" class="text-center w-[20%] text-[12px]" />
                    <div class="flex items-center space-x-4">
                        <button @click.prevent="addSelection()"
                            class="bg-white px-2 py-1  text-[#F9951E] hover:text-white font-bold rounded-sm border-[3px]  duration-300 hover:border-[#F26400]/90 border-#F9951E hover:bg-[#F26400]/90">
                            <PlusIcon class="w-4 h-4" />
                        </button>
                        <button v-if="form.currencies.length > 2" @click.prevent="removeSelection(index)"
                            class="bg-white px-2 py-1 text-red-500 hover:text-white font-bold  rounded-sm border-[3px]  duration-300 hover:border-red-500/90 border-red-500 hover:bg-mid-red">
                            <MinusIcon class="w-4 h-4" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="p-4 ml-2 bg-white h-[10rem] z-10 w-[30%] border mt-4 shadow-md absolute overflow-y-scroll">
                    <div class="flex h-[4.2rem] items-center space-x-2 w-full px-4" v-for="(item, index) in form.currencies"
                        :key="index">
                        <div class="w-full relative">
                            <InputLabel label="From" />
                            <label v-if="form.errors.has('currencies.' + index + '.from_currency')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('currencies.' + index + '.from_currency') }}
                            </label>
                            <v-select
                                :class="{ 'border-2 border-mid-red': form.errors.get('currencies.' + index + '.from_currency') }"
                                v-model="item.from_currency" :options="currency" placeholder="From Currency"
                                class="border border-gray-300"></v-select>
                        </div>
                        <div class="w-full relative">
                            <InputLabel label="To" />
                            <label v-if="form.errors.has('currencies.' + index + '.to_currency')"
                                class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('currencies.' + index + '.to_currency') }}
                            </label>
                            <v-select
                                :class="{ 'border-2 border-mid-red': form.errors.get('currencies.' + index + '.to_currency') }"
                                v-model="item.to_currency" :options="currency" placeholder="To Currency"
                                class="border border-gray-300"></v-select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4 p-10">
                <router-link :to="{ name: 'branch' }"
                    class="uppercase cursor-pointer duration-300 hover:bg-[#3e3e3e]/90 tracking-widest text-[12px] border px-10 py-2 bg-[#3e3e3e] text-white">
                    Cancel
                </router-link>
                <NormalBtn label="Save"
                    class="uppercase z-10 duration-300 hover:bg-[#F9951E]/90 tracking-widest text-[12px] border px-10 py-2 bg-[#F9951E] text-white" />
            </div>
        </form>
    </div>
</template>
