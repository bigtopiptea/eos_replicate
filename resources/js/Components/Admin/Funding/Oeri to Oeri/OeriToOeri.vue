<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>

<script>
import JournalEntry from "@/Components/Admin/Funding/Oeri to Oeri/JournalEntry.vue";
import Accordion from "../../../Misc/Accordion.vue";
import FloatingTextArea from "@/Components/Misc/Input/FloatingTextArea.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputDropdown from "@/Components/Misc/Input/InputDropdown.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import BorderButton from "../../../Misc/Buttons/BorderButton.vue";
// import axios from "axios";


export default {

    name:'Oeri To Oeri',

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
        JournalEntry,
        InputDropdown,
        BorderButton
    // UnallocatedTransactions,
    },

    data() {
        return {
            selected: "Pending",
            isOpen: true,

        }
    },
    methods: {

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
            <div class="h-auto w-full">
                <form class="flex justify-between p-3 mb-3">
                    <div class="flex flex-col gap-3 pt-3 w-8/12 mr-3 h-auto">
                        <div class="flex justify-between gap-[10px] w-full mt-[32px]">
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
                    </div>
                    <div class=" px-3 uppercase w-4/12">
                        <InputGroup :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputLabel="'Reference Number '" :isDisabled="true"/>
                    </div>
                </form>
                <div class="flex gap-[15px] justify-center mt-3">
                    <BorderButton :buttonLabel="'Reset'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-black'"/>
                    <BorderButton :buttonLabel="'Pass Entry'" :buttonBorderColor="'border-#EE3E2C'" :buttonTextColor="'text-#EE3E2C'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-#EE3E2C'"/>
                </div>

                <!-- Accordion Content -->
                <div class="p-1 min-h-full w-full overflow-auto">

                    <Accordion sectiontitle="Journal Entry" :setOpen=false>
                        <JournalEntry/>
                    </Accordion>
                </div>
            </div>
        </Tab>
    </TabNav>
</div>

</template>
