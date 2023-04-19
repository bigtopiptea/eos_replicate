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
            selected: "Pending",
            isOpen: true,
            // rates: [],
            // selected: '',

        }
    },
    methods: {
        setSelected(tab) {
        this.selected = tab;
        },
    }
}
</script>

<template>

<div class="border m-3 bg-white border-white shadow-md ">
    <TabNav :tabs="['Pending',  'Approval History' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white'">
        <Tab :isSelected="selected === 'Pending'" >
            <div class=" h-auto w-full border border-red-500">
                <!-- FORM -->
                <div class="flex justify-between m-5">
                    <div class="flex flex-col h-auto">
                        <div class="flex justify-between gap-[10px] w-full">
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
                    <div class=" px-3 uppercase w-4/12">
                        <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Reference Number '" />
                    </div>
                </div>
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
