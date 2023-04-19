<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>

<script>


import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import InputDropdown from '@/Components/Misc/Input/InputDropdown.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import axios from "axios";


export default{
  props: {
  },

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
    InputDropdown,
    BorderButton
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
    <TabNav :tabs="['Pending',  'Approval History' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white'">
        <Tab :isSelected="selected === 'Pending'" >
            <div class=" h-full overflow-x-hidden border bordr-red-500">
                <!-- FORM -->
                <div class="flex justify-between p-3 mb-3 border border-red-500">
                    <div class="flex flex-col  pt-3 w-8/12 mr-3 h-2">
                        <div class="flex justify-between gap-[10px] w-full mt-[44px]">
                            <div class="w-[60%]">
                                <InputDropdown :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputLabel="'Tie-Up Partner'" />
                            </div>
                            <div class="w-[40%]">
                                <InputDropdown :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputLabel="'Currency'" />
                            </div>
                        </div>
                        <div class="flex justify-between gap-[10px] w-full ">
                            <div class="w-[60%]">
                                <InputDropdown :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputLabel="'Bank'" />
                            </div>
                            <div class="w-[40%]">
                                <InputGroup :inputWidth="'w-7/12 bg-white'" :labelWidth="'w-5/12'" :inputLabel="'Amount'" inputColor="'bg-white'" />
                            </div>
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
                <Pagination @paginate="getDistributionRefund()"  :pagination="pagination"
                        :offset="1" class="mt-8" />

            </div>
        </Tab>
    </TabNav>
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
