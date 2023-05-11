    <script setup>
    import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
    import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
    import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
    import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
    import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
    import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
    import DateInput from "@/Components/Misc/Input/DateInput.vue";


    </script>

    <script>
    import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
    import DropDown from '../../../Misc/Dropdown/Dropdown.vue';

    export default {

        name:'DistributionSummary',

        components:{
            DropDown,
            EditIcon,
            NormalButton,
            SearchIcon,
            InputLabel,
            ListIcon,
            DateInput,
            Pagination,
        },

        data() {
            return {
                distributionSummary: [],
                pagination: {
                    current_page: 1,
                },

                    labels: [
                    { label: 'FILENAME' },
                    { label: 'Item Count'},
                    { label: 'Total Amount' },
                    { label: 'Exchange Rate'},
                    { label: 'PROCESSED date' },
                    { label: 'VALUE date' },
                    { label: 'Action' },
                ],
                bulkOption:[
                    'Option 1',
                    'Option 2',
                    'Option 3',
                ]

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
     <div class="w-full h-auto bg-white px-3  ">
        <div class="inline-block min-w-full align-middle">
            <div class="flex justify-between h-full min-w-full ">
                <div class="flex justify-start flex-col space-x-3">
                    <div class="flex items-end gap-3 left-side-col-1">
                        <div>
                            <DateInput label="Start Date" />
                        </div>
                        <div>
                            <DateInput label="End Date" />
                        </div>
                        <div>
                            <NormalButton label="Filter"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                        </div>
                    </div>
                    <div class="left-side-col-2 space-y-3 text-[10px] mb-4">
                        <DropDown label="bulk action" :options="bulkOption" class="-m-3" />
                        <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] p-1.5 text-[10px] text-white px-3 uppercase" />
                    </div>
                </div>
                <div class="right-side mt-[5px]">
                    <form class="flex items-start gap-3">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <SearchIcon />
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] font-light block w-full pl-10 p-2.5"
                                placeholder="Search" required />
                        </div>
                        <NormalButton label="Go"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                        <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                    </form>
                </div>
            </div>
        </div>
        <div class="min-w-full py-2 align-middle ">
            <div class="relative h-[360px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="py-1 px-2 uppercase tracking-wider text-center text-gray-900 w-full">
                                    <div class="flex items-center ">
                                    <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-1" />
                                    Batch ID
                                    </div>
                                </th >
                                <th v-for="label in labels" :key="label.label" scope="col"
                                class="py-1 px-2 uppercase tracking-wider text-center text-gray-900 w-full">
                                {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] ">
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 lg:mr-5 md:mr-2" />
                                        01
                                    </div>

                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA AL ANSARI exchange
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    REDHA-09282022-0001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    CMT-09282022-0009
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    PHP
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    25,000.13
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-2 tracking-wider">
                                    BDO
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <Pagination @paginate="getDistributionCancellation()" :pagination="pagination"
        :offset="1" class="mt-8" />

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
