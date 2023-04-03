<script setup>
import ChevronUpDownIcon from "../../../Misc/Icons/ChevronUpDownIcon.vue";
import ChevronDownIconVue from "../../../Misc/Icons/ChevronDownIcon.vue";
import ImageUploadIcon from "../../../Misc/Icons/ImageUploadIcon.vue";
import Accordion from "@/Components/Misc/Accordion.vue";
</script>
<script>
import Title from "@/Components/Misc/Section/Title.vue";
import NormalButton from "../../../Misc/Buttons/NormalButton.vue";
import SmallHeading from "../../../Misc/Heading/SmallHeading.vue";
import SettingsInput from "../../../Misc/Input/SettingsInput.vue";
import SelectMenu from "../../../Misc/Select Menu/SelectMenu.vue";
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import InputLabel from "../../../Misc/Input/InputLabel.vue";
import ErrorMessage from "../../../Misc/Form Validation/ErrorMessage.vue";

import Form from "vform";
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "Create User",
    components: {
        Title,
        NormalButton,
        SelectMenu,
        SettingsInput,
        SmallHeading,
        NormalBtn,
        InputLabel,
        ErrorMessage,
    },
    data() {
        return {
            form: new Form({
                id: "",
                user_name: "",
                status: { value: 0, label: "Active" },
                last_name: "",
                first_name: "",
                middle_name: "",
                suffix: "",
                mobile_number: "",
                email: "",
                company_id: "",
                branch_id: "",
                role: "",
                branch_name: {},
                company_name: {},
                access: [],
                avatar: "",
                url: null,
            }),
            status: [
                { value: 0, label: "Active" },
                { value: 1, label: "In-Active" },
            ],
            roleOptions: [
                { value: 0, label: "admin" },
                { value: 1, label: "approver" },
                { value: 2, label: "checker" },
                { value: 3, label: "maker" },
            ],
            opsPermissions: [
                {
                    id: 1,
                    label: "Home",
                    children: [
                        { id: 0, label: "Login" },
                        { id: 1, label: "Dashboard" },
                    ],
                },
                {
                    id: 2,
                    label: "Processing",
                    children: [
                        { id: 0, label: "File Upload" },
                        { id: 1, label: "Data Entry" },
                        { id: 2, label: "API" },
                    ],
                },
                {
                    id: 3,
                    label: "Inquiry",
                    children: [
                        { id: 0, label: "Amend" },
                        { id: 1, label: "Status Inquiry (With Audit Trail)" },
                        { id: 2, label: "Tie-up's Inquiry" },
                    ],
                },
                {
                    id: 4,
                    label: "Status & Reversal",
                    children: [
                        { id: 0, label: "Adjustment Entry" },
                        { id: 1, label: "Status Tagging" },
                        { id: 2, label: "Reversal (DTD Only)" },
                        { id: 3, label: "Upload USF" },
                    ],
                },
                {
                    id: 5,
                    label: "Reports",
                    children: [{ id: 0, label: "View And Generate" }],
                },
                {
                    id: 6,
                    label: "Monitoring",
                    children: [
                        { id: 0, label: "Monitor" },
                        { id: 1, label: "Verify" },
                        { id: 2, label: "Approve" },
                    ],
                },
                {
                    id: 7,
                    label: "OPS Setup",
                    children: [
                        { id: 0, label: "DAta Entry" },
                        { id: 1, label: "Fees Management" },
                        { id: 2, label: "Rates Management" },
                        { id: 3, label: "Waive Charges" },
                        { id: 4, label: "Handling Fee" },
                        { id: 5, label: "Branches" },
                        { id: 6, label: "Companies" },
                        { id: 7, label: "Users" },
                        { id: 8, label: "Others" },
                    ],
                },
            ],
            cmtPermissions: [
                {
                    id: 1,
                    label: "Home",
                    children: [
                        { id: 0, label: "Login" },
                        { id: 1, label: "Dashboard" },
                    ],
                },
                {
                    id: 2,
                    label: "Distributions",
                    children: [
                        { id: 0, label: "Process" },
                        { id: 1, label: "Cancellation" },
                        { id: 2, label: "Additional" },
                        { id: 3, label: "Refund" },
                    ],
                },
                {
                    id: 3,
                    label: "Fundings",
                    children: [
                        { id: 0, label: "AP Voucher" },
                        { id: 1, label: "Funding From Tie-up" },
                        { id: 2, label: "Funding From Tie-up to OERI" },
                        { id: 3, label: "Funding From OERI to OERI" },
                        { id: 4, label: "Funding to Banks/Providers" },
                    ],
                },
                {
                    id: 4,
                    label: "Tradings",
                    children: [
                        { id: 0, label: "Buying" },
                        { id: 1, label: "Selling" },
                        { id: 2, label: "Inventory" },
                    ],
                },

                {
                    id: 5,
                    label: "Monitor Transactions",
                    children: [
                        { id: 0, label: "MOnitor" },
                        { id: 1, label: "VErify" },
                        { id: 2, label: "APprove" },
                    ],
                },
                {
                    id: 6,
                    label: "Adjustments",
                    children: [
                        { id: 0, label: "ADjustment Entry" },
                        { id: 1, label: "Pushback" },
                    ],
                },
                {
                    id: 7,
                    label: "Other Services",
                    children: [
                        { id: 0, label: "UPload USF" },
                        { id: 1, label: "STatus Inquiry (With Audit Trail)" },
                    ],
                },
                {
                    id: 8,
                    label: "Reports",
                    children: [{ id: 0, label: "VIew And Generate" }],
                },
                {
                    id: 9,
                    label: "CMT Setup",
                    children: [
                        { id: 0, label: "DATa Entry" },
                        { id: 1, label: "FEes Management" },
                        { id: 2, label: "RAtes Management" },
                        { id: 3, label: "WAive Charges" },
                        { id: 4, label: "HAndling Fee" },
                        { id: 5, label: "BRanches" },
                        { id: 6, label: "COmpanies" },
                        { id: 7, label: "USers" },
                        { id: 8, label: "OThers" },
                    ],
                },
            ],
            bncPermissions: [
                {
                    id: 0,
                    label: "Billing and Collection",
                    children: [
                        { id: 0, label: "Billing (Statement Of Account)" },
                        { id: 1, label: "Collection (Payment Monitoring)" },
                        { id: 2, label: "Payable Request" },
                        { id: 3, label: "Print Receipt (AR/OR)" },
                    ],
                },
                {
                    id: 1,
                    label: "Adjustment",
                    children: [{ id: 0, label: "ADJustment Entry" }],
                },
                {
                    id: 2,
                    label: "Reports",
                    children: [{ id: 0, label: "VIEw And Generate" }],
                },
                {
                    id: 3,
                    label: "Billing and Collection Setup",
                    children: [
                        { id: 0, label: "DATa Entry" },
                        { id: 1, label: "FEEs Management" },
                        { id: 2, label: "RATes Management" },
                        { id: 3, label: "WAIve Charges" },
                        { id: 4, label: "HANdling Fee" },
                        { id: 5, label: "BRAnches" },
                        { id: 6, label: "COMpanies" },
                        { id: 7, label: "USErs" },
                        { id: 8, label: "OTHers" },
                    ],
                },
            ],
            accountingPermissions: [
                {
                    id: 0,
                    label: "Accounting Transactions",
                    children: [
                        { id: 0, label: "Create Purchase Request" },
                        { id: 1, label: "Create Purchase Order" },
                        { id: 2, label: "Create Account Payable Request" },
                        { id: 3, label: "Create Journal Entry" },
                        { id: 4, label: "Inventory" },
                        { id: 5, label: "View SL" },
                        { id: 6, label: "Reconciliation Of Accounts" },
                        { id: 7, label: "Creditback Confirmation" },
                        { id: 8, label: "STAtus Inquiry (With Audit Trail)" },
                    ],
                },
                {
                    id: 1,
                    label: "Monitor Transactions",
                    children: [
                        { id: 0, label: "MONitor" },
                        { id: 1, label: "VERify" },
                        { id: 2, label: "APProve" },
                    ],
                },
                {
                    id: 2,
                    label: "Reports",
                    children: [{ id: 0, label: "VIEW And Generate" }],
                },
                {
                    id: 3,
                    label: "Accounting Setup",
                    children: [
                        { id: 0, label: "DATA Entry" },
                        { id: 1, label: "FEES Management" },
                        { id: 2, label: "RATEs Management" },
                        { id: 3, label: "WAIVe Charges" },
                        { id: 4, label: "HANDling Fee" },
                        { id: 5, label: "BRANches" },
                        { id: 6, label: "COMPanies" },
                        { id: 7, label: "USERs" },
                        { id: 8, label: "OTHErs" },
                    ],
                },
            ],
            permissions: [],
            companies: [],
            branches: [],
            editMode: false,
            isSelect: false,
            selected: [],
            selected_all: [],
            errors: [],
        };
    },
    methods: {
        backToUserPage() {
            this.$router.push("/app/settings/users");
        },
        async saveUser() {
            this.form.access = this.selected;
            await this.form
                .post("/api/users/")
                .then((response) => {
                    Swal.fire({
                        toast: true,
                        icon: "success",
                        title: response.data.message,
                        animation: false,
                        position: "top-right",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                    });
                    this.form.reset();
                    this.returnUserPage();
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors;
                });
        },
        async getCompanies() {
            const response = await axios.get("/api/companies");
            this.companies = response.data;
        },
        async getBranches() {
            const response = await axios.get(
                "/api/branches/" + this.form.company_id.id + "/get"
            );
            this.branches = response.data;
        },
        async generateUsername() {
            if (this.form.company_id.name) {
                const getFirstLetter = this.form.company_id.name
                    .split(/\s/)
                    .reduce(
                        (response, word) => (response += word.slice(0, 1)),
                        ""
                    );

                this.form.user_name =
                    getFirstLetter + "_" + this.form.first_name;
            }
        },
        returnUserPage() {
            this.$router.push("/app/settings/users");
        },
        async checkMode() {
            if (this.$route.name == "edit-user") {
                this.editMode = true;
                await this.getUserDetails();
            }
        },
        async getUserDetails() {
            axios
                .get("/api/users/" + this.$route.params.id)
                .then((response) => {
                    this.form = response.data.data;
                    console.log("edit-user", this.form);
                    this.form.status = this.status[this.form.status];
                    this.form.company_id = {
                        value: this.form.company_name.id,
                        label: this.form.company_name.name,
                    };
                    this.form.branch_id = {
                        value: this.form.branch_name.id,
                        label: this.form.branch_name.name,
                    };
                    this.form.access = this.form.permissions.permissions;
                    this.selected = this.form.access;
                    console.log("form", this.form.access, this.rolePermissions);
                })
                .catch((error) => {
                    console.log(error);
                });

            Object.entries(this.rolePermissions).forEach(([key, value]) => {
                value.value = value.label.includes(this.form.access);
                console.log("role", key, value);
            });
        },
        updateUser() {
            console.log("edit-user", this.form);
            this.form.access = this.selected;
            axios
                .put("/api/users/" + this.form.id, this.form)
                .then((response) => {
                    Swal.fire({
                        toast: true,
                        icon: "success",
                        title: response.data.message,
                        animation: false,
                        position: "top-right",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    this.returnUserPage();
                })
                .catch((error) => {
                    console.log(error);

                    this.errors = error.response.data.errors;
                });
        },
        pickFile() {
            let input = this.$refs.fileUserPix;
            let file = input.files;

            if (file && file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.url = e.target.result;
                    this.form.avatar = e.target.result;
                };
                reader.readAsDataURL(file[0]);
                this.$emit("input", file[0]);
            }
        },
        generateAccessPerRoleByDepartment() {
            switch (this.form.role.label) {
                case "maker":
                    this.selected = [];
                    this.selected.push(
                        "Login",
                        "Dashboard",
                        //ops
                        "File Upload",
                        "Data Entry",
                        "API",
                        "Amend",
                        "Status Inquiry (With Audit Trail)",
                        "Tie-up's Inquiry",
                        "Adjustment Entry",
                        "Status Tagging",
                        "Reversal (DTD Only)",
                        "Upload USF",
                        "Status Inquiry (with Audit Trail)",
                        "View And Generate",
                        "Data Entry",
                        "Fees Management",
                        "Rates Management",
                        "Waive Charges",
                        "Handling Fee",
                        "Monitor",
                        "Process",
                        "Cancellation",
                        "Additional",
                        "Refund",
                        "AP Voucher",
                        "Funding From Tie-up",
                        "Funding From Tie-up to OERI",
                        "Funding From OERI to OERI",
                        "Funding to Banks/Providers",
                        "Buying",
                        "Selling",
                        "Inventory",
                        "MOnitor",
                        "ADjustment Entry",
                        "Pushback",
                        "UPload USF",
                        "STatus Inquiry (With Audit Trail)",
                        "VIew And Generate",
                        "Billing (Statement Of Account)",
                        "Collection (Payment Monitoring)",
                        "Payable Request",
                        "Print Receipt (AR/OR)",
                        "ADJustment Entry",
                        "VIEw And Generate",
                        "Create Purchase Request",
                        "Create Purchase Order",
                        "Create Account Payable Request",
                        "Create Journal Entry",
                        "Inventory",
                        "View SL",
                        "Reconciliation Of Accounts",
                        "Creditback Confirmation",
                        "STAtus Inquiry (With Audit Trail)",
                        "VIEW And Generate",
                        "MONitor"
                    );
                    break;
                case "checker":
                    this.selected = [];
                    this.selected.push(
                        "Login",
                        "Dashboard",
                        //ops
                        "Status Inquiry (With Audit Trail)",
                        "Verify",
                        "Tie-up's Inquiry",
                        "View And Generate",
                        "DAta Entry",
                        "Fees Management",
                        "Rates Management",
                        "Waive Charges",
                        "Handling Fee",
                        "Branches",
                        "Companies",
                        "Users",
                        "Others",

                        //cmt
                        "VErify",
                        "STatus Inquiry (With Audit Trail)",
                        "VIew And Generate",
                        //setup - all

                        //BNC
                        "VIEw And Generate",
                        //setup- all

                        //accounting
                        "STAtus Inquiry (With Audit Trail)",
                        "VERify",
                        "VIEW And Generate"
                        //setup - Chart of accounts, WithHoldingTax, Accounting Budget
                    );
                    break;
                case "approver":
                    this.selected = [];
                    this.selected.push(
                        "Login",
                        "Dashboard",
                        //ops
                        "Status Inquiry (With Audit Trail)",
                        "Approve",
                        "View And Generate",
                        "DAta Entry",
                        "Fees Management",
                        "Rates Management",
                        "Waive Charges",
                        "Handling Fee",
                        "Branches",
                        "Companies",
                        "Users",
                        "Others",
                        //setup-all

                        //cmt
                        "APprove",
                        "STatus Inquiry (With Audit Trail)",
                        "VIew And Generate",
                        //setup - all

                        //BNC
                        "VIEw And Generate",
                        //setup- all

                        //accounting
                        "STAtus Inquiry (With Audit Trail)",
                        "APProve",
                        "VIEW And Generate"
                        //setup - Chart of accounts, WithHoldingTax, Accounting Budget
                    );
                    break;
                default:
                    break;
            }
        },
    },
    computed: {
        selectAll: {
            get: function () {
                return this.permissions
                    ? this.selected.length == this.permissions
                    : false;
            },
            set: function (value) {
                let selected = [];

                if (value) {
                    this.permissions.forEach(function (permission) {
                        if (permission.children.length) {
                            Object.entries(permission.children).forEach(
                                function (label) {
                                    if (selected) {
                                        selected.push(label[1].label);
                                    }
                                }
                            );
                        }
                    });
                }
                this.selected = selected;
            },
        },
    },
    async created() {
        await this.getCompanies();
        this.checkMode();
    },
};
</script>

