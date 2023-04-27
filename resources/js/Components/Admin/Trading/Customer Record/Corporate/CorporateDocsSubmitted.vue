<script setup>
import RefreshIcon from '@/Components/Misc/Icons/RefreshIcon.vue';
import CircleCheckIcon from '../../../../Misc/Icons/CircleCheckIcon.vue';
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
            <SmallHeading label="SUBMITTED IDS/DOCUMENTS" class="pl-6 w-[25%]" />
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
                                        type of id/document
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        date issued
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        expiry date
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        date uploaded
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        uploaded by
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
                                        <a class="underline text-cyan-500" href="#">
                                            DCMNT-03
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        SOCIAL SECURITY SYSTEM (SSS ID)
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        NO ISSUE DATE
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        NO EXPIRATION
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
                                            <img src="../../../../../../assets/images/EyeIcon.png" alt="Edit Icon" class="h-5 w-5">
                                        </button>
                                        <button>
                                            <RefreshIcon/>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="flex justify-end mx-[28px]">
                <BorderButton :buttonLabel="'VIEW ARCHIVED IDS/DOCS.'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'" :buttonSize="'h-auto w-[180px]'" :buttonPadding="'px-[5px] py-1'"/>
            </div>
            <!-- Accordion -->
            <div class="mx-5 shadow-md">
                <Accordion :sectiontitle="'upload id/document'" :accordionColor="'bg-#3E3E3E'" :titleAlign="'text-right'" :setOpen="true">
                    <div class="mx-5">
                        <div class="flex gap-[5px]">
                            <div class="flex flex-col gap-[10px] w-[60%]">
                                <FloatingLabelDropdown :inputLabel="'type of id/document'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                <div class="flex flex-col items-center border-2 border-dotted border-[#7F7F7F] rounded-md p-5">
                                    <div class="text-center text-[12px] mb-5">
                                        <p>DRAG IMAGE HERE<br>OR</p>
                                        <button type="button" class="text-#EE3E2C font-medium py-1 px-4 border-2 border-#EE3E2C">BROWSE</button>
                                    </div>
                                    <div class="text-center text-[10px]">
                                        <p>
                                            MAX FILE SIZE:
                                            <span class="font-bold">10MB</span><br>
                                            SUPPORTED FILE TYPES:
                                            <span class="font-bold">JPEG, JPG, PNG</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between w-[40%]">
                                <div class="flex gap-[5px] w-full">
                                    <div class="flex flex-col gap-[3px] w-[50%] ">
                                        <FloatingLabelInput :inputLabel="'date issued'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'date'" isRequired="true"/>
                                        <div class="flex justify-end gap-[3px] text-[10px]">
                                            <input type="checkbox" name="date-issued">
                                            <label for="">NO ISSUE DATE</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-[3px] w-[50%]">
                                        <FloatingLabelInput :inputLabel="'expiry date'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'date'" isRequired="true"/>
                                        <div class="flex justify-end gap-[3px] text-[10px]">
                                            <input type="checkbox" name="date-issued">
                                            <label for="date-issued">NO EXPIRY DATE</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Filename -->
                                <div class="flex justify-start gap-[3px] -mb-[90px]">
                                    <svg class="h-4 w-4 rounded-full px-1 bg-[#194E72]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="underline text-[#194E72] text-[10px]">SEC Registration / DTI Registration_2223</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="h-4 w-4 cursor-pointer" >
                                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex justify-end w-full">
                                    <BorderButton :buttonLabel="'UPLOAD ID/DOCUMENT'" :buttonSize="'h-auto w-[180px]'" :buttonPadding="'px-[5px] py-1'"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </Accordion>
            </div>
            <!-- Buttons -->
            <div class="flex justify-center gap-x-[30px] mt-[30px]">
                <BorderButton :buttonLabel="'save as draft'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C text-[11px]'"/>
                <BorderButton :buttonLabel="'cancel'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'"/>
                <SolidButton :buttonLabel="'NEXT'" :isDisabled="true"/>
            </div>
        </div>
    </div>
</template>
