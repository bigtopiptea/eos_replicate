<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import FloatingLabelDropdown from '../../../Misc/Input/FloatingLabelDropdown.vue';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    name: 'Cash Position Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput, FloatingLabelDropdown,
        Pagination
    },
    data() {
        return {
            labels:[
                {label:'DATE'},
                {label:'REFERENCE NO.'},
                {label:'ACCOUNT NAME'},
                {label:'BEGINNING BALANCE'},
                {label:'TOTAL_DR'},
                {label:'TOTAL_CR'},
                {label:'NET AMOUNT'},
            ]
        }
    },
}
</script>
<template>
    <div class="container h-auto bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-5 pt-10 pb-5">
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[15px]">
                <div class="flex justify-end flex-col">
                    <div class="flex items-end">
                        <div class="-ml-3">
                            <DateInput label="Date" />
                        </div>
                        <div>
                            <NormalButton label="Filter"
                            class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] ml-3 tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div class="right-side">
                    <form class="flex items-start">
                        <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                    </form>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex flex-col h-screen pb-10">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
                <div class="text-center mt-[20px]">
                    <h3 class="text-[13px] font-semibold">TRADING SUMMARY</h3>
                    <p class="text-[12px]">09/28/2022</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="border border-black">

            </div>
            
        </div>
    </div>
</template>