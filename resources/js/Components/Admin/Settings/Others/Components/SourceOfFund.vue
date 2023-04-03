<template>
    <div class="w-full flex p-4">
        <!-- Source of Funds -->
        <div class="w-full p-4">
            <SmallHeading label="Source of Funds" class="text-center" />
            <div class="bg-white px-4 shadow-md border border-gray-100 rounded-sm">
                <div class="w-full mb-4 flex justify-between">
                    <button></button>
                    <NormalButton @click.prevent="openModal(false)" label="add source of funds" class="
              mt-6
              hover:bg-[#f9951e]
              uppercase
              tracking-wider
              font-rubik-light
              text-sm
              duration-300
              text-[#f9951e]
              hover:text-white
              border-2
              px-2
              py-2
              border-[#f9951e]
            " />
                </div>
                <table class="min-w-full divide-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="
                  py-3.5
                  pl-4
                  space-x-3
                  uppercase
                  tracking-wider
                  font-rubik-light
                  text-left text-sm
                  font-semibold
                  text-gray-900
                ">
                                Source of Fund
                            </th>

                            <th scope="col" class="
                  py-3.5
                  pl-4
                  uppercase
                  tracking-wider
                  font-rubik-light
                  text-center text-sm
                  font-semibold
                  text-gray-900
                ">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="fund in allFunds" :key="fund.value">
                            <td class="
                  whitespace-nowrap
                  uppercase
                  p-4
                  text-sm
                  font-rubik-light
                  tracking-wider
                ">
                                {{ fund.label }}
                            </td>
                            <td class="
                  whitespace-nowrap
                  uppercase
                  text-center
                  p-4
                  text-sm
                  font-rubik-light
                  tracking-wider
                ">
                                <button>
                                    <EditIcon @click="openModal(true, fund.value)" class="text-[#F9951E]" />
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End  Source of funds-->

        <!-- Source of funds custom fields -->
        <div class="w-full p-4">
            <SmallHeading label="SOURCE OF FUNDS CUSTOM FIELDS" class="text-center" />
            <div class="bg-white px-4 shadow-md border border-gray-100 rounded-sm">
                <div class="w-full mb-4 flex justify-between">
                    <button></button>
                    <NormalButton @click.prevent="custom_openModal(false)" label="Add Custom Fields" class="
              mt-6
              hover:bg-[#f9951e]
              uppercase
              tracking-wider
              font-rubik-light
              text-sm
              duration-300
              text-[#f9951e]
              hover:text-white
              border-2
              px-2
              py-2
              border-[#f9951e]
            " />
                </div>
                <table class="min-w-full divide-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="
                  py-3.5
                  pl-4
                  space-x-3
                  uppercase
                  tracking-wider
                  font-rubik-light
                  text-left text-sm
                  font-semibold
                  text-gray-900
                ">
                                Name
                            </th>
                            <th scope="col" class="
                  py-3.5
                  pl-4
                  space-x-3
                  uppercase
                  tracking-wider
                  font-rubik-light
                  text-left text-sm
                  font-semibold
                  text-gray-900
                ">
                                Custom Fields
                            </th>
                            <th scope="col" class="
                  py-3.5
                  pl-4
                  uppercase
                  tracking-wider
                  font-rubik-light
                  text-center text-sm
                  font-semibold
                  text-gray-900
                ">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="(field, index) in allPaginatedFields.data">
                            <td class="
                  whitespace-nowrap
                  uppercase
                  p-4
                  text-sm
                  font-rubik-light
                  tracking-wider
                ">
                                {{ field.fund_name.meta_value }}
                            </td>
                            <td class="
                  whitespace-nowrap
                  hover:cursor-pointer
                  text-blue-500
                  hover:underline
                  uppercase
                  p-4
                  text-sm
                  font-rubik-light
                  tracking-wider
                  text-center
                ">
                                <button href="#" @click.prevent="showField(index)">
                                    {{ index == itemToShow ? "HIDE" : "SHOW" }}
                                    CUSTOM FIELDS
                                </button>

                                <!-- modal -->

                                <div v-show="index == itemToShow" class="
                    bg-white
                    duration-300
                    border border-gray-300
                    absolute
                    right-[100px]
                    top-[300px]
                    pt-10
                    pb-4
                    px-4
                    rounded-sm
                    shadow-xl
                  ">
                                    <SmallHeading :label="'Fields For ' + field.fund_name.meta_value"
                                        class="text-center mt-1 mb-3" />
                                    <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                                        <button type="button" class="
                        rounded-md
                        bg-white
                        text-gray-400
                        hover:text-gray-500
                        focus:outline-none
                        focus:ring-2
                        focus:ring-indigo-500
                        focus:ring-offset-2
                      " @click="hideField(index)">
                                            <span class="sr-only">Close</span>
                                            <svg class="h-6 w-6" x-description="Heroicon name: outline/x-mark"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <table class="
                      w-full
                      table table-sm
                      animate__animated animate__fadeIn
                    ">
                                        <thead class="bg-gray-200">
                                            <th scope="col" class="
                          py-3.5
                          pl-4
                          pr-3
                          text-left text-sm
                          font-semibold
                          text-gray-900
                          sm:pl-6
                        ">
                                                TYPE
                                            </th>
                                            <th scope="col" class="
                          py-3.5
                          pl-4
                          pr-3
                          text-left text-sm
                          font-semibold
                          text-gray-900
                          sm:pl-6
                        ">
                                                LABEL
                                            </th>
                                            <th scope="col" class="
                          py-3.5
                          pl-4
                          pr-3
                          text-left text-sm
                          font-semibold
                          text-gray-900
                          sm:pl-6
                        ">
                                                MANDATORY
                                            </th>
                                        </thead>

                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr v-for="(val, index) in JSON.parse(field.fields)" :key="index">
                                                <td class="
                            whitespace-nowrap
                            py-4
                            pl-4
                            pr-3
                            text-sm
                            font-medium
                            text-gray-900
                            sm:pl-6
                          ">
                                                    {{ val.type }}
                                                </td>
                                                <td class="
                            whitespace-nowrap
                            py-4
                            pl-4
                            pr-3
                            text-sm
                            font-medium
                            text-gray-900
                            sm:pl-6
                          ">
                                                    {{ val.label }}
                                                </td>
                                                <td class="
                            whitespace-nowrap
                            py-4
                            pl-4
                            pr-3
                            text-sm
                            font-medium
                            text-gray-900
                            sm:pl-6
                          ">
                                                    {{ val.require == true ? "YES" : "NO" }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- end of modal -->
                            </td>
                            <td class="
                  whitespace-nowrap
                  uppercase
                  text-center
                  p-4
                  text-sm
                  font-rubik-light
                  tracking-wider
                ">
                                <button>
                                    <EditIcon @click="custom_openModal(true, field.id)" class="text-[#F9951E]" />
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Source of funds custom fields -->

        <!-- Modal -->
        <Slideover :show="slideoverOpen" @close="slideoverOpen = false" title="ADD SOURCE OF FUNDS">
            <form @submit.prevent="!editMode ? storeFund() : updateFund()" class="mt-4">
                <div class="">
                    <InputLabel label="Name" />
                    <SettingsInput type="text" :class="{ 'border border-red-500': validationErrors.name }"
                        class="w-full uppercase" v-model="funds.name" placeholder="Name of Funding"
                        @keydown.enter.prevent="!editMode ? storeFund : updateFund" />
                    <label v-if="validationErrors.name" class="text-xs absolute uppercase text-red-500 tracking-widest">
                        {{ validationErrors.name[0] }}
                    </label>
                </div>

                <div class="fixed bottom-1">
                    <div class="">
                        <a @click="closeModal()" class="
                mr-1
                border-[3px]
                transition
                ease-in-out
                delay-150
                hover:translate-y-1
                duration-300
                border-[#3E3E3E]
                bg-[#3E3E3E]
                py-2
                px-20
                text-sm
                font-medium
                text-white
                uppercase
                tracking-widest
                shadow-sm
                hover:bg-[#2e2d2d] hover:text-white
                focus:outline-none
                focus:ring-2
                focus:ring-indigo-500
                focus:ring-offset-2
              " label="Close">Close</a>

                        <NormalBtn type="submit" label="save" class="
                border-[3px]
                transition
                ease-in-out
                delay-150
                hover:translate-y-1
                duration-300
                hover:border-[#F26400]
                border-#F9951E
                bg-white
                py-2
                px-20
                text-sm
                font-medium
                text-[#F9951E]
                uppercase
                tracking-widest
                shadow-sm
                hover:bg-[#F26400] hover:text-white
                focus:outline-none
                focus:ring-2
                focus:ring-indigo-500
                focus:ring-offset-2
              " />
                    </div>
                </div>
            </form>
        </Slideover>
        <!-- End Modal -->

        <!-- Modal -->
        <Slideover :show="custom_slideoverOpen" @close="custom_slideoverOpen = false" title="ADD CUSTOM FIELDS">
            <form @submit.prevent="!editMode ? storeField() : updateField()" class="mt-4">
                <div class="w-full">
                    <InputLabel label="Source of Funds" />

                    <v-select v-model="customFields.source_of_funds" class="border w-full mr-2"
                        placeholder="Select Source of Funds" :options="allFunds" :disabled="editMode">
                    </v-select>
                </div>

                <div class="w-full">
                    <InputLabel label="Input Type" />

                    <div class="flex items-center">
                        <v-select v-model="inputType" class="border w-full mr-2" placeholder="Select Input Type"
                            :options="inputTypes">
                        </v-select>

                        <button @click.prevent="addSelection()" class="
                bg-white
                px-4
                text-[#F9951E]
                hover:text-white
                font-bold
                py-2
                rounded-sm
                border-[2px]
                transition
                ease-in-out
                delay-150
                hover:translate-y-1
                duration-300
                hover:border-[#F26400]
                border-#F9951E
                hover:bg-[#F26400]
              ">
                            <PlusIcon class="w-4 h-4" />
                        </button>
                    </div>
                </div>

                <div class="flex space-x-4 mt-4" v-for="(item, index) in customFields.fields" :key="index">
                    <div class="w-full">
                        <div class="flex">
                            <InputLabel :label="'Label for ' + item.type + ' type'" :class="'grow w-40'" />

                            <InputLabel label="Mandatory" :class="'grow mr-5'" />
                        </div>
                        <div class="flex justify-between">
                            <SettingsInput type="text" v-model="item.label"
                                @keydown.enter.prevent="!editMode ? storeFund : updateFund"
                                :placeholder="'Sample Label for ' + item.type + ' type'" />

                            <input v-model="item.require" class="
                  h-4
                  w-4
                  rounded
                  border-gray-300
                  text-indigo-600
                  focus:ring-indigo-500
                " type="checkbox" id="flexCheckDefault" />
                            <button v-if="customFields.fields.length > 0" @click.prevent="removeSelection(index)" class="
                  ml-2
                  bg-white
                  px-4
                  text-red-500
                  hover:text-white
                  font-bold
                  py-2
                  rounded-sm
                  border-[3px]
                  transition
                  ease-in-out
                  delay-150
                  hover:translate-y-1
                  duration-300
                  hover:border-red-500
                  border-red-500
                  hover:bg-mid-red
                ">
                                <MinusIcon class="w-4 h-4" />
                            </button>
                        </div>
                        <vue-tags-input v-if="item.type == inputTypes[6].value" v-model="item.tag" :tags="item.tags"
                            @tags-changed="(newTags) => (item.tags = newTags)" class="
                mt-5
                tracking-wider
                w-full
                uppercase
                font-rubik-light
                placeholder:text-[#3e3e3e]
              " @input="updateRow" />
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex">
                        <a @click="custom_closeModal" class="
                mr-1
                border-[3px]
                transition
                ease-in-out
                delay-150
                hover:translate-y-1
                duration-300
                border-[#3E3E3E]
                bg-[#3E3E3E]
                py-2
                px-20
                text-sm
                font-medium
                text-white
                uppercase
                tracking-widest
                shadow-sm
                hover:bg-[#2e2d2d] hover:text-white
                focus:outline-none
                focus:ring-2
                focus:ring-indigo-500
                focus:ring-offset-2
              ">Close
                        </a>

                        <NormalBtn type="submit" :label="!editMode ? 'save' : 'update'" class="
                border-[3px]
                transition
                ease-in-out
                delay-150
                hover:translate-y-1
                duration-300
                hover:border-[#F26400]
                border-#F9951E
                bg-white
                py-2
                px-20
                text-sm
                font-medium
                text-[#F9951E]
                uppercase
                tracking-widest
                shadow-sm
                hover:bg-[#F26400] hover:text-white
                focus:outline-none
                focus:ring-2
                focus:ring-indigo-500
                focus:ring-offset-2
              " />
                    </div>
                </div>
            </form>
        </Slideover>
        <!-- End Modal -->
    </div>
</template>

<script>
import Form from "vform";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import AddBtn from "@/Components/Misc/Buttons/AddButton.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import ModalButtonSave from "@/Components/Misc/Buttons/ModalButtonSave.vue";
import ModalButtonCancel from "@/Components/Misc/Buttons/ModalButtonCancel.vue";
import InputWithLabel from "@/Components/Misc/Input/InputWithLabel.vue";
import FloatingInput from "@/Components/Misc/Input/FloatingInput.vue";
import NormalButton from "../../../../Misc/Buttons/NormalButton.vue";
import SettingsInput from "../../../../Misc/Input/SettingsInput.vue";
import InputLabel from "../../../../Misc/Input/InputLabel.vue";
import PlusIcon from "../../../../Misc/Icons/PlusIcon.vue";

import MinusIcon from "../../../../Misc/Icons/MinusIcon.vue";
import SmallHeading from "../../../../Misc/Heading/SmallHeading.vue";
import NormalBtn from "../../../../Misc/Buttons/NormalButton.vue";
import VueTagsInput from "@sipec/vue3-tags-input";

import { successMessage, errorMessage } from "@/utils/toast.js";

export default {
    name: "SourceOfFund",
    props: {
        api_access: {
            type: Array,
            default: [],
        },
    },
    components: {
        Slideover,
        EditIcon,
        AddBtn,
        ModalButtonSave,
        ModalButtonCancel,
        InputWithLabel,
        FloatingInput,
        NormalButton,
        SettingsInput,
        InputLabel,
        PlusIcon,
        MinusIcon,
        SmallHeading,
        VueTagsInput,
        NormalBtn,
    },
    data() {
        return {
            slideoverOpen: false,
            custom_slideoverOpen: false,
            itemToShow: -1,
            funds: new Form({
                id: "",
                ref: "SOURCE_OF_FUNDS",
                code: "",
                name: "",
            }),
            allFunds: [],
            asd: [],
            editMode: false,
            customFields: new Form({
                id: "",
                source_of_funds: "",
                ref: "SOURCE_OF_FUNDS",
                fields: [],
                name: "",
            }),
            allCustomFields: [],
            allPaginatedFields: [],
            validationErrors: [],
            inputTypes: [
                { label: "Text", value: "text" },
                { label: "Date", value: "date" },
                { label: "Number", value: "number" },
                { label: "File", value: "file" },
                { label: "Image", value: "image" },
                { label: "Email", value: "email" },
                { label: "Select", value: "select" },
            ],
        };
    },
    methods: {
        openModal(clickByEdit = null, id = null) {
            this.slideoverOpen = true;
            this.editMode = clickByEdit;

            if (this.editMode == true) {
                this.fetchFund(id);
            } else {
                // this.funds = {};
            }
        },
        closeModal() {
            this.slideoverOpen = false;
            this.funds.reset();
        },
        custom_openModal(clickByEdit = null, id = null) {
            this.custom_slideoverOpen = true;
            this.editMode = clickByEdit;
            // this.customFields = "";
            if (this.editMode == true) {
                this.fetchField(id);
            }
        },
        custom_closeModal() {
            this.custom_slideoverOpen = false;

            this.customFields.reset();
        },
        addSelection() {
            console.log("fields", this.customFields);
            this.customFields.fields.push({
                type: this.inputType.value,
                label: "",
                require: true,
            });
        },
        removeSelection(index) {
            this.customFields.fields.splice(index, 1);
        },
        async getFunds() {
            await axios
                .get("/api/maintenance/funds")
                .then((response) => {
                    this.allFunds = response.data;
                    console.log("funds", this.allFunds);
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in fetching the Fund.",
                        "top-right"
                    );
                });
        },
        async fetchFund(id) {
            await axios
                .get("/api/maintenance/funds/" + id)
                .then((response) => {
                    this.funds.fill(response.data);
                    this.funds.name = response.data.meta_value;
                    this.funds.ref = response.data.meta_name;
                    console.log("funds", this.funds);
                })
                .catch((error) => {
                    console.log(error);
                    console.log(error);
                    errorMessage(
                        "Oops!",
                        "Something went wrong in fetching the Fund.",
                        "top-right"
                    );
                    console.log(error);
                    errorMessage(
                        "Oops!",
                        "Something went wrong in fetching the Fund.",
                        "top-right"
                    );
                });
        },
        async storeFund() {
            console.log("store", this.funds);

            this.funds
                .post("/api/maintenance/funds/store")
                .then((response) => {
                    successMessage("Success!", response.data.message, "top-right");
                    this.funds.reset();
                    this.getFunds();
                    this.closeModal();
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in creating the fund.",
                        "top-right"
                    );
                    this.validationErrors = error.response.data.errors;
                });
        },
        async updateFund() {
            axios
                .put("/api/maintenance/funds/update/ " + this.funds.id, this.funds)
                .then((response) => {
                    successMessage("Success!", response.data.message, "top-right");
                    this.getFunds();
                    this.closeModal();
                })
                .catch((error) => {
                    console.log(error);
                    errorMessage(
                        "Oops!",
                        "Something went wrong in updating the fund.",
                        "top-right"
                    );
                    this.validationErrors = error.response.data.errors;

                });
        },
        async getCustomFields() {
            await axios
                .get("/api/custom-fields")
                .then((response) => {
                    this.allPaginatedFields = response.data.data;
                    this.allCustomFields = this.allPaginatedFields.data;
                    console.log(this.allCustomFields);
                })
                .catch((error) => { });
        },
        async storeField() {
            console.log("store field", this.customFields);

            this.customFields
                .post("/api/custom-fields")
                .then((response) => {
                    successMessage("Success!", response.data.message, "top-right");
                    this.getCustomFields();
                    this.custom_closeModal();
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in storing the Custom Field/s.",
                        "top-right"
                    );
                });
        },
        async fetchField(id) {
            await axios
                .get("/api/custom-fields/" + id)
                .then((response) => {
                    //   this.customFields = response.data;

                    this.customFields.source_of_funds = {
                        value: response.data.fund_id,
                        label: response.data.label,
                    };
                    this.customFields.fields = [...response.data.fields];
                    this.customFields.ref = response.data.ref;
                    this.customFields.id = response.data.value;
                    this.customFields.name = this.customFields.label;

                    console.log("fetch field", response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async updateField() {
            this.customFields.id = this.customFields.source_of_funds.value;
            this.customFields.name = this.customFields.source_of_funds.label;

            axios
                .put("/api/custom-fields/" + this.customFields.id, this.customFields)
                .then((response) => {
                    successMessage("Success!", response.data.message, "top-right");
                    this.getCustomFields();
                    this.custom_closeModal();
                })
                .catch((error) => {
                    console.log(error);
                    errorMessage(
                        "Oops!",
                        "Something went wrong in updating the Custom Field/s.",
                        "top-right"
                    );
                });
        },
        showField(index) {
            this.itemToShow = index;
        },
        hideField(index) {
            this.itemToShow = -1;
        },
    },
    async created() {
        await this.getFunds();
        await this.getCustomFields();
    },
};
</script>
