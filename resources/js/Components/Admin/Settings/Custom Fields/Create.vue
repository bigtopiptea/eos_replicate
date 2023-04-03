<script>
import Search from "../../../Misc/Search/Search.vue";
import Title from "../../../Misc/Section/Title.vue";
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import SwitchToggle from "../../../Misc/Switch(Toggle)/SwitchToggle.vue";
import XmarkIcon from "../../../Misc/Icons/XmarkIcon.vue";
import SettingsInput from "../../../Misc/Input/SettingsInput.vue";
import InputLabel from "../../../Misc/Input/InputLabel.vue";
import Form from "vform";

import { TailwindPagination } from "laravel-vue-pagination";
import VueTagsInput from "@sipec/vue3-tags-input";

import { successMessage, errorMessage } from "@/utils/toast.js";

export default {
    components: {
        Title,
        Search,
        NormalBtn,
        SwitchToggle,
        XmarkIcon,
        TailwindPagination,
        SettingsInput,
        VueTagsInput,
        InputLabel,
    },
    data() {
        return {
            // rows: [],
            formRows: new Form({
                id: "",
                ref: "",
                parent_id: "",
                transaction_type: "",
                section_name: "",
                fields: [],
            }),
            transaction_types: [],
            inputTypes: [
                { label: "Text", value: "text" },
                { label: "Date", value: "date" },
                { label: "Number", value: "number" },
                { label: "File", value: "file" },
                { label: "Image", value: "image" },
                { label: "Email", value: "email" },
                { label: "Select", value: "select" },
            ],
            editMode: false,
        };
    },
    methods: {
        getTransactionType() {
            axios.get("/api/maintenance/transaction-type/list").then((response) => {
                this.transaction_types = response.data;
            });
        },
        addRow() {
            this.formRows.fields.push({
                name: "",
                type: "",
                label: "",
                range: "",
                require: true,
            });
        },
        updateRow() {
            //update method.
            //transaction_type save as parent_id
            //section name save as ref
        },
        removeRow(row) {
            this.formRows.fields.pop(row);
        },
        storeField() {
            this.transformData();
            this.formRows
                .post("/api/custom-fields")
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.$router.push("/app/settings/data-entry");
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in storing the Custom Field/s.",
                        "top-right"
                    );
                });
        },
        async fetchField() {
            await axios
                .get("/api/custom-fields/" + this.$route.params.id)
                .then((response) => {
                    this.formRows.fill(response.data);
                    console.log("fetch", this.formRows.fields);
                })
                .catch((error) => { });
        },
        async checkMode() {
            if (this.$route.name == "edit-data-entry") {
                this.editMode = true;
                await this.fetchField();
            }
        },
        async updateField() {
            this.transformData();
            console.log("update", this.formRows);

            this.formRows
                .put("/api/custom-fields/" + this.formRows.id)
                .then((response) => {
                    successMessage(
                        "Success!",
                        response.data.message,
                        "top-right"
                    );
                    this.$router.push("/app/settings/data-entry");
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in storing the Custom Field/s.",
                        "top-right"
                    );
                });
        },
        transformData() {
            this.formRows.parent_id = this.formRows.transaction_type.value;
            this.formRows.ref = this.formRows.section_name;
            this.formRows.fields.map((item) =>
                item.type ? item.type : item.type.value
            );
        },
    },
    created() {
        this.getTransactionType();
        this.checkMode();
    },
};
</script>
<template>
    <div class="bg-white w-full min-h-screen border border-white">
        <!--  -->
        <div class="px-4 sm:px-6 lg:px-8 mt-10">
            <div class="flex justify-between">
                <div class="sm:mt-0 sm:flex-none">
                    <div class="relative flex w-full">
                        <div class="w-full flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <div>
                                    <InputLabel label="Transaction Type" />
                                    <v-select placeholder="Trasaction Type"
                                        class="w-full uppercase border border-gray-300 shadow-sm"
                                        :options="transaction_types" v-model="formRows.transaction_type"></v-select>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div>
                                    <InputLabel label="Section Name" />
                                    <SettingsInput v-model="formRows.section_name" placeholder="Remitter Details"
                                        class="w-full uppercase" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <router-link :to="{ path: '/app/settings/create/users' }"> -->
                <NormalBtn label="add new custom field"
                    class="h-[50px] text-[#F9951E] font-medium hover:bg-[#f78c0c] hover:text-white w-[234px] uppercase tracking-wider border-[3px] border-[#F9951E]"
                    @click="addRow()" />
                <NormalBtn :label="!editMode ? 'save' : 'update'"
                    class="h-[50px] text-[#F9951E] font-medium hover:bg-[#f78c0c] hover:text-white w-[234px] uppercase tracking-wider border-[3px] border-[#F9951E]"
                    @click="!editMode ? storeField() : updateField()" />

                <!-- </router-link> -->
            </div>
            <div class="flex justify-between">
                <div class="flex">
                    <DropDown label="bulk action" />
                </div>
            </div>

            <div class="mt-4 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full table-auto divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-solid">
                                        <th scope="col"
                                            class="px-3 py-3.5 uppercase text-left text-sm font-semibold text-gray-900">
                                            <span
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer">
                                                Field Name
                                            </span>
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900">
                                            <span
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer">
                                                Type
                                            </span>
                                        </th>

                                        <th scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900">
                                            <span
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer">
                                                Label
                                            </span>
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900">
                                            <span
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer">
                                                Length
                                            </span>
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900">
                                            Mandatory
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="(row, index) in formRows.fields" :key="index"
                                        class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap text-center uppercase px-3 py-4 text-sm text-[#3E3E3E]">
                                            <SettingsInput v-model="row.name" @input="updateRow" placeholder="Kembular"
                                                class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"
                                                required="required" />
                                        </td>
                                        <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-[#3E3E3E]">
                                            <v-select v-model="row.type" :options="inputTypes"
                                                class="uppercase border border-gray-300 shadow-sm" />

                                            <vue-tags-input v-if="
                                                row.type.value ==
                                                inputTypes[6].value
                                            " v-model="row.tag" :tags="row.tags" @tags-changed="
    (newTags) =>
        (row.tags = newTags)
" class="mt-5 tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]" required="required"
                                                @input="updateRow" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-center px-3 py-4 text-sm text-[#3E3E3E]">
                                            <SettingsInput v-model="row.label" @input="updateRow" placeholder="Kembular"
                                                class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"
                                                required="required" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-center px-3 py-4 text-sm text-[#3E3E3E]">
                                            <SettingsInput v-model="row.range" @input="updateRow" placeholder="Kembular"
                                                class="tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"
                                                required="required" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-center px-3 py-4 text-sm text-[#3E3E3E]">
                                            <input v-model="row.require"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                type="checkbox" id="flexCheckDefault" />
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase flex space-x-3 justify-center text-center px-3 py-4 text-sm text-[#3E3E3E]">
                                            <!-- <router-link
              :to="{
                name: 'edit-user',
                params: { id: user.id },
              }"
            > -->
                                            <XmarkIcon class="text-#F9951E" @click.prevent="removeRow(id)" />
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</template>
