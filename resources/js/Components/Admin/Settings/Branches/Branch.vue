<script>
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import Title from "../../../Misc/Section/Title.vue";
import SearchIcon from "../../../Misc/Icons/SearchIcon.vue";
import DropDown from "../../../Misc/Dropdown/Dropdown.vue";
import EditIcon from "../../../Misc/Icons/EditIcon.vue";
import Pagination from "../../../Misc/Pagination/Pagination.vue";

import axios from "axios";
import InputLabel from "../../../Misc/Input/InputLabel.vue";
import SettingsInput from "../../../Misc/Input/SettingsInput.vue";
export default {
    name: "Branch",
    components: {
        Title,
        NormalBtn,
        SearchIcon,
        DropDown,
        Pagination,
        EditIcon,
        InputLabel,
        SettingsInput
    },
    data() {
        return {
            branches: [],
            pagination: {
                current_page: 1,
            },
            branchTab: [
                {name: 'branch'},
                {name: 'create-branch'},
            ],
        };
    },
    methods: {
        async getBranches() {
            await axios
                .get(`/api/branches/pagination?page=${this.pagination.current_page}`)
                .then((response) => {
                    this.branches = response.data;
                    this.pagination = response.data;
                })
                .catch((error) => console.log(error));
        },
        editBranch(id) {
            this.$router.push(`/app/settings/edit/branch/${id}`);
        }
    },
    async created() {
        await this.getBranches();
    },
};
</script>
<template>
    <div class="w-full border shadow-md bg-white border-white h-screen">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-4 flex flex-col">
                <div class="flex justify-between">
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <div class="relative w-full">
                            <form class="flex items-center">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <SearchIcon />
                                    </div>
                                    <input type="text" id="simple-search"
                                           class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                           placeholder="Search" required />
                                </div>
                                <NormalBtn label="Go"
                                           class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                                <NormalBtn label="Export"
                                           class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                            </form>
                        </div>
                    </div>

                    <router-link :to="{ path: '/app/settings/create/branch' }">
                        <NormalBtn label="Add Branch"
                                   class="h-[40px] mt-10 text-[#F9951E] font-rubik-light duration-300 hover:bg-[#f78c0c] hover:text-white w-[200px] uppercase tracking-wider border-[3px] border-[#F9951E]" />
                    </router-link>
                </div>
                <div class=" flex justify-between">
                    <div class="flex">
                        <DropDown label="bulk action" />

                        <NormalBtn label="Apply"
                                   class="bg-[#F9951E] h-[34px] p-1.5 text-sm text-white px-3 uppercase" />

                        <DateInput label="Process Date" />
                    </div>
                </div>
                <div class="mb-8 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="p-4 whitespace-nowrap space-x-3 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                        <input type="checkbox" />
                                        <span>Branch Id</span>
                                    </th>
                                    <th scope="col"
                                        class="p-4 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                        Branch Name
                                    </th>
                                    <th scope="col"
                                        class="p-4 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                        Company Name
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-left whitespace-nowrap uppercase tracking-wider font-rubik-light text-sm font-semibold text-gray-900">
                                        Address
                                    </th>

                                    <th scope="col"
                                        class="p-4 text-center whitespace-nowrap uppercase tracking-wider font-rubik-light text-sm font-semibold text-gray-900">
                                        Currency
                                    </th>
                                    <th scope="col"
                                        class="p-4 whitespace-nowrap uppercase tracking-wider font-rubik-light text-sm font-semibold text-gray-900">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="branch in branches.data" :key="branch.id"
                                    class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap space-x-3 uppercase p-4 text-sm font-rubik-light tracking-wider">
                                        <input :value="branch.id" type="checkbox" />
                                        <span>
                                                {{ branch.id }}
                                            </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                        {{ branch.name }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                        {{ branch.company_name.name }}
                                    </td>

                                    <td
                                        class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                        {{ branch.address }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            <span v-for="currency in JSON.parse(branch.currency)" :key="currency">
                                                {{
                                                    currency.from_currency.label
                                                }}
                                                -
                                                {{ currency.to_currency.label }}
                                                <br />
                                            </span>
                                    </td>
                                    <!-- {{ JSON.parse(branch.currency) }} -->

                                    <td class="text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                        <button @click="editBranch(branch.id)">
                                            <EditIcon class="text-#F9951E " />
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <Pagination @paginate="getBranches()"  :pagination="pagination"
                                :offset="5" />
                </div>
            </div>
        </div>
    </div>
</template>

