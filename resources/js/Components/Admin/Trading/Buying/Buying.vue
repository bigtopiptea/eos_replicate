
<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import InputDropDown from "@/Components/Misc/Input/InputDropdown.vue"
import Accordion from "../../../Misc/Accordion.vue"
import JournalEntry from "./JournalEntry.vue"
export default{

    components:{
        InputGroup,
        BorderButton,
        InputDropDown,
        Accordion,
        JournalEntry,



    },
    data(){
        return{
            myOptions:['PHP', 'ABC', 'PLAY MONEY']

        }
    }


}

</script>
<template>
    <div class="h-auto w-full bg-white">
        <!-- 1st Content -->
        <div class="flex justify-between w-full p-5 px-8">
            <div class="flex flex-col w-[75%]">
                <div class="flex gap-5 w-[35%]">
                    <InputGroup :inputLabel="'Trade Slip'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :isDisabled="true"/>
                </div>
                <div class="flex gap-5 w-full ">
                    <div class="w-[35%]">
                        <InputDropDown :inputLabel="'USD From'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                    </div>
                    <div class="flex ">
                        <BorderButton :buttonLabel="'Attach Documents'" :buttonSize="'w-[140px] h-auto p-1'" :buttonPadding="'px-2 py-1'"/>
                    </div>
                </div>
                <div class="flex gap-5 w-full">
                    <div class="w-[35%]">
                        <InputGroup :inputLabel="'Traded AMT (USD)'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputColor="'bg-white'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Traded Rate'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputColor="'bg-white'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Traded Peso Value'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                </div>
            </div>
            <div class="flex w-[25%] justify-end">
                <div class="flex gap-5 w-full">
                    <InputGroup :inputLabel="'Reference Number'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :isDisabled="true"/>
                </div>
            </div>
        </div>
        <!-- Break -->
        <div class="border-3 border-[#EAEAEA] h-[3px] bg-[#EAEAEA] mx-5"/>

        <!-- 2n Content -->
        <div class="flex justify-between items-center w-full p-5 px-8 gap-3">
            <div class="flex flex-col w-full">
                <div>
                    <InputDropDown :inputLabel="'Type of Transaction'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
                <div>
                    <InputDropDown :inputLabel="'Mode of Payment'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
                <div>
                    <InputDropDown :inputLabel="'Client/Company'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
            </div>
            <div class="flex flex-col w-full">
                <div>
                    <InputDropDown :inputLabel="'Account Name'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
                <div>
                    <InputDropDown :inputLabel="'Traded To'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
                <div>
                    <InputDropDown :inputLabel="'Source of Funds'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
            </div>
            <div class="flex flex-col w-full ">
                <div>
                    <InputDropDown :inputLabel="'Purpose/Reason'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
                <div>
                    <InputDropDown :inputLabel="'Dollar From'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
                <div>
                    <InputDropDown :inputLabel="'Peso To'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :choices="myOptions"/>
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-3">
            <BorderButton :buttonLabel="'Reset'" :buttonStyle="'border-2 border-black text-black text-[11px]'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-black'"/>
            <BorderButton :buttonLabel="'Pass Entry'" :buttonStyle="'border-2 border-[#EE3E2C] text-[#EE3E2C] text-[11px]'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-[#EE3E2C]'"/>
        </div>
        <!-- Break -->
        <div class="border-3 border-[#EAEAEA] h-[3px] bg-[#EAEAEA] mx-5"/>
        <!-- 3rd Content -->
        <div class="flex justify-between items-center w-full p-5 px-8 gap-3">
            <div class="flex flex-col w-full">
                <div>
                    <InputGroup :inputLabel="'Committed Amount'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" inputColor="'bg-white'"/>

                </div>
            </div>
            <div class="flex flex-col w-full">
                <div>
                    <InputGroup :inputLabel="'Committed Rate'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" inputColor="'bg-white'"/>

                </div>
            </div>
            <div class="flex flex-col w-full ">
                <div>
                    <InputGroup :inputLabel="'Committed Peso Value'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :isDisabled="true"/>

                </div>
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-3">
            <BorderButton :buttonLabel="'Reset'" :buttonStyle="'border-2 border-black text-black text-[11px]'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-black'"/>
            <BorderButton :buttonLabel="'Pass Entry'" :buttonStyle="'border-2 border-[#EE3E2C] text-[#EE3E2C] text-[11px]'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-[#EE3E2C]'"/>
        </div>

        <Accordion sectiontitle="Journal Entry" :setOpen=false>
            <JournalEntry/>
        </Accordion>
    </div>
</template>
