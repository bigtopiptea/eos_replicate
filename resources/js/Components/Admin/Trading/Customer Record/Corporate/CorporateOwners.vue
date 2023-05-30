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
                {label:'FULL NAME'},
                {label:'PHILSYS NO.'},
                {label:'MOBILE NO.'},
                {label:'EMAIL ADDRESS'},
                {label:'OWNWERSHIP PERCENTAGE'},
                {label:'DATE ADDED'},
                {label:'ACTIONS'},
            ],
            country:[
                {name: 'Philippines'},
                {name: 'Japan'},
                {name: 'Korea'},
            ],
            gender:[
                {name: 'Male'},
                {name: 'Female'},
            ],
            idType:[
                {name: 'SSS'},
                {name: 'PhilHealth'},
                {name: 'Drivers License'},
            ],
            province:[
                {name: 'Province 1'},
                {name: 'Province 2'},
                {name: 'Province 3'},
            ],
            civilStatus:[
                {name: 'Single'},
                {name: 'Married'},
                {name: 'widowed'},
                {name: 'Separated/Divorced'},
            ],
            bank:[
                {name: 'BANK 1'},
                {name: 'BANK 2'},
                {name: 'BANK 3'},
            ],
            cityMunicipality:[
                {name: 'Manila'},
                {name: 'Cavite'},
                {name: 'Bulacan'},
            ],
            nationality:[
                {name: 'Filipino'},
                {name: 'Korean'},
                {name: 'Chinese'},
            ],
        }
    },
}
</script>
<template>
    <div class="my-[30px]">
        <div>
            <SmallHeading label="ULTIMATE BENEFICIAL OWNER/S" class="pl-6 w-[25%]" />
            <!-- TABLE -->
            <div class="overflow-hidden -mx-3">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                        <table class="min-w-full divide-y divide-gray-300 text-xs overflow-x-scroll">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-2 px-3 uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        <a class="underline text-cyan-500" href="#">
                                            ownr-01
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                      tan, althea caparas
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        PSN-0001-876-7541-9
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        +639549288998
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        althea.tan@gmail.com
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        20%
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        10/28/2022 08:24:45 AM
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
                <Accordion :sectiontitle="'ADD/UPDATE ULTIMATE BENEFICIAL OWNER'" :accordionColor="'bg-#3E3E3E'" :titleAlign="'text-right'" :setOpen="true">
                    <div class="mx-5">
                        <form class="flex flex-col gap-y-[15px] w-full">
                            <div class="flex gap-x-[5px]">
                                <!-- Col 1 -->
                                <div class="flex flex-col gap-y-[15px] w-[60%]">
                                    <div class="flex gap-[5px]">
                                        <div class="w-[34%]">
                                            <FloatingLabelInput :inputLabel="'last name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="w-[33%]">
                                            <FloatingLabelInput :inputLabel="'first name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="w-[20%]">
                                            <FloatingLabelInput :inputLabel="'middle name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                                        </div>
                                        <div class="w-[14%]">
                                            <FloatingLabelInput :inputLabel="'suffix'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                                        </div>
                                    </div>
                                    <div class="flex gap-[5px]">
                                        <div class="w-[68%]">
                                            <FloatingLabelInput :inputLabel="'Present/Permanent Address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="w-[32%]">
                                            <CheckboxSelectMenu :label="'country'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'select country'" :options="country"/>
                                        </div>
                                    </div>
                                    <div class="flex gap-[5px]">
                                        <div class="w-[20%]">
                                            <FloatingLabelInput :inputLabel="'date of birth'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'date'" isRequired="true"/>
                                        </div>
                                        <div class="w-[60%]">
                                            <FloatingLabelInput :inputLabel="'place of birth'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                        </div>
                                        <div class="w-[20%]">
                                            <CheckboxSelectMenu :label="'gender'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select Gender'" :options="gender"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- Col 2 -->
                                <div class="flex flex-col gap-y-[15px] w-[18%]">
                                    <div class="w-full flex">
                                        <CountryCodeDropdown/>
                                        <FloatingLabelInput :inputLabel="'mobile no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'" isRequired="true"/>
                                    </div>
                                    <div class="w-full">
                                        <CheckboxSelectMenu :label="'province/state'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select Province/State'" :options="province"/>
                                    </div>
                                    <div class="w-full">
                                        <CheckboxSelectMenu :label="'civil status'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select Civil Status'" :options="civilStatus"/>
                                    </div>
                                </div>

                                <!-- Col 3 -->
                                <div class="flex flex-col gap-y-[15px] w-[22%]">
                                    <div class="w-full">
                                        <FloatingLabelInput :inputLabel="'email address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'email'"/>
                                    </div>
                                    <div class="flex gap-[5px]">
                                        <div class="w-[66%]">
                                            <CheckboxSelectMenu :label="'city/municipality'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select City'" :options="cityMunicipality"/>
                                        </div>
                                        <div class="w-[34%]">
                                            <FloatingLabelInput :inputLabel="'zip code'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'" isRequired="true"/>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <CheckboxSelectMenu :label="'nationality/citizenship'" :inputWidth="'w-12/12'" isRequired="true" :placeholder="'Select Nationality'" :options="nationality"/>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between w-full gap-x-[5px]">
                                <div class="flex gap-x-[5px] w-[77.7%]">
                                    <div class="w-[25%]">
                                        <CheckboxSelectMenu :label="'id type'" :inputWidth="'w-12/12'"  :isRequired="true" :placeholder="'Select Type of ID'" :options="idType"/>
                                    </div>
                                    <div class="w-[24%]">
                                        <FloatingLabelInput :inputLabel="'id no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true"/>
                                    </div>
                                    <div class="w-[24%]">
                                        <FloatingLabelInput :inputLabel="'philsys no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputValue="'PSN-'"/>
                                    </div>
                                    <div class="w-[27%]">
                                        <div class="relative">
                                            <FloatingLabelInput :inputLabel="'percentage of ownership'" :inputWidth="'w-12/12'" :inputType="'number'" :inputColor="'bg-white'"/>
                                            <p class="absolute top-[6px] right-2 text-[12px] font-bold">%</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="flex justify-end gap-x-[5px] w-auto">
                                    <BorderButton :buttonLabel="'ADD/UPDATE BENEFICIAL OWNER'" :buttonSize="'h-auto w-[210px]'" :buttonPadding="'px-[5px] py-1'"/>
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
