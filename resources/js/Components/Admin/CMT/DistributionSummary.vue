<script setup>
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";


</script>

<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '../../Misc/Dropdown/Dropdown.vue';

export default{

    name:'DistributionSummary',

    components:{
        DropDown,
        EditIcon,
        NormalButton,
        SearchIcon,
        InputLabel

    },

    data() {
        return {
            distributionSummary: [],
            pagination: {
                current_page: 1,
            }

        }
    },
    methods: {
        async getDistributionSummary() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.distributionSummary = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
    <div class=" h-auto w-auto mb-3 mx-10">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="flex items-end justify-between h-auto min-w-full -mx-12">
                    <div class="flex justify-start flex-col space-x-3 ">
                        <div class="flex left-side-col-1 ">
                            <div>
                                <InputLabel label="Start Date" />
                                <br/>
                                <input class="text-[11px] border border-gray-300 p-2 mr-2" type="date" />
                            </div>
                            <div>
                                <InputLabel label="End Date" />
                                <br/>
                                <input class="text-[11px] border border-gray-300 p-2 mr-2" type="date" />
                            </div>
                            <div>
                                <br/>
                                <NormalButton label="Format"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                            </div>
                        </div>
                        <div class="left-side-col-2 space-y-3">
                            <DropDown label="bulk action" class="-m-3" />
                            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px]  p-1.5 text-sm text-white px-3 uppercase" />
                        </div>
                    </div>
                        <div class="right-side flex h-20 ">
                        <form class="flex items-start">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                    placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                        </form>
                    </div>
                 </div>
            </div>
        <div class="overflow-hidden sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 -mx-4">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7]">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="py-3.5 px-4 space-x-3 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">                                        <input type="checkbox" />
                                    <span>
                                    BATCH ID
                                    </span>
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                    FILENAME
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                    ITEM COUNT
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                    TOTAL AMOUNT
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center  text-sm font-normal text-gray-900">
                                    EXCHANGE RATE
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                    PROCESSED DATE
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                    VALUE DATE
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 uppercase tracking-wider font-rubik-light text-center text-sm font-normal text-gray-900">
                                    ACTION
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
                                      -12-13
                                </td>
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
            <Pagination @paginate="getDistributionSummary()"  :pagination="pagination"
                :offset="5" />
        </div>
    </div>
</template>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(20px);
    opacity: 0;
}
</style>
