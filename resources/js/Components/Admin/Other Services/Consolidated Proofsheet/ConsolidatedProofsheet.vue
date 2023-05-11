<script>
import Dropdown from "../../../Misc/Dropdown/Dropdown.vue";
import SmallHeading from "../../../Misc/Heading/SmallHeading.vue";
import DateInput from "../../../Misc/Input/DateInput.vue";
import BorderButton from "../../../Misc/Buttons/BorderButton.vue";
import DropdownNoLabel from '../../../Misc/Input/DropdownNoLabel.vue';

export default {
    components: {
        SmallHeading,
        DateInput,
        Dropdown,
        DropdownNoLabel,
        BorderButton,

    },

    data() {
        return {
            AccNames:[
                'ALL BANK IMUS USD',
                'ALL BANK SF PAYROLL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
                'ALL',
            ]
        }
    },
};
</script>
<template>
    <div class="bg-white h-screen w-full ">
        <div class="w-[40%] py-10">
            <SmallHeading label="Consolidated SL Per Account Name" class="uppercase tracking-wider w-full" :justify="'justify-center'"/>
        </div>
        <div class="flex flex-col justify-center items-center w-[40%]  gap-y-5 ">
            <div class="flex justify-center  gap-3 w-full">
                <DateInput label="Start Date" class="w-auto"/>
                <DateInput label="End Date" class="w-auto"/>
            </div>
            <div class=" w-full px-[75px] flex justify-center">
                <DropdownNoLabel :choices="AccNames" :placeholder="'Select Account Name'"/>
            </div>
            <div class="flex gap-3">
                <BorderButton :buttonLabel="'View ProofSheet'" :buttonSize="'h-auto w-[150px]'" :buttonPadding="'px-2 py-1'"/>
                <BorderButton :buttonLabel="'Export ProofSheet'" :buttonSize="'h-auto w-[150px]'" :buttonPadding="'px-2 py-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'"  />
            </div>
        </div>
    </div>
</template>
