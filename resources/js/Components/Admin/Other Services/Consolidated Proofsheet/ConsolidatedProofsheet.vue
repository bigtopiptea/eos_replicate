<script>
import Dropdown from "../../../Misc/Dropdown/Dropdown.vue";
import SmallHeading from "../../../Misc/Heading/SmallHeading.vue";
import DateInput from "../../../Misc/Input/DateInput.vue";
import BorderButton from "../../../Misc/Buttons/BorderButton.vue";
import DropdownNoLabel from '../../../Misc/Input/DropdownNoLabel.vue';
import CheckboxSelectMenu from '../../../Misc/Select Menu/CheckboxSelectMenu.vue';
export default {
    components: {
        SmallHeading,
        DateInput,
        Dropdown,
        DropdownNoLabel,
        BorderButton,
        CheckboxSelectMenu

    },

    data() {
        return {
            AccNames:[
                {name: 'ALL BANK IMUS USD'},
                {name: 'ALL BANK SF PAYROLL'},
                {name: 'ALLIED SHAW SF PHP'},
                {name: 'ALLIED SHAW SF usd'},
                {name: 'ASIA UNITED BANK (AUB) SHAW PHP'},
                {name: 'ASIA UNITED BANK (AUB) SHAW USD'},
                {name: 'ASIA UNITED BANK PAG-IBIG PHP'},
                {name: 'ASIA UNITED BANK SSS PHP'},
                {name: 'AUB SHAW BILLS PAY PHP'},
                {name: 'BDO - MONEYMARKET PHP'},
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
            <div class="w-full flex justify-center">
                <div class="w-[65%]">
                    <CheckboxSelectMenu :options="AccNames" :placeholder="'Select Account Name'"/>
                </div>
            </div>
            <div class="flex gap-3">
                <BorderButton :buttonLabel="'View ProofSheet'" :buttonSize="'h-auto w-[150px]'" :buttonPadding="'px-2 py-1'"/>
                <BorderButton :buttonLabel="'Export ProofSheet'" :buttonSize="'h-auto w-[150px]'" :buttonPadding="'px-2 py-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'"  />
            </div>
        </div>
    </div>
</template>