<template>
    <div class="bg-white w-full min-h-screen border border-white">
        <form @submit.prevent="!editMode ? saveUser() : updateUser()" enctype="multipart/form-data">
            <div class="flex p-14 justify-between">
                <div class="flex items-center space-x-20">
                    <span v-if="!form.avatar" class="inline-block h-36 w-36 overflow-hidden rounded-full bg-[#ECECEC]">
                        <ImageUploadIcon class="h-14 w-14 m-auto mt-10 text-gray-300" />
                    </span>
                    <img class="m-auto rounded-full h-20" :src="form.avatar" />
                    <div>
                        <input type="file" id="files" class="hidden" @change="pickFile" accept="image/*"
                            ref="fileUserPix" />
                        <label
                            class="text-[#F9951E] text-md uppercase font-bold py-1 px-10 hover:cursor-pointer border-[3px] border-[#F9951E]"
                            for="files">
                            Upload
                        </label>
                        <div class="mt-6 text-sm font-sans tracking-wider">
                            <p>
                                MAX. FILE SIZE:
                                <span class="font-bold">1MB</span>
                            </p>
                            <p>
                                SUPPORTED FILE TYPES:
                                <span class="font-bold">JPG, JPEG, PNG</span>
                            </p>
                        </div>
                        <br />
                    </div>
                </div>
                <div>
                    <div class="grid p-2">
                        <div class="col-span-6 flex">
                            <div class="mt-1 flex w-full rounded-md shadow-sm space-x-1">
                                <span
                                    class="inline-flex w-full text-#3E3E3E items-center border border-gray-300 px-3 font-semibold tracking-wider uppercase text-[12px] font-sans">Status
                                </span>

                                <v-select v-model="form.status" selected="active"
                                    class="w-full uppercase border border-gray-300 shadow-sm" :options="status">
                                </v-select>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <ErrorMessage v-if="errors.status" :error="errors.status[0]" />
                        </div>
                        <div class="col-span-6 flex">
                            <div class="mt-1 flex w-full rounded-md shadow-sm space-x-1">
                                <span
                                    class="inline-flex w-full text-#3E3E3E items-center border border-gray-300 px-3 font-semibold tracking-wider uppercase text-[12px] font-sans">
                                    Username
                                </span>
                                <SettingsInput disabled :placeholder="form.user_name"
                                    class="tracking-wider bg-[#D9D9D9] placeholder:text-black placeholder:uppercase text-[12px] font-semibold w-full text-center" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm:overflow-hidden">
                <div>
                    <SmallHeading class="pl-6 w-[20%]" label="User Details" />
                    <div class="grid gap-6 p-6">
                        <div class="col-span-3 flex space-x-3">
                            <div class="w-full">
                                <InputLabel label="Last Name" />
                                <SettingsInput v-model="form.last_name" placeholder="Enter Last Name"
                                    class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"
                                    required="required" />

                                <div class="flex items-center">
                                    <ErrorMessage v-if="errors.last_name" :error="errors.last_name[0]" />
                                </div>
                            </div>
                            <div class="w-full">
                                <InputLabel label="First Name" />
                                <SettingsInput v-model="form.first_name" placeholder="Enter First Name"
                                    class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"
                                    required="required" />
                                <div class="flex items-center">
                                    <ErrorMessage v-if="errors.first_name" :error="errors.first_name[0]" />
                                </div>
                            </div>
                            <div class="w-full">
                                <InputLabel label="Middle Name" />
                                <SettingsInput v-model="form.middle_name" placeholder="Enter Middle Name"
                                    class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]" />
                                <div class="flex items-center">
                                    <ErrorMessage v-if="errors.middle_name" :error="errors.middle_name[0]" />
                                </div>
                            </div>
                            <div class="w-full">
                                <InputLabel label="Suffix" />
                                <SettingsInput v-model="form.suffix" placeholder="Enter Suffix"
                                    class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]" />
                                <div class="flex items-center">
                                    <ErrorMessage v-if="errors.suffix" :error="errors.suffix[0]" />
                                </div>
                            </div>
                            <div class="w-full">
                                <InputLabel label="Mobile Number" />
                                <SettingsInput v-model="form.mobile_number" placeholder="Enter Mobile Number"
                                    class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]" />
                                <div class="flex items-center">
                                    <ErrorMessage v-if="errors.mobile_number" :error="errors.mobile_number[0]" />
                                </div>
                            </div>
                            <div class="w-full">
                                <InputLabel label="Email" />
                                <SettingsInput v-model="form.email" type="email" placeholder="Enter Email Address"
                                    class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"
                                    required="required" />
                                <div class="flex items-center">
                                    <ErrorMessage v-if="errors.email" :error="errors.email[0]" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <SmallHeading class="pl-6 w-[20%]" label="Company Details" />
                <div class="grid gap-6 p-6">
                    <div class="col-span-3 flex space-x-4">
                        <v-select v-model="form.company_id" @option:selected="generateUsername(), getBranches()"
                            class="w-full border border-gray-300 shadow-sm" label="name" placeholder="Select Company"
                            :options="companies"></v-select>
                        <div class="flex items-center">
                            <ErrorMessage v-if="errors.company_id" :error="errors.company_id[0]" />
                        </div>
                        <v-select v-model="form.branch_id" class="w-full border border-gray-300 shadow-sm"
                            placeholder="Select Branch" :options="branches"></v-select>
                        <div class="flex items-center">
                            <ErrorMessage v-if="errors.branch_id" :error="errors.branch_id[0]" />
                        </div>
                        <v-select v-model="form.role" class="w-full border border-gray-300 shadow-sm"
                            placeholder="Select Role" :options="roleOptions"
                            @option:selected="generateAccessPerRoleByDepartment"></v-select>
                        <div class="flex items-center">
                            <ErrorMessage v-if="errors.role" :error="errors.role[0]" />
                        </div>
                    </div>
                </div>
                <div>
                    <SmallHeading class="pl-6 w-[20%]" label="Module Access" />
                    <div class="ml-5 flex items-center">
                        <ErrorMessage v-if="errors.access" :error="errors.access" />
                    </div>
                </div>
            </div>
            <Accordion sectiontitle="OPS DEPARTMENT">
                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="form-check" v-for="items in opsPermissions" :key="items.id">
                        <div v-if="!items.children.length">
                            <input v-model="selected" :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" id="flexCheckDefault" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-else>
                            <!-- <input
                                v-model="selectAll"
                                :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox"
                                id="flexCheckDefault"
                            /> -->
                            <span v-if="items.children.length"
                                class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-if="items.children.length" v-for="subItem in items.children" :key="subItem.id"
                            class="form-check pl-6 mt-2">
                            <input v-model="selected" :value="subItem.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="" id="flexCheckChecked" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckChecked">
                                {{ subItem.label }}
                            </span>
                        </div>
                    </div>
                </div>
            </Accordion>

            <Accordion sectiontitle="CMT DEPARTMENT">
                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="form-check" v-for="items in cmtPermissions" :key="items.id">
                        <div v-if="!items.children.length">
                            <input v-model="selected" :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" id="flexCheckDefault" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-else>
                            <!-- <input
                                v-model="selectAll"
                                :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox"
                                id="flexCheckDefault"
                            /> -->
                            <span v-if="items.children.length"
                                class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-if="items.children.length" v-for="subItem in items.children" :key="subItem.id"
                            class="form-check pl-6 mt-2">
                            <input v-model="selected" :value="subItem.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="" id="flexCheckChecked" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckChecked">
                                {{ subItem.label }}
                            </span>
                        </div>
                    </div>
                </div>
            </Accordion>

            <Accordion sectiontitle="BILLING AND COLLECTION DEPARTMENT">
                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="form-check" v-for="items in bncPermissions" :key="items.id">
                        <div v-if="!items.children.length">
                            <input v-model="selected" :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" id="flexCheckDefault" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-else>
                            <!-- <input
                                v-model="selectAll"
                                :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox"
                                id="flexCheckDefault"
                            /> -->
                            <span v-if="items.children.length"
                                class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-if="items.children.length" v-for="subItem in items.children" :key="subItem.id"
                            class="form-check pl-6 mt-2">
                            <input v-model="selected" :value="subItem.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="" id="flexCheckChecked" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckChecked">
                                {{ subItem.label }}
                            </span>
                        </div>
                    </div>
                </div>
            </Accordion>

            <Accordion sectiontitle="ACCOUNTING DEPARTMENT">
                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="form-check" v-for="items in accountingPermissions" :key="items.id">
                        <div v-if="!items.children.length">
                            <input v-model="selected" :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" id="flexCheckDefault" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-else>
                            <!-- <input
                                v-model="selectAll"
                                :value="items.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox"
                                id="flexCheckDefault"
                            /> -->
                            <span v-if="items.children.length"
                                class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckDefault">
                                {{ items.label }}
                            </span>
                        </div>
                        <div v-if="items.children.length" v-for="subItem in items.children" :key="subItem.id"
                            class="form-check pl-6 mt-2">
                            <input v-model="selected" :value="subItem.label"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="" id="flexCheckChecked" />
                            <span class="uppercase font-rubik-light tracking-wider inline-block text-gray-800"
                                for="flexCheckChecked">
                                {{ subItem.label }}
                            </span>
                        </div>
                    </div>
                </div>
            </Accordion>

            <div class="px-4 py-3 sm:px-6 space-x-1 text-center mb-20">
                <a @click="backToUserPage()"
                    class="hover:cursor-pointer border-[3px] transition ease-in-out delay-150 hover:translate-y-1 duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 px-20 text-sm font-medium text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Close</a>

                <NormalBtn type="submit" :label="!editMode ? 'save' : 'update'"
                    class="border-[3px] transition ease-in-out delay-150 hover:translate-y-1 duration-300 hover:border-[#F26400] border-#F9951E bg-white py-2 px-20 text-sm font-medium text-[#F9951E] uppercase tracking-widest shadow-sm hover:bg-[#F26400] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" />
            </div>
        </form>
    </div>
</template>
