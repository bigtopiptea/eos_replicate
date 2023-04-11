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
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import DistributionRefundJournalEntry from "@/Components/Admin/CMT/Refund/DistributionRefundJournalEntry.vue";
import axios from "axios";

export default {
    components: {
        SmallHeading,
        DistributionRefundJournalEntry,
        TabNav,
        Tab,
        DropDown,
        EditIcon,
        NormalButton,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
    },
    data(){
        return {

            selected: "Pending",
            isOpen: true,
            rates: [],
            selected: '',

        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
        openSummary(){
            this.isOpen = !this.isOpen;
        },
        openBreakAndEntry(){
            this.isOpen = !this.isOpen;
        },
        openJournalEntry(){
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
    created() {
        this.getRate();
    }
}

</script>
<template>
     <div class="px-4 h-screen  m-2">
        <div class="border  bg-white border-white shadow-md">
            <TabNav :tabs="['Pending', 'Approval History']" :selected="selected" @selected="setSelected" class="bg-red-500 hover:bg-red-500" >
                <Tab :isSelected="selected === 'Pending'" >
                    <div class="w-full h-full mt-10  ">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="flex items-end justify-between h-auto min-w-full ">
                                <div class="flex justify-start flex-col space-x-3 border-border-blue-5">
                                    <div class="flex items-end left-side-col-1 -ml-3">
                                        <div>
                                            <DateInput label="Start Date" />
                                        </div>
                                        <div>
                                            <DateInput label="End Date" />
                                        </div>
                                        <div>
                                            <NormalButton label="Format"
                                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4  tracking-wider text-sm font-medium text-white" />
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
                        <SmallHeading :isOpen="isOpen" label="Journal Entry " class="bg-dark-orange mt-10" :icon="ChevRightIcon" @click.prevent="openSummary()" />
                            <Transition name="slide-fade" >
                                <div class="mt-6" v-if="!isOpen">
                                    <DistributionRefundJournalEntry/>
                                </div>
                            </Transition>
                    </div>
                </Tab>
            </TabNav>
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

