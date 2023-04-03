<script>
import Search from "../../../Misc/Search/Search.vue";
import Title from "../../../Misc/Section/Title.vue";
import NormalBtn from "../../../Misc/Buttons/NormalButton.vue";
import SwitchToggle from "../../../Misc/Switch(Toggle)/SwitchToggle.vue";
import EditIcon from "../../../Misc/Icons/EditIcon.vue";
import Form from "vform";

import Pagination from "../../../Misc/Pagination/Pagination.vue";

import { TailwindPagination } from "laravel-vue-pagination";
import axios from "axios";

export default {
    components: {
        Title,
        Search,
        NormalBtn,
        SwitchToggle,
        EditIcon,
        TailwindPagination,
        Pagination,
    },
    data() {
        return {
            data: [],
            fields: [],
            pagination: {
                current_page: 1,
            },
            sortByAscending: true,
            column: "",
            columns: [
                { name: "id", sortByAsc: true },
                { name: "transaction_name", sortByAsc: true },
                { name: "ref", sortByAsc: true },
            ],
            search: "",
            filter_value: "",
            per_page: 1,
            perPageOptions: [
                { value: 1, label: "1" },
                { value: 2, label: "2" },
                { value: 3, label: "3" },
                { value: 5, label: "5" },
                { value: 10, label: "10" },
                { value: 15, label: "15" },
                { value: 20, label: "20" },
                { value: 25, label: "25" },
                { value: 50, label: "50" },
            ],
        };
    },
    methods: {
        async allData() {
            await axios
                .get("/api/maintenance/data-entry", {
                    params: {
                        page: this.pagination.current_page,
                        per_page: this.per_page,
                        column: this.column,
                        sortBy: this.sortByAscending,
                    },
                })
                .then((response) => {
                    this.data = response.data.data.data;
                    this.pagination = response.data.data;
                })
                .catch((error) => {
                    errorMessage(
                        "Oops!",
                        "Something went wrong in fetching the datas.",
                        "top-right"
                    );
                });
        },
        sort(column) {
            this.columns.filter((columns) => {
                if (columns.name == column.name) {
                    columns.sortByAsc = !column.sortByAsc;
                    this.sortByAscending = columns.sortByAsc;
                }
            });
            // console.log("columns", column);
            this.column = column.name;
            this.allData();
        },
        receieve_per_page(data) {
            this.per_page = data.value;
            this.pagination.current_page = 1;
            this.allData();
        },
        receive_filter_value(data) {
            this.filter(data);
        },
    },
    async created() {
        await this.allData();
    },
};
</script>
<template>
    <div class="bg-white w-full min-h-screen border border-white">
        <div class="px-4 sm:px-6 lg:px-8 mt-10">
            <div class="flex justify-between">
                <div class="mt-4 sm:mt-0 sm:flex-none">
                    <div class="relative flex w-full">
                        <Search v-on:filterValue="receive_filter_value" />
                        <NormalBtn
                            label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white"
                        />
                    </div>
                </div>
                <router-link :to="{ path: '/app/settings/data-entry/create' }">
                    <NormalBtn
                        label="Create New One"
                        class="h-[50px] text-[#F9951E] font-medium hover:bg-[#f78c0c] hover:text-white w-[234px] uppercase tracking-wider border-[3px] border-[#F9951E]"
                    />
                </router-link>

                <!-- </router-link> -->
            </div>
            <div class="flex justify-between">
                <div class="flex">
                    <DropDown label="bulk action" />
                </div>
            </div>

            <div class="mt-4 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                    >
                        <div
                            class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5"
                        >
                            <table
                                class="min-w-full table-auto divide-y divide-gray-300"
                            >
                                <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-solid">
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 uppercase text-left text-sm font-semibold text-gray-900"
                                        >
                                            <span
                                                @click="sort(this.columns[0])"
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer"
                                            >
                                                ID

                                                <svg
                                                    v-if="
                                                        !this.columns[0]
                                                            .sortByAsc
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="ml-1 w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M4.5 15.75l7.5-7.5 7.5 7.5"
                                                    />
                                                </svg>

                                                <svg
                                                    v-else
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="ml-1 w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                                    />
                                                </svg>
                                            </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900"
                                        >
                                            <span
                                                @click="sort(this.columns[1])"
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer"
                                            >
                                                Transaction Type

                                                <svg
                                                    v-if="
                                                        !this.columns[1]
                                                            .sortByAsc
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="ml-1 w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M4.5 15.75l7.5-7.5 7.5 7.5"
                                                    />
                                                </svg>

                                                <svg
                                                    v-else
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="ml-1 w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                                    />
                                                </svg>
                                            </span>
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900"
                                        >
                                            <span
                                                @click="sort(this.columns[2])"
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer"
                                            >
                                                Section Name

                                                <svg
                                                    v-if="
                                                        !this.columns[2]
                                                            .sortByAsc
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="ml-1 w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M4.5 15.75l7.5-7.5 7.5 7.5"
                                                    />
                                                </svg>

                                                <svg
                                                    v-else
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="ml-1 w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                                                    />
                                                </svg>
                                            </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900"
                                        >
                                            <span
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer"
                                            >
                                                Custom Fields
                                            </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 uppercase text-center text-sm font-semibold text-gray-900"
                                        >
                                            <span
                                                class="flex ml-6 my-3 uppercase whitespace-nowrap hover:cursor-pointer"
                                            >
                                                Actions
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y divide-gray-200 bg-white"
                                >
                                    <tr
                                        v-for="(row, index) in data"
                                        :key="index"
                                        class="divide-x divide-gray-200"
                                    >
                                        <td
                                            class="whitespace-nowrap text-center uppercase px-3 py-4 text-sm text-[#3E3E3E]"
                                        >
                                            {{ row.id }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase px-3 py-4 text-sm text-[#3E3E3E]"
                                        >
                                            {{ row.transaction_name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase px-3 py-4 text-sm text-[#3E3E3E]"
                                        >
                                            {{ row.ref }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase px-3 py-4 text-sm text-[#3E3E3E]"
                                        >
                                            {{ row.fields }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase flex space-x-3 justify-center text-center px-3 py-4 text-sm text-[#3E3E3E]"
                                        >
                                            <router-link
                                                :to="{
                                                    name: 'edit-data-entry',
                                                    params: { id: row.id },
                                                }"
                                            >
                                                <EditIcon
                                                    class="text-#F9951E"
                                                />
                                            </router-link>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  -->
                <Pagination
                    @paginate="allData()"
                    :pagination="pagination"
                    :offset="5"
                    v-on:numberOfPage="receieve_per_page"
                    class="mt-5"
                />
            </div>
        </div>
    </div>
</template>
