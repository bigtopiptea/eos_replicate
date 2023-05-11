<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>

<script>
import JournalEntry from "./JournalEntry.vue";
import UnallocatedTransactions from "@/Components/Admin/Funding/From Tie-Up/UnallocatedTransactions.vue";
import Accordion from "../../../Misc/Accordion.vue";
import FloatingTextArea from "@/Components/Misc/Input/FloatingTextArea.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputDropdown from "@/Components/Misc/Input/InputDropdown.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";
import InputGroupSelectMenu from '../../../Misc/Select Menu/InputGroupSelectMenu.vue';


export default {

    name:'Banks & Providers',

    components:{
    Tab, TabNav,
    EditIcon,
    NormalButton,
    SearchIcon,
    InputLabel,
    ListIcon,
    Pagination,
    InputGroup,
    FloatingTextArea,
    Accordion,
    UnallocatedTransactions,
    JournalEntry,
    InputDropdown,
    InputGroupSelectMenu
},

    data() {
        return {
            distributionRefund: [],
            pagination: {
                current_page: 1,
            },

            selected: "Pending",
            isOpen: true,
            tieUpPartner:[
                {name: 'partner 1'},
                {name: 'partner 2'},
                {name: 'partner 3'},
            ],
            currency:[
                {name: 'PHP'},
                {name: 'USD'},
                {name: 'EURO'},
            ],
            bank:[
                {name: 'BANK 1'},
                {name: 'BANK 2'},
                {name: 'BANK 3'},
            ],

        }
    },
    methods: {
        async getDistributionRefund() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.distributionRefund = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },

        setSelected(tab) {
        this.selected = tab;
        },


        },
    }
</script>

<template>

<div class="border m-3 bg-white border-white shadow-md ">
    <TabNav :tabs="['Pending','Approval History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
        <Tab :isSelected="selected === 'Pending'" >
            <div class="h-auto w-full ">
                <form class="flex justify-between p-3 ">
                    <div class="flex flex-col gap-3 w-8/12 mr-3 h-auto pt-3">
                        <div class="flex justify-between gap-[10px] w-full mt-[32px]">
                            <div class="w-[60%]">
                                <InputGroupSelectMenu :label="'Tie-Up Partner'" :placeholder="'SELECT TIE-UP PARTNER'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"   :options="tieUpPartner"/>
                            </div>
                            <div class="w-[40%]">
                                <InputGroupSelectMenu :label="'Currency'" :placeholder="'SELECT CURRENCY'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :options="currency"/>
                            </div>
                        </div>
                        <div class="flex justify-between gap-[10px] w-full ">
                            <div class="w-[60%]">
                                <InputGroupSelectMenu :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :label="'Bank'" :placeholder="'SELECT BANK'" :options="bank"/>
                            </div>
                            <div class="w-[40%]">
                                <InputGroup :inputWidth="'w-7/12 bg-white'" :labelWidth="'w-5/12'" :inputLabel="'Amount'" inputColor="'bg-white'"/>
                            </div>
                        </div>
                        <div class="h-auto">
                            <FloatingTextArea :label="'Remarks'" :inputHeight="'h-16 overflow-y-hidden'"/>
                        </div>
                    </div >
                    <div class="flex flex-col gap-3 px-3 uppercase w-4/12">
                        <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Reference Number '"  :isDisabled="true"/>
                        <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Bank total Fund'"  :isDisabled="true"/>
                        <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Tie-Up Total Unallocated'"  :isDisabled="true"/>
                        <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Running Balance'"  :isDisabled="true"/>
                        <div class="flex justify-start items-center">
                            <input type="checkbox" class="bg-[#EAEAEA]" disabled>
                            <span class="font-light text-[10px] ml-3">Advanced Funding</span>
                        </div>
                    </div>
                </form>
                <!-- Accordion Content -->
                <div class=" p-1 min-h-full w-full overflow-auto">
                    <Accordion sectiontitle="Unallocated Transactions" :setOpen=false>
                        <UnallocatedTransactions/>
                    </Accordion>
                    <Accordion sectiontitle="Journal Entry" :setOpen=false>
                        <JournalEntry/>
                    </Accordion>
                </div>
            </div>
        </Tab>
    </TabNav>
</div>

</template>
