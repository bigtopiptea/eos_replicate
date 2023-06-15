<script setup>
import RefreshIcon from '@/Components/Misc/Icons/RefreshIcon.vue';
</script>
<script>
import FloatingLabelDropdown from '../../../../Misc/Input/FloatingLabelDropdown.vue';
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';
import Accordion from '../../../../Misc/Accordion.vue';
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default {
    components:{
        RefreshIcon, SmallHeading, BorderButton, Accordion,
        FloatingLabelInput, FloatingLabelDropdown, SolidButton,
        CheckboxSelectMenu
    },

    data() {
        return {
            labels:[
                {label:'ID'},
                {label:'COMPANY NAME'},
                {label:'COUNTRY'},
                {label:'ACCOUNT NAME'},
                {label:'BANK'},
                {label:'ACCOUNT NO.'},
                {label:'DATE ADDED'},
                {label:'ADDED BY'},
                {label:'ACTIONS'},
            ],
            country:[
                {label: 'Philippines'},
                {label: 'Japan'},
                {label: 'Korea'},
            ],
            destinationCountry:[
                {label: 'Philippines'},
                {label: 'Japan'},
                {label: 'Korea'},
            ],
            gender:[
                {label: 'Male'},
                {label: 'Female'},
            ],
            state:[
                {label: 'State 1'},
                {label: 'State 2'},
                {label: 'State 3'},
            ],
            bank:[
                {label: 'BANK 1'},
                {label: 'BANK 2'},
                {label: 'BANK 3'},
            ],
            city:[
                {label: 'Manila'},
                {label: 'Cavite'},
                {label: 'Bulacan'},
            ],
        }
    },
}
</script>
<template>
    <div class="my-[30px]">
        <div>
            <SmallHeading label="beneficiary" class="pl-6 w-[12%]" />
            <!-- TABLE -->
            <div class="overflow-hidden -mx-3">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                        <table class="min-w-full divide-y divide-gray-300 text-xs overflow-x-scroll">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        <a  class="underline text-cyan-500" href="#">
                                            cmpny-01
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        JDEE REMIT
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        SINGAPORE
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        JDEE REMIT SG
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        CHINABANK
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        09218407
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        10/28/2022 08:24:45 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        LASCONIA, ELIOMAR DE ASIS
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center py-2 px-1 tracking-wider flex justify-center items-center gap-1">
                                        <button class="tooltip tooltip-left lowercase" data-tip="edit">
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Accordion -->
            <div class="mx-5 mt-10 shadow-md">
                <Accordion :sectiontitle="'ADD/UPDATE TRADER'" :accordionColor="'bg-#3E3E3E'" :titleAlign="'text-right'" :setOpen="true">
                    <div class="mx-5">
                        <form class="flex flex-col w-full">
                            <div class="flex flex-col gap-y-[15px]">
                                <div class="flex gap-x-[5px]">
                                    <div class="flex flex-col gap-y-[15px] w-[40%]">
                                        <div class="w-[90%]">
                                            <FloatingLabelInput :inputLabel="'company name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'ENTER COMPANY NAME'"/>
                                        </div>
                                        <div class="w-full">
                                            <FloatingLabelInput :inputLabel="'company address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'ENTER COMPANY ADDRESS'"/>
                                        </div>
                                        <div class="flex gap-x-[5px] w-full">
                                            <div class="w-[55%]">
                                                <FloatingLabelInput :inputLabel="'account name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'ENTER ACCOUNT NAME'"/>
                                            </div>
                                            <div class="w-[45%]">
                                                <FloatingLabelInput :inputLabel="'branch account'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'ENTER BRANCH OF ACCOUNT'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-end gap-y-[15px] w-[60%]">
                                        <div class="flex gap-x-[5px] w-full">
                                            <div class="w-[30%]">
                                               <CheckboxSelectMenu :label="'country'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select Country'" :options="country"/>
                                            </div>
                                            <div class="flex gap-x-[5px] w-[70%]">
                                                <div class="w-[45%]">
                                                   <CheckboxSelectMenu :label="'state'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'SELECT STATE'" :options="state"/>
                                                </div>
                                                <div class="w-[35%]">
                                                   <CheckboxSelectMenu :label="'city'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select City'" :options="city"/>
                                                </div>
                                                <div class="w-[20%]">
                                                    <FloatingLabelInput :inputLabel="'zip code'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'" isRequired="true"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex gap-x-[5px] w-full">
                                            <div class="w-[30%]">
                                               <CheckboxSelectMenu :label="'bank name'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select BANK'" :options="bank"/>
                                            </div>
                                            <div class="w-[70%]">
                                                <FloatingLabelInput :inputLabel="'bank address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'ENTER BANK ADDRESS'"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between w-full">
                                    <div class="flex gap-x-[5px] w-[43.7%]">
                                        <div class="w-[50%]">
                                            <FloatingLabelInput :inputLabel="'account no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'" isRequired="true" :placeholder="'ENTER ACCOUNT NO.'"/>
                                        </div>
                                        <div class="w-[50%]">
                                           <CheckboxSelectMenu :label="'DESTINATION COUNTRY'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select DESTINATION Country'" :options="destinationCountry"/>
                                        </div>
                                    </div>
                                    <div>
                                        <BorderButton :buttonLabel="'ADD/UPDATE BENEFICIARY'" :buttonSize="'h-auto w-[210px]'" :buttonPadding="'px-[5px] py-1'"/>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </Accordion>
            </div>

            <div class="flex justify-center gap-x-[30px] mt-[30px]">
                <BorderButton :buttonLabel="'save as draft'" :buttonBorderColor="'border-#EE3E2C'" :buttonTextColor="'text-#EE3E2C'"  :buttonHover="'hover:bg-#EE3E2C'"/>
                <BorderButton :buttonLabel="'cancel'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonHover="'hover:bg-#3E3E3E'"/>
                <BorderButton :buttonLabel="'Next'" :isDisabled="true"/>
            </div>
        </div>
    </div>
</template>
