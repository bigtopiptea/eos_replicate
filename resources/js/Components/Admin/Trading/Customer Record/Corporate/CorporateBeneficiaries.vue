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

export default{
    components:{
        RefreshIcon, SmallHeading, BorderButton, Accordion,
        FloatingLabelInput, FloatingLabelDropdown, SolidButton
    }
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
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        id
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        company name
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        country
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        account name
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        bank
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        account no.
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        date added
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        added by
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        ACTIONS
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
                                        <button>
                                            <img src="../../../../../../assets/images/EditIcon.png" alt="Edit Icon" class="h-5 w-5">
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
                        <div class="flex flex-col w-full">
                            <div class="flex flex-col gap-y-[15px]">
                                <div class="flex gap-x-[5px]">
                                    <div class="flex flex-col gap-y-[15px] w-[40%]">
                                        <div class="w-[90%]">
                                            <FloatingLabelInput :inputLabel="'company name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="w-full">
                                            <FloatingLabelInput :inputLabel="'company address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="flex gap-x-[5px] w-full">
                                            <div class="w-[55%]">
                                                <FloatingLabelInput :inputLabel="'account name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                            </div>
                                            <div class="w-[45%]">
                                                <FloatingLabelInput :inputLabel="'branch account'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-end gap-y-[15px] w-[60%]">
                                        <div class="flex gap-x-[5px] w-full">
                                            <div class="w-[30%]">
                                                <FloatingLabelDropdown :inputLabel="'country'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                            </div>
                                            <div class="flex gap-x-[5px] w-[70%]">
                                                <div class="w-[45%]">
                                                    <FloatingLabelDropdown :inputLabel="'state'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                                </div>
                                                <div class="w-[35%]">
                                                    <FloatingLabelDropdown :inputLabel="'city'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                                </div>
                                                <div class="w-[20%]">
                                                    <FloatingLabelInput :inputLabel="'zip code'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex gap-x-[5px] w-full">
                                            <div class="w-[30%]">
                                                <FloatingLabelDropdown :inputLabel="'bank'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                            </div>
                                            <div class="w-[70%]">
                                                <FloatingLabelInput :inputLabel="'bank address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between w-full">
                                    <div class="flex gap-x-[5px] w-[43.7%]">
                                        <div class="w-[50%]">
                                            <FloatingLabelInput :inputLabel="'account no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="w-[50%]">
                                            <FloatingLabelDropdown :inputLabel="'DESTINATION COUNTRY'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                    </div>
                                    <div>
                                        <BorderButton :buttonLabel="'ADD/UPDATE BENEFICIARY'" :buttonSize="'h-auto w-[210px]'" :buttonPadding="'px-[5px] py-1'"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </Accordion>
            </div>

            <div class="flex justify-center gap-x-[30px] mt-[30px]">
                <BorderButton :buttonLabel="'save as draft'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C text-[11px]'"/>
                <BorderButton :buttonLabel="'cancel'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'"/>
                <SolidButton :buttonLabel="'NEXT'" :isDisabled="true"/>
            </div>
        </div>
    </div>
</template>
