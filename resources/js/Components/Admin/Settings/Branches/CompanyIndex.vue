<script>
import { Form } from "vform";
import axios from "axios";

import Title from "../../../Misc/Section/Title.vue";
import SearchIcon from "../../../Misc/Icons/SearchIcon.vue";
import DropDown from "../../../Misc/Dropdown/Dropdown.vue";
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import EditIcon from "../../../Misc/Icons/EditIcon.vue";
import SwitchToggle from "../../../Misc/Switch(Toggle)/SwitchToggle.vue";
import Slideover from "../../../Misc/Slideover/Slideover.vue";
import ImageUploadIcon from "../../../Misc/Icons/ImageUploadIcon.vue";
import SlideoverInput from "../../../Misc/Input/SlideoverInput.vue";
import SettingsInput from "../../../Misc/Input/SettingsInput.vue";
import InputLabel from "../../../Misc/Input/InputLabel.vue";
import Pagination from "../../../Misc/Pagination/Pagination.vue";
import Search from "../../../Misc/Search/Search.vue";

import { successMessage, errorMessage } from "@/utils/toast.js";
import ErrorMessage from "@/Components/Misc/Form Validation/ErrorMessage.vue";

export default {
    name: "Company",
    components: {
        Search,
        Title,
        NormalBtn,
        SearchIcon,
        DropDown,
        EditIcon,
        Slideover,
        ImageUploadIcon,
        SettingsInput,
        ErrorMessage,
        SlideoverInput,
        SwitchToggle,
        InputLabel,
        Pagination,
    },
    data() {
        return {
            slideoverOpen: false,
            companies: {},
            form: new Form({
                id: "",
                name: "",
                partner_code: "",
                type_of_fee: "",
                logo: "",
                isActive: true,
            }),
            company: [],
            errors: {},
            url: null,
            state: "",
            pagination: {
                current_page: 1,
            },
            sortByAscending: true,
            column: "",
            columns: [
                { name: "id", sortByAsc: true },
                { name: "name", sortByAsc: true },
                { name: "partner_code", sortByAsc: true },
                { name: "created_at", sortByAsc: true },
            ],
            search: "",
            per_page: 10,
            filter: "",
            validationErrors: [],
            type_of_charging: [
                {value: 1, label: 'Add (BILLING)', title: 'add'},
                {value: 2, label: 'Less (BENE-DEDUCT)', title: 'less'},
            ],

        };
    },
    methods: {
        async getCompanies() {
            this.$Progress.start();
            await axios
                .get("/api/companies/pagination?", {
                    params: {
                        page: this.pagination.current_page,
                        per_page: this.per_page,
                        column: this.column,
                        sortBy: this.sortByAscending,
                        search: this.search,
                        q: this.filter,
                    },
                })
                .then((response) => {
                    this.companies = response.data.data;
                    this.pagination = response.data;
                    this.$Progress.finish();
                })
                .catch((error) => {
                    this.$Progress.fail();
                });
        },
        async storeCompany() {
            await this.form
                .post("/api/companies")
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.getCompanies();
                    this.form.reset();
                    this.url = null;
                    this.partnerCodeGenerator(6);
                    this.slideoverOpen = false;
                })
                .catch((errors) => {
                    errorMessage("Opps!", "Something went wrong.", "top-right");
                    this.slideoverOpen = true;
                    this.validationErrors = errors.response.data.errors;
                });
        },
        async getCompany(id) {
            const response = await axios.get(`/api/companies/${id}`);
            this.company = response.data;
            this.form.name = this.company.name;
            this.form.partner_code = this.company.partner_code;
            this.form.logo = this.company.logo;
            this.form.type_of_fee = this.company.type_of_charging;
        },
        async updateCompanyDetails() {
            await axios
                .put(
                    `/api/companies/details/update/${this.company.id}`,
                    this.form
                )
                .then((response) => {
                    this.getCompanies();
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.slideoverOpen = false;
                })
                .catch((errors) => {
                    errorMessage("Opps!", "Something went wrong.", "top-right");
                    this.slideoverOpen = true;
                    this.validationErrors = errors.response.data.errors;
                });
        },
        async updateCompanyStatus(id, isActive) {
            await axios
                .put("/api/companies/status/update", {
                    id: id,
                    isActive: isActive,
                })
                .then((response) => {
                    this.getCompanies();
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                })
                .catch((errors) => {});
        },
        partnerCodeGenerator(length) {
            let word = '';
            const alphabet = 'abcdefhijklmnopqrstuvwxyz';

            for (let i = 0; i < length; i ++){
                word += alphabet.charAt(Math.floor(Math.random() * alphabet.length));
            }
            return this.form.partner_code = word;
        },
        toggleStatus() {
            this.form.isActive = !this.form.isActive;
            this.$emit("value", this.form.isActive);
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
        getState(type) {
            this.state = type;
        },
        sort(column) {
            this.columns.filter((columns) => {
                if (columns.name == column.name) {
                    columns.sortByAsc = !column.sortByAsc;
                    this.sortByAscending = columns.sortByAsc;
                } else {
                    columns.sortByAsc =
                        columns.sortByAsc == false ? true : columns.sortByAsc;
                }
            });
            this.column = column.name;
            this.getCompanies();
        },
        receive_per_page(data) {
            this.per_page = data.value;
            this.pagination.current_page = 1;
            this.getCompanies();
        },
        receive_filter_value(data) {
            this.pagination.current_page = 1;
            this.filter = data;
            this.getCompanies();
        },
        slideOverToggle() {
            this.slideoverOpen = false;
            this.form.reset();
            this.validationErrors = [];
            this.partnerCodeGenerator(6);
        },
    },
    mounted() {
         this.partnerCodeGenerator(6);
    },
    async created() {
        await this.getCompanies();
    },
};
</script>
<template>
    <Slideover
        :show="slideoverOpen"
        @close="slideOverToggle"
        :title="state === 'add' ? 'Add Company' : 'Edit Company'">
        <div class="absolute inset-0">
            <div class="h-full" aria-hidden="true">
                <form @submit.prevent="state == 'add' ? storeCompany() : updateCompanyDetails()" enctype="multipart/form-data">
                    <div class="text-center">
                        <img
                            v-if="!url && form.logo"
                            name="logo"
                            class="w-36 h-36 overflow-hidden inline-block mt-10"
                            :src="`/images/` + form.logo"
                        />
                        <span v-if="!url && !form.logo">
                            <ImageUploadIcon
                                class="h-12 w-20 m-auto mt-10 text-gray-300"
                            />
                        </span>
                        <img
                            v-if="url"
                            :src="url"
                            class="h w-40 overflow-hidden inline-block mt-10"
                        />
                        <div class="mt-4">
                            <input
                                type="file"
                                id="files"
                                class="hidden"
                                @change="pickFile"
                                accept="image/*"
                                ref="fileBranchPix"
                            />
                            <label class="text-[#F9951E] transition ease-in-out delay-150 hover:bg-[#f9951e] hover:text-white duration-300 text-md uppercase tracking-widest font-semibold
                             py-1 px-10 hover:cursor-pointer border-[3px] border-[#F9951E]"
                                for="files">
                                Upload
                            </label>
                            <div class="mx-8 my-6 flex justify-center items-center space-x-2">
                                <span class="uppercase font-bold tracking-wider text-[12px]">
                                    Status
                                </span>
                                <SwitchToggle @click.prevent="toggleStatus(), updateCompanyStatus(company.id, company.isActive)"
                                    :status="form.isActive"
                                    :isChecked="form.isActive"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="px-6">
                        <div class="relative w-full">
                            <InputLabel label="Company Name" />
                            <label v-if="form.errors.has('name')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('name') }}
                            </label>
                            <SettingsInput
                                :class="{
                                    'border border-mid-red': form.errors.has('name'),
                                }"
                                v-model="form.name"
                                placeholder="Enter Company Name"
                                class="uppercase w-full"
                            />
                        </div>
                    </div>
                    <div class="px-6">
                            <InputLabel label="Partner Code (Auto Generated)" />
                            <SettingsInput
                                :placeholder="form.partner_code"
                                disabled
                                class="block placeholder:text-black uppercase font-bold text-center tracking-widest bg-white w-full min-w-0 flex-1 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                    </div>
                    <div class="px-6">
                        <div class="relative w-full">
                            <InputLabel label="TIE-UPS HANDLING FEE" />
                            <label v-if="form.errors.has('type_of_fee')"
                                   class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">
                                {{ form.errors.get('type_of_fee') }}
                            </label>
                            <v-select :class="{
                                    'border-2 border-mid-red': form.errors.has('type_of_fee'),
                                }" v-model="form.type_of_fee" placeholder="SELECT TYPE OF CHARGING"
                                      label="label" :options="type_of_charging" class="border border-gray-300"></v-select>
                        </div>
                    </div>
                    <div class="space-x-4 p-1.5  flex absolute bottom-0 w-full">
                        <a @click.prevent="slideOverToggle()"
                           type="submit"
                           class="border-[3px] text-center hover:cursor-pointer transition ease-in-out delay-150 hover:translate-y-1 duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 w-full text-sm font-medium text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Close
                        </a>
                        <NormalBtn
                            type="submit"
                            :label="state === 'add' ? 'save' : 'update'"
                            class="border-[3px] transition ease-in-out delay-150 hover:translate-y-1 duration-300 hover:border-[#F26400] border-#F9951E bg-white py-2 w-full text-sm font-medium text-[#F9951E] uppercase tracking-widest shadow-sm hover:bg-[#F26400] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        />
                    </div>
                </form>
            </div>
        </div>
    </Slideover>
    <div class=" border shadow-md bg-white border-white">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="flex justify-between mb-8">
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <div class="relative w-full">
                            <form
                                @submit.prevent="getCompanies"
                                class="flex  items-center"
                            >
                                <Search
                                    v-on:filterValue="receive_filter_value"
                                />
                                <NormalBtn
                                    label="Export"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white"
                                />
                            </form>
                        </div>
                    </div>
                    <NormalBtn @click="(slideoverOpen = !slideoverOpen), getState('add')"
                        label="Add Company"
                        class="h-[40px] text-[#F9951E] font-rubik-light duration-300 hover:bg-[#f78c0c] hover:text-white w-[200px] uppercase tracking-wider border-[3px] border-[#F9951E]"
                    />

                </div>
                <!--table -->
                <div class="mb-8 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col" class="px-6 whitespace-nowrap py-2">
                                        <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                            <div class="space-x-7 flex items-center">
                                                <input type="checkbox" />
                                                <span>
                                                     ID
                                                </span>
                                            </div>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-2 w-[24%]">
                                        <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                            Company Name
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-2">
                                        <div class="flex items-center whitespace-nowrap justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                            Partner Code
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-2 w-[10%]">
                                        <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                            Date Added
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-2 w-[10%]">
                                        <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                            Added By
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-2 w-[10%]">
                                        <div class="uppercase text-[13px] font-rubik-normal tracking-wider">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 ">
                                <tr v-for="company in companies" :key="company.id" class="divide-x divide-gray-200">
                                    <td class="px-6 py-2 text-[14px] space-x-8 font-rubik-normal">
                                        <input type="checkbox" />
                                        <span>
                                           {{company.id}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-2 text-[14px] whitespace-nowrap font-rubik-normal">
                                        {{company.name}}
                                    </td>
                                    <td class="px-6 py-2 text-[14px] font-rubik-normal">
                                        {{company.partner_code}}
                                    </td>
                                    <td class="px-6 py-2 text-[14px] whitespace-nowrap font-rubik-normal uppercase">
<!--                                        {{company.created_at}}-->
                                        {{company.created_at ? $moment(company.created_at).format('MM/DD/YYYY, h:mm:ss a') : ''}}

                                    </td>
                                    <td class="px-6 py-2 text-[14px] uppercase whitespace-nowrap font-rubik-normal">
                                        {{company.added_by.last_name}}, {{company.added_by.middle_name}} {{company.added_by.first_name}}
                                    </td>
                                    <td class="px-6 py-2">
                                        <div class="flex items-center justify-center space-x-4">
                                            <EditIcon @click="
                                                (slideoverOpen =
                                                    !slideoverOpen),
                                                    getState('edit'),
                                                    getCompany(company.id)"
                                                      class="text-[#F9951E] h-5 hover:cursor-pointer"
                                            />

                                            <SwitchToggle
                                                :status="company.isActive"
                                                :isChecked="company.isActive"
                                                @click.prevent="
                                                    toggleStatus(),
                                                    updateCompanyStatus(company.id,company.isActive,company.label)"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <Pagination
            class="mb-4"
            @paginate="getCompanies()"
            :pagination="pagination"
            :offset="5"
            v-on:numberOfPage="receive_per_page"
        />
    </div>
    <vue-progress-bar></vue-progress-bar>
</template>
