<script>
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import SearchIcon from '../../Misc/Icons/SearchIcon.vue';
export default {
    components:{
        NormalButton,
        SearchIcon,
    },

    data() {
        return {

            helpChoices:[
                {Choice:'Getting Started'},
                {Choice:'Dashboard'},
                {Choice:'Distribution'},
                {Choice:'Monitoring'},
                {Choice:'Funding'},
                {Choice:'Trading'},
                {Choice:'Adjustment'},
                {Choice:'Other Services'},
                {Choice:'Reports'},
                {Choice:'Settings'},

            ]
        }
    },
}
</script>
<template>
    <div class="h-auto w-full bg-white">
        <div class="py-5 px-3 flex w-full">
            <div class="w-[30%] flex flex-col items-center gap-y-8">
                <div class="flex flex-col items-center">
                    <label class="text-[20px] font-[500] tracking wide whitespace-nowrap">Search For A Question</label>
                    <label class="text-[11px] font-light whitespace-nowrap">Type your question or search keyword</label>
                </div>
                <div class=" w-full px-5" >
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
                    </form>
                </div>
                <div class="w-full flex flex-col items-start px-5">
                    <a href="#" v-for="helpChoice in helpChoices" :key="helpChoice.Choice" class="mb-7 uppercase whitespace-nowrap text-[12px]">{{ helpChoice.Choice }}</a>
                </div>
            </div>
            <div class="w-[70%] bg-[#EAEAEA] h-screen">
                <slot/>
            </div>
        </div>
    </div>
</template>
