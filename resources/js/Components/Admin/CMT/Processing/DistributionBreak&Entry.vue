<script>
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import EditIcon from '@/Components/Misc/Icons/EditIcon.vue';
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import Pagination from '@/Components/Misc/Pagination/Pagination.vue';

export default {
    name: 'Break&Entry',
    components: { SearchIcon, NormalButton, EditIcon, Pagination },
    data() {
        return {
            BreakEntry: [],
            pagination: {
                current_page: 1,
            }

        }
    },
    methods: {
        async getBreakEntry() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.BreakEntry = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
        createBreakEntry() {
            this.$router.push("");
        },
    },
    created() {
        this.getBreakEntry();
    }
}
</script>
<template>
    <div class="w-full  bg-white ">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="flex justify-end mb-8">
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
                                <NormalButton label="Go"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                                <NormalButton label="Export"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mb-8 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            REFERENCE NO.
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            PROCESSED DATE
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            VALUE DATE
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            BANK
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-center  text-sm font-normal text-gray-900">
                                            CURRENCY
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            ITEMS
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            AMOUNT
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="biller in billers" :key="biller.id" class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap space-x-3 uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            <input type="checkbox" />
                                            <span>
                                                1
                                            </span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            11-12-13

                                        </td>g
                                        <td
                                            class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ biller.name }}
                                        </td>

                                        <td
                                            class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ biller.created_at }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-center p-4 text-sm font-rubik-light tracking-wider">
                                            <button>
                                                <EditIcon class="text-[#F9951E] w-full" />
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <Pagination @paginate="getBreakEntry()"  :pagination="pagination"
                        :offset="5" />
                </div>
            </div>
        </div>
    </div>
</template>
