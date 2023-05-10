<script>
import SearchIcon from '../../../Misc/Icons/SearchIcon.vue'
import NormalButton from '../../../Misc/Buttons/NormalButton.vue'
import InputGroup from '../../../Misc/Input/InputGroup.vue';
import InputDropdown from '../../../Misc/Input/InputDropdown.vue';
import FloatingLabelInput from '../../../Misc/Input/FloatingLabelInput.vue';
import FloatingTextArea from '../../../Misc/Input/FloatingTextArea.vue';
import SolidButton from '../../../Misc/Buttons/SolidButton.vue';
import BorderButton from '../../../Misc/Buttons/BorderButton.vue';

export default{

    components:{
        SearchIcon,
        NormalButton,
        InputGroup,
        InputDropdown,
        FloatingLabelInput,
        FloatingTextArea,
        SolidButton,
        BorderButton,



    },

    data(){
        return{

            myOptions:['1','2','3']
        }
    }
}
</script>
<template>
    <div class="py-3 px-6">
        <!-- 1st Content -->
        <div>
            <form class="flex items-start">
                <div class="relative ">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <SearchIcon />
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 font-light text-[10px] block w-full pl-10 p-2.5"
                        placeholder="Search" required />
                </div>
                <NormalButton label="Go"
                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px]  text-white" />
            </form>
        </div>
        <!-- 2nd Content -->
        <form>
            <div class="w-full flex gap-y-3 gap-x-5 mt-5">
                <div class="w-1/2 ">
                    <div class="relative">
                        <InputGroup :inputLabel="'REFERENCE NO.'" :inputWidth="'w-8/12'" :labelWidth="'w-4/12'" :placeholder="'ENTER/SELECT REFERENCE NO.'"/>
                        <div class="absolute top-[3px] right-[3px] z-30">
                            <SearchIcon/>
                        </div>
                    </div>
                <div>
                    <div class="relative">
                        <InputGroup :inputLabel="'COSTUMER NAME'" :inputWidth="'w-8/12'" :labelWidth="'w-4/12'" :placeholder="'ENTER/SELECT CUSTOMER NAME'"/>
                        <div class="absolute top-[3px] right-[3px] z-30">
                            <SearchIcon/>
                        </div>
                    </div>
                </div>
                <div>
                    <InputDropdown :inputLabel="'SETTLEMENT'" :inputWidth="'w-8/12'" :labelWidth="'w-4/12'" :choices="myOptions" :placeholder="'SELECT BANK'"/>
                </div>
                </div>

                <div class="w-1/2 ">
                    <div>
                        <InputDropdown :inputLabel="'TRANSACTION TYPE'" :inputWidth="'w-8/12'" :labelWidth="'w-4/12'" :choices="myOptions" :placeholder="'SELECT TRANSACTION TYPE'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'ACCOUNT NO'" :inputWidth="'w-8/12'" :labelWidth="'w-4/12'" :placeholder="'ENTER ACCOUNT NO.'"/>
                    </div>
                    <div class="flex gap-3">
                        <InputGroup :inputLabel="'Volume'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'number'"/>
                        <InputGroup :inputLabel="'Rate'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'number'" />
                        <InputGroup :inputLabel="'Mode'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"/>
                    </div>
                </div>
            </div>
            <!-- 3rd Content -->
            <div class="flex flex-col">
                <div class="w-full flex gap-3 ">
                    <InputGroup :inputLabel="'AMOUNT'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :placeholder="'ENTER AMOUNT'"/>
                    <InputDropdown :inputLabel="'TYPE'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions" :placeholder="'SELECT TYPE'"/>

                    <InputGroup :inputLabel="'REGISTRATION DATE'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputType="'date'"/>
                    <InputGroup :inputLabel="'DEAL SLIP NO.'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputType="'number'"/>
                </div>
                <FloatingLabelInput :inputLabel="'ADDRESS'" :inputWidth="'w-full'" :inputColor="'bg-white'" />
                <div class="w-full my-3">
                    <InputGroup :inputLabel="'TYPE OF SUSPICIOUS ACTIVITY'" :inputWidth="'w-full'" />
                </div>
                <div>
                    <FloatingTextArea :label="'DESCRIPTION'" :inputHeight="'h-[100px]'" :placeholder="'DESCRIBE WHY THIS ACTIVITY IS SUSPICIOUS.'"/>
                </div>
                <div class="flex justify-center gap-5">
                    <BorderButton :buttonLabel="'cancel'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonHover="'hover:bg-#3E3E3E'"/>
                    <BorderButton :buttonLabel="'Submit'" :isDisabled="true"/>
                </div>
            </div>
        </form>
    </div>
</template>
