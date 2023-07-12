<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import NAIcon from "@/Components/Misc/Icons/NAIcon.vue"
import DateInput from "@/Components/Misc/Input/DateInput.vue"
</script>

<script>
import JournalEntry from "@/Components/Admin/Distribution/Additional/JournalEntry.vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import Accordion from "@/Components/Misc/Accordion.vue"
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import axios from "axios";


export default {

    name:'DistributionAdjustment',

    components:{
    Tab, TabNav,
    JournalEntry,
    DropDown,
    EditIcon,
    NormalButton,
    SearchIcon,
    InputLabel,
    ListIcon,
    DateInput,
    Pagination,
    SmallHeading,
    Accordion,
    NAIcon,
    BorderButton,
    Slideover
},

    data() {
        return {
            DistributionAdjustment: [],
            pagination: {
                current_page: 1,
            },

            selected: "Pending",
            isOpen: true,
            labels: [

                { label: 'DATE'},
                { label: 'REFERENCE NO.' },
                { label: 'ADJUSTMENT REF. NO.'},
                { label: 'BANK' },
                { label: 'CURRENCY' },
                { label: 'AMOUNT' },
                { label: 'REMARKS' },
                { label: 'ACTION' },
            ],
            bulkOption:[
                'Option 1',
                'Option 2',
                'Option 3',
            ],
            slideoverOpen: false,
            
        }
    },
    methods: {
        slideOverToggle() {
            this.slideoverOpen = false;
        },
        async getDistributionAdjustment() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.DistributionAdjustment = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },

        setSelected(tab) {
        this.selected = tab;
        },
        openHeading(){
            this.isOpen = !this.isOpen;
        },

        async getRate(){
            await axios.get('/api/rates/cmt/list')
                .then((response) => {
                    this.rates = response.data;
                })
                .catch((errors) => [
                ])
        },
        },
    }
</script>

<template>

<div class="border m-3 bg-white border-white shadow-md ">
    <TabNav :tabs="['Pending', 'Approval History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'" >
        <Tab :isSelected="selected === 'Pending'" >
            <div class=" h-auto w-full px-3 py-5">
                <div class="inline-block min-w-full align-middle ">
                    <div class="flex justify-between h-full min-w-full">
                        <div class="flex items-end gap-3 ">
                            <div class="flex text-[10px]">
                                <DropDown label="bulk action" :options="bulkOption" class="" />
                                <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] p-1.5 text-[10px] text-white px-3 uppercase" />
                            </div>
                            <div>
                                <DateInput label="Transaction Date"/>
                            </div>
                        </div>
                        <div class="flex items-end">
                            <form class="flex items-start">
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
                                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-3 tracking-wider text-[10px] font-medium text-white" />
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="min-w-full py-5 align-middle">
                    <div class="relative h-[360px]">
                        <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200 ">
                                        <th scope="col" class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                            <div class="flex justify-center items-center gap-1">
                                                <input type="checkbox">
                                                ID
                                            </div>
                                        </th>
                                        <th v-for="label in labels" :key="label.label" scope="col" class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                            {{  label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                    <tr class="divide-x divide-gray-200">
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            <div class="flex justify-center items-center gap-1">
                                                <input type="checkbox">
                                                01
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            09/28/2022 12:00:05 PM
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            REDHA AL ANSARI exchange
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider text-cyan-500">
                                            REDHA-09282022-0001
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            CMT-09282022-0009
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            PHP
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            25,000.13
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                            OUT
                                        </td>
                                        <td class="whitespace-nowrap uppercase text-center py-1 px-2 tracking-wider">
                                            <div class="flex justify-center items-center gap-1">
                                                <div class="relative justify-center items-center">
                                                    <button @click="slideoverOpen = !slideoverOpen" class="border h-[20px] z-30 w-[60px] bg-white border-#3E3E3E text-center text-#3E3E3E hover:text-white hover:bg-[#3E3E3E] pl-[15px]"><NAIcon class=" bg-inherit absolute h-3 w-3 top-1 left-1 uppercase whitespace-nowrap"/>N/A</button>
                                                </div>
                                                <div class="relative justify-center items-center">
                                                    <button class="border h-[20px] bg-white w-[60px] z-30 border-#FB9E30 text-center text-#FB9E30 hover:text-white hover:bg-[#FB9E30] pl-[15px] uppercase whitespace-nowrap"><EditIcon class="-z-1 absolute h-4 w-4 top-[1px] left-1"/>Create</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <Pagination @paginate="getDistributionAdjustment()" :pagination="pagination"
                :offset="1" class="py-10 " />

            <Accordion sectiontitle="Journal Entry" :setOpen=false>
                <JournalEntry/>
            </Accordion>
        </Tab>
    </TabNav>
</div>

<Slideover :show="slideoverOpen" @close="slideOverToggle" :title="'ADJUSTMENT ENTRY'">
    <div class="flex flex-col justify-between items-center py-5 h-full w-full">
        <div class="flex flex-col items-center mt-[20px]">
            <p class="uppercase text-center text-[15px]">Transaction not applicable with Operations? <br> Click 'Yes' to proceed and 'No' to cancel.</p>
        </div>

        <div class="flex justify-between w-full px-[50px]">
            <BorderButton @click.prevent="slideOverToggle()"  :buttonLabel="'NO'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            <BorderButton :buttonLabel="'YES'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
        </div>
    </div>
</Slideover>
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
