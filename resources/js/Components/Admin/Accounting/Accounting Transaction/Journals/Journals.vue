<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import JournalsTable from "./Tables/JournalsTable.vue";
export default {
    name: 'Journals Table',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        JournalsTable
    },
    data() {
        return {
            startDate: '',
            endDate: '',
            isFiltered:'',
        }
    },
    methods: {
        updateSelectedAccount(value) {
            this.selectedAccount = value;
        },
    },
}
</script>
<template>
    <div class="w-full min-h-screen max-h-auto bg-white">
        <div class="flex flex-col gap-[15px] min-w-full py-5 px-[12px]">
            <div class="flex justify-between items-end h-auto w-full  px-[11px] pb-[30px]">
                <div class="flex justify-end flex-col">
                    <div class="flex gap-3 items-end">
                        <div>
                            <DateInput v-model="startDate" label="Start Date" />
                        </div>
                        <div>
                            <DateInput v-model="endDate" label="End Date" />
                        </div>
                        <div>
                            <NormalButton @click="isFiltered = !isFiltered" label="Filter"
                            class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div class="right-side">
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
        </div>
        <!-- MAIN CONTENT -->
        <!-- <div v-if="this.startDate && this.endDate"> -->
        <div v-if="isFiltered">
            <JournalsTable :StartDate="this.startDate" :EndDate="this.endDate"/>
        </div>
        <div v-else class="flex flex-col items-center justify-center py-20">
            <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
            <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
        </div>
    </div>
</template>
