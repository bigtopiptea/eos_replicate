<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>

<script>
import UnallocatedTransactions from "@/Components/Admin/Funding/From Tie-Up/UnallocatedTransactions.vue";
import Accordion from "../../../Misc/Accordion.vue";
import FloatingTextArea from "@/Components/Misc/Input/FloatingTextArea.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";


export default{

    name:'Banks & Providers',

    components:{
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

},

    data() {
        return {
            distributionRefund: [],
            pagination: {
                current_page: 1,
            },

            selected: "Pending",
            isOpen: true,
            // rates: [],
            // selected: '',

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
    <TabNav :tabs="['Pending',  'Approval History' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
        <Tab :isSelected="selected === 'Pending'" >
            <div class="h-auto w-full">

                    <div class="flex justify-between p-3">
                        <div class="flex flex-col  pt-3 w-8/12 mr-10 h-2">
                            <div class="flex justify-between gap-[60px] w-full mt-[44px]">
                                <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Reference Number '" />
                                <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Bank total Fund'" />
                            </div>
                            <div class="flex justify-between gap-[60px] w-full ">
                                <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Reference Number '" />
                                <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Bank total Fund'" />
                            </div>
                            <div class="h-auto">
                                <FloatingTextArea :label="'Remarks'" :inputHeight="'h-16 overflow-y-hidden'"/>
                            </div>
                        </div >
                        <div class="  px-3 uppercase w-4/12">
                            <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Reference Number '" />
                            <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Bank total Fund'" />
                            <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Tie-Up Total Unallocated'" />
                            <InputGroup :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputLabel="'Running Balance'" />
                            <div class="flex justify-start items-center">
                                <input type="checkbox">
                                <span class="font-light text-[10px] ml-3">Advanced Funding</span>
                            </div>
                        </div>
                    </div>

                <!-- Accordion Content -->
                <div class="p-1 min-h-full w-full overflow-auto">
                    <Accordion sectiontitle="Unallocated Transactions" :setOpen=false>
                        <UnallocatedTransactions/>
                    </Accordion>
                    <Accordion sectiontitle="Journal Entry" :setOpen=false>
                        <h1>Table Content Journal Entry</h1>
                    </Accordion>
                </div>
            </div>
        </Tab>

    </TabNav>
</div>

</template>
