
<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import InputDropDown from "@/Components/Misc/Input/InputDropdown.vue"
import Accordion from "../../../Misc/Accordion.vue"
import AvailableInventory from "@/Components/Admin/Trading/Selling/AvailableInventory.vue"
import JournalEntry from "./JournalEntry.vue"
import InputGroupSelectMenu from '../../../Misc/Select Menu/InputGroupSelectMenu.vue'
export default{

    components:{
        InputGroup,
        BorderButton,
        InputDropDown,
        Accordion,
        AvailableInventory,
        JournalEntry,
        InputGroupSelectMenu
    },
    data(){
        return{
            sampleOption:[
                {name: 'option 1'},
                {name: 'option 2'},
                {name: 'option 3'},
            ],
        }
    }


}

</script>
<template>
    <div class="h-auto w-full bg-white">
        <!-- 1st Content -->
        <form class="flex justify-between gap-5 w-full p-5 px-8">
            <div class="flex items-end gap-3 w-[75%]">
                <div class="flex flex-col gap-3 w-[40%]">
                    <div class="w-full">
                        <InputGroup :inputLabel="'Trade Slip'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                    <div class="w-full">
                        <InputGroupSelectMenu :label="'USD From'"  :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                    </div>
                    <div class="w-full">
                        <InputGroup :inputLabel="'Traded AMT (USD)'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputColor="'bg-white'" :inputType="'number'"/>
                    </div>
                </div>
                <div class="flex flex-col gap-3 w-[25%]">
                    <div>
                        <BorderButton :buttonLabel="'Attach Documents'" :buttonSize="'w-[140px] h-auto p-1'" :buttonPadding="'px-2 py-1'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Traded Rate'" :inputWidth="'w-5/12'" :labelWidth="'w-7/12'" :inputColor="'bg-white'" :inputType="'number'"/>
                    </div>
                </div>
                <div class="w-[35%]">
                    <InputGroup :inputLabel="'Traded Peso Value'" :inputWidth="'w-5/12'" :labelWidth="'w-7/12'"  :isDisabled="true"/>
                </div>
            </div>
            <div class="flex w-[25%] justify-end">
                <div class="flex gap-5 w-full">
                    <InputGroup :inputLabel="'Reference Number'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :isDisabled="true"/>
                </div>
            </div>
        </form>
        <!-- Break -->
        <div class="border-3 border-[#EAEAEA] h-[3px] bg-[#EAEAEA] mx-5"/>

        <!-- 2n Content -->
        <form class="flex justify-between items-center w-full p-5 px-8 gap-3">
            <div class="flex flex-col gap-3 w-full">
                <div>
                    <InputGroupSelectMenu :label="'Type of Transaction'" :placeholder="'Select Transaction Type'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
                <div>
                    <InputGroupSelectMenu :label="'Mode of Payment'" :placeholder="'Select Mode of Payment'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
                <div>
                    <InputGroupSelectMenu :label="'Client/Company'" :placeholder="'Select Client'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
            </div>
            <div class="flex flex-col gap-3 w-full">
                <div>
                    <InputGroupSelectMenu :label="'Account Name'" :placeholder="'Select Acc. Name'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
                <div>
                    <InputGroupSelectMenu :label="'Traded To'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
                <div>
                    <InputGroupSelectMenu :label="'Source of Funds'" :placeholder="'Select Source'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
            </div>
            <div class="flex flex-col gap-3 w-full ">
                <div>
                    <InputGroupSelectMenu :label="'Purpose/Reason'" :placeholder="'Select Purpose'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
                <div>
                    <InputGroupSelectMenu :label="'Dollar From'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
                <div>
                    <InputGroupSelectMenu :label="'Peso To'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                </div>
            </div>
        </form>
        <div class="flex justify-center gap-5 mb-3">
            <BorderButton :buttonLabel="'Reset'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-black'"/>
            <BorderButton :buttonLabel="'Pass Entry'" :buttonBorderColor="'border-#EE3E2C'" :buttonTextColor="'text-#EE3E2C'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-#EE3E2C'"/>
        </div>
        <Accordion sectiontitle="Available Inventory" :setOpen=true>
            <AvailableInventory/>
        </Accordion>
        <Accordion sectiontitle="Journal Entry" :setOpen=false>
            <JournalEntry/>
        </Accordion>
    </div>
</template>

