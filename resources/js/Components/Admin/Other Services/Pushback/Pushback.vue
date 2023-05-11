<script>
import SearchIcon from '../../../Misc/Icons/SearchIcon.vue'
import NormalButton from '../../../Misc/Buttons/NormalButton.vue'
import InputGroup from '../../../Misc/Input/InputGroup.vue'
import SolidButton from '../../../Misc/Buttons/SolidButton.vue'
import InputTextarea from '../../../Misc/Input/InputTextarea.vue'
import BorderButton from '../../../Misc/Buttons/BorderButton.vue'
export default{
    components:{
        SearchIcon,
        NormalButton,
        InputGroup,
        SolidButton,
        InputTextarea,
        BorderButton,

    },
    props:{

    },
    data() {
        return {
            labels: [
                { label: 'REFERENCE NUMBER'},
                { label: 'TYPE'},
                { label: 'DATE' },
                { label: 'NAME'},
                { label: 'BANK' },
                { label: 'CURRENCY' },
                { label: 'AMOUNT' },
                { label: 'RATE' },
                { label: 'CONVERTED AMOUNT' },
                ],
        }
    },
}
</script>
<template>
    <div class="h-auto w-full bg-white">
        <div class="px-5 py-3">
            <div class="flex items-center gap-10">
                <form class="flex items-start ">
                    <div class="relative w-auto">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <SearchIcon />
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 h-[34px] border border-r-0 disabled:bg-[#EAEAEA] border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                            placeholder="Search" required  />
                    </div>
                    <NormalButton label="Go"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white disabled:bg-[#C6C6C6] disabled:border"  disabled />
                </form>

                <h1 class=" uppercase text-[#FF0000] font-bold text-[10px] tracking-wider whitespace-nowrap">Note: <span class=" text-[#FF0000] font-light text-[10px] ">SAME DAY PUSHBACK ONLY.</span></h1>
            </div>
            <!-- Break -->
            <div class="border-3 border-[#EAEAEA] h-[3px] bg-[#EAEAEA] mt-5"/>

            <div class=" h-auto w-full px-5 pt-8">
                <form class="flex flex-col gap-3 mb-3 w-4/12">
                    <div v-for="label in labels" :key="label.label">
                        <InputGroup :inputLabel="label.label" :inputWidth="'w-1/2'" :labelWidth="'w-1/2'" :isDisabled="true"/>
                    </div>
                    <InputTextarea :label="'Reason'" />
                </form>
            </div>

            <div class="flex justify-center gap-3 ">
                <BorderButton :buttonLabel="'CANCEL'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" />
                <BorderButton :buttonLabel="'SUBMIT'"  />
            </div>
        </div>
    </div>
</template>
