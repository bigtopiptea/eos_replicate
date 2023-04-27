<script>
import FloatingLabelDropdown from '../../../../Misc/Input/FloatingLabelDropdown.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';
import Accordion from '../../../../Misc/Accordion.vue';
import SettingsInput from '../../../../Misc/Input/SettingsInput.vue';

export default{
    components:{
        SmallHeading, BorderButton, Accordion,
        InputGroup, FloatingLabelDropdown, SolidButton,
        SettingsInput
    }
}
</script>
<template>
    <div class="my-[30px]">
        <div class="mb-5">
            <SmallHeading label="RISK PROFILE" class="pl-6 w-[20%]" />
            <div class="flex justify-between mx-10 mt-5 w-[60%]">
                <div class="flex items-center gap-[8px] text-[10px]">
                    <input type="checkbox" name="high-risk">
                    <label for="high-risk">HIGH RISK</label>
                </div>
                <div class="flex items-center gap-[8px] text-[10px]">
                    <input type="checkbox" name="normal-risk">
                    <label for="normal-risk">NORMAL RISK</label>
                </div>
                <div class="flex items-center -mb-[15px]">
                    <InputGroup :inputLabel="'risk rating'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" />
                </div>
            </div>
        </div>
        <div class="mb-5">
            <SmallHeading label="watchlist screening" class="pl-6 w-[20%]" />
            <div class="flex justify-between mx-10 mt-5 w-[60%]">
                <div class="flex items-center gap-[8px] text-[10px] ">
                    <input type="checkbox" name="un">
                    <label for="un">UN</label>
                </div>
                <div class="flex items-center gap-[8px] text-[10px]">
                    <input type="checkbox" name="ofac">
                    <label for="ofac">OFAC</label>
                </div>
                <div class="flex items-center gap-[8px] text-[10px] ml-[3px]">
                    <input type="checkbox" name="pep">
                    <label for="pep">PEP / NEGATVE MEDIA / SEC ADVISORY</label>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="mb-5">
            <SmallHeading label="SOURCE OF FUNDS" class="pl-6 w-[20%]" />
            <div class="mx-10 mt-5">
                <table class="min-w-full text-xs overflow-x-scroll border border-[#D7D7D7]">
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                bank name <br>
                                <span class="text-[8px]">
                                    WHERE ACCOUNT IS MAINTAINED
                                </span>
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                account name
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                account no.
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <tr class="divide-x divide-gray-200">
                            <td class="flex items-center gap-[10px] whitespace-nowrap text-center uppercase py-2 pl-3 pr-1 tracking-wider">
                                <span class="text-[12px] font-bold">1</span>
                                <SettingsInput class="w-full"/>
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                <SettingsInput class="w-full"/>
                            </td>
                            <td class="flex items-center gap-[10px]  whitespace-nowrap text-center uppercase py-2 pl-1 pr-3 tracking-wider">
                                <SettingsInput class="w-full"/>
                                <button class="flex items-center">
                                    <span class="text-[30px]"> + </span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Buttons -->
        <div class="flex justify-center gap-x-[30px] mt-[30px]">
            <BorderButton :buttonLabel="'print'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C text-[11px]'"/>
            <BorderButton :buttonLabel="'cancel'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'"/>
            <SolidButton :buttonLabel="'SUBMIT'" :isDisabled="true"/>
        </div>
    </div>
</template>