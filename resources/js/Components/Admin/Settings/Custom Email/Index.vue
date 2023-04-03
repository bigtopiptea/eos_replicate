<script>
import Title from "../../../Misc/Section/Title.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import Pagination from "../../../Misc/Pagination/Pagination.vue";
import Form from "vform";
import axios from "axios";

export default {
    components: {
        Title,
        NormalButton,
        EditIcon,
        SearchIcon,
        Pagination,
    },
    data() {
        return {
            form: new Form({}),
            data: [],
        };
    },
    methods: {
        add() {
            this.$router.push("/app/settings/email-contents/create");
        },
        async allData() {
            await axios
                .get("/api/maintenance/custom-emails", {
                    // params: {
                    //     page: this.pagination.current_page,
                    //     per_page: this.per_page,
                    //     column: this.column,
                    //     sortBy: this.sortByAscending,
                    // },
                })
                .then((response) => {
                    this.data = response.data.data;
                    console.log(this.data);
                    // this.pagination = response.data.data;
                })
                .catch((error) => {
                    // errorMessage(
                    //     "Oops!",
                    //     "Something went wrong in fetching the datas.",
                    //     "top-right"
                    // );
                });
        },
    },
    async created() {
        await this.allData();
    },
};
</script>
<template>
    <div class="w-full border shadow-md bg-white border-white">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="flex justify-between mb-8">
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <div class="relative w-full">
                            <form class="flex mt-10 items-center">
                                <div class="relative w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                    >
                                        <SearchIcon />
                                    </div>
                                    <input
                                        type="text"
                                        id="simple-search"
                                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                        placeholder="Search"
                                        required
                                    />
                                </div>
                                <NormalButton
                                    label="Go"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white"
                                />
                                <NormalButton
                                    label="Export"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white"
                                />
                            </form>
                        </div>
                    </div>
                    <NormalButton
                        label="Add"
                        @click="add()"
                        class="h-[40px] mt-10 text-[#F9951E] font-rubik-light duration-300 hover:bg-[#f78c0c] hover:text-white w-[200px] uppercase tracking-wider border-[3px] border-[#F9951E]"
                    />
                </div>
                <div class="mb-8 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                    >
                        <div
                            class="overflow-hidden shadow ring-1 ring-black ring-opacity-5"
                        >
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-gray-200">
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 space-x-3 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900"
                                        >
                                            <input type="checkbox" />
                                            <span> ID </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900"
                                        >
                                            Email Type
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900"
                                        >
                                            Subject
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900"
                                        >
                                            Recipient
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900"
                                        >
                                            Created By
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y divide-gray-200 bg-white"
                                >
                                    <tr
                                        v-for="item in data"
                                        :key="item.id"
                                        class="divide-x divide-gray-200"
                                    >
                                        <td
                                            class="whitespace-nowrap space-x-3 uppercase p-4 text-sm font-rubik-light tracking-wider"
                                        >
                                            <input type="checkbox" />
                                            <span>
                                                {{ item.id }}
                                            </span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider"
                                        >
                                            {{ item.type }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider"
                                        >
                                            {{ item.subject }}
                                        </td>

                                        <td
                                            class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider"
                                        >
                                            {{ item.recipient }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider"
                                        >
                                            {{ item.user.user_name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase flex space-x-3 justify-center text-center px-3 py-4 text-sm text-[#3E3E3E]"
                                        >
                                            <router-link
                                                :to="{
                                                    name: 'edit-email-contents',
                                                    params: { id: item.id },
                                                }"
                                            >
                                                <EditIcon
                                                    class="text-#F9951E"
                                                />
                                            </router-link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <Pagination
                        @paginate="getBillers()"
                        v-if="pagination.last_page > 1"
                        :pagination="pagination"
                        :offset="5"
                    /> -->
                </div>
            </div>
        </div>
    </div>
</template>
