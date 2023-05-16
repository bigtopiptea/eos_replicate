<script setup>
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import SolidButton from "@/Components/Misc/Buttons/SolidButton.vue";
export default {
    name: 'Daily Inventory Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        Pagination, BorderButton, DropDown, Slideover, InputGroup, SolidButton
    },
    data() {
        return {
            EndDayReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'TOTAL TRANSACTION COUNT'},
                {label:'TOTAL AMOUNT'},
                {label:'ACTION'},
            ],
            endDayReportOpen: false,
            paraIcon:'CHECK', //Icon Parameter
        }
    },
    methods: {
        // Slider
        endDayReportToggle(){
            this.endDayReportOpen = false;
        },
        async getEndDayReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.EndDayReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

    },
}
</script>
<template>
    <div class="3xl:container h-screen bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex justify-between items-center mx-[12px]">
                <div class="flex gap-[10px] w-[48%]">
                    <div class="w-[75%]">
                        <form class="flex items-start gap-3">
                            <div class="flex">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <SearchIcon />
                                    </div>
                                    <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                                    placeholder="Search" required />
                                </div>
                                <NormalButton label="Go"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                            </div>
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                        </form>
                    </div>
                </div>
                <div>
                    <BorderButton :buttonLabel="'END OF DAY'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[120px]'" :buttonStyle="'border-2 border-#F9951E text-#F9951E text-[13px]'" @click="(endDayReportOpen = !endDayReportOpen)"/>
                </div>
            </div>
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[30px]">
                <div class="flex justify-end ">
                    <div class="flex items-end ">
                            <DropDown label="bulk action"/>
                        <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] text-[10px] text-white px-3 uppercase" />
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex flex-col h-auto pb-10">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <div class="text-center">
                    <h3 class="text-[13px]">END OF DAY REPORT</h3>
                    <p class="text-[12px]">09/28/2022 -  09/28/2022</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="overflow-hidden w-full px-3">
                <div class="inline-block min-w-full  align-middle ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                        <table class="min-w-full divide-y divide-gray-300 overflow-x-scroll">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <th class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        <div class="relative flex justify-center">
                                            <input class="absolute left-[15px]" type="checkbox" name="" id="">
                                            <span>PROCESSING TYPE</span>
                                        </div>
                                    </th>
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        <div class="relative flex justify-center">
                                            <input class="absolute left-[15px]" type="checkbox" name="" id="">
                                            <span>distribution</span>
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        X,XXX
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        X,XXX,XXX.XX
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        <button  @click="(viewVerifyFundingOpen = !viewVerifyFundingOpen)" type="submit">
                                            <img src="../../../../../assets/images/FindDocsIcon.png" alt="FindDocs Icon" class="h-5 w-5">
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="text-[11px] font-semibold bg-[#D7D7D7]">
                                <tr>
                                    <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider"></td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">XX,XXX.XX</td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">XX,XXX.XX</td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <Pagination @paginate="getEndDayReport()" :pagination="pagination"
                    :offset="1" class="mt-8" />
        </div>
    </div>

    <Slideover :show="endDayReportOpen" @close="endDayReportToggle" :title="'CONFIRM END OF THE DAY'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between h-full pb-[20px]">
            <div class="mx-10 h-auto ">
                <div class="mt-[30px] flex flex-col gap-3">
                    <div>
                        <InputGroup :inputType="'text'" :inputLabel="'total count'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                    <div>
                        <InputGroup :inputType="'text'" :inputLabel="'total amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[100px]">
                <div class="flex flex-col gap-[25px] text-center text-[14px] uppercase whitespace-normal leading-3">
                    <p>CLICK <span class="font-bold">‘CONFIRM’</span>  TO PROCEED</p>
                    <p>AND <span class="font-bold">'CANCEL'</span> TO REVERT.</p>
                </div>
                <div class="flex justify-center gap-[100px] border-black">
                    <BorderButton @click="(endDayReportOpen = !endDayReportOpen)"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                    <BorderButton :buttonLabel="'CONFIRM'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
                </div>
            </div>
        </div>
    </Slideover>
</template>
