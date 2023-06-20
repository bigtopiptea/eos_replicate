<script>
import BorderButton from "../../../Misc/Buttons/BorderButton.vue";
import SolidButton from "../../../Misc/Buttons/SolidButton.vue";
import FloatingLabelDropdown from '../../../Misc/Input/FloatingLabelDropdown.vue';
import CheckboxSelectMenu from '../../../Misc/Select Menu/CheckboxSelectMenu.vue';
export default{
    components:{
        BorderButton,
        FloatingLabelDropdown,
        SolidButton,
        CheckboxSelectMenu

    },
    data() {
        return {
            reportType:[ 
                {label: 'Report 1'},
                {label: 'Report 2'},
                {label: 'Report 3'},
            ]
        }
    },
}
</script>
<template>
    <div class="bg-white h-screen w-full py-3">
        <div class="flex flex-col justify-center items-center w-full py-10 gap-y-3">
            <img src="../../../../../assets/images/UploadIcon.png" alt="Upload Icon" class="h-[100px] w-[100px]">
            <div class="flex flex-col justify-center items-center">
                <h1 class="uppercase text-[11px] font-normal text-[#3E3E3E]">Drag and Drop file</h1>
                <h1 class="uppercase text-[11px] font-normal text-[#3E3E3E]">or</h1>
            </div>
            <div class="flex items-center justify-center cursor-pointer mb-10">
                <BorderButton :buttonLabel="'Browse'" :buttonStyle="'border-[3px] border-[#F9951E] text-[#F9951E] font-[700] text-[14px]'" :buttonPadding="'py-1 px-5'">
                </BorderButton>
                <input class="absolute w-[120px] h-7 opacity-0" type="file">
            </div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="uppercase text-[11px] font-normal text-[#3E3E3E]">Max File Size:<span class="font-[700] "> 10mb</span></h1>
                <h1 class="uppercase text-[11px] font-normal text-[#3E3E3E]">Supported File type:<span class="font-[700] "> XLS,XLSX</span></h1>
            </div>
            <div class="flex justify-center w-full ">
                <div class="w-1/4">
                    <CheckboxSelectMenu :label="'Report Type'" :inputWidth="'w-full'"  :options="reportType" :placeholder="'SELECT REPORT TYPE'"/>
                </div>
            </div>
            <div class="flex gap-5">
                <BorderButton :buttonLabel="'CANCEL'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" />
                <BorderButton :buttonLabel="'SUBMIT'"/>
            </div>
        </div>

    </div>
</template>
