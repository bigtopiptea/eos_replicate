<script>
import FloatingLabelDropdown from '../../../../Misc/Input/FloatingLabelDropdown.vue';
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue';
import SmallLabelInput from '../../../../Misc/Input/SmallLabelInput.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import CountryCodeDropdown from '../../../../Misc/Dropdown/CountryCodeDropdown.vue';
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';
import Accordion from '../../../../Misc/Accordion.vue';

export default{
    components:{
        FloatingLabelDropdown, FloatingLabelInput, SmallLabelInput, InputGroup,
        SmallHeading, CountryCodeDropdown, BorderButton, SolidButton, Accordion
    },
    data(){
        return{
            customerTypes: ['Sole Proprietorship', 'Partneship', 'Corporation'],
            categoryTypes: ['Provider', 'Tie-Up Partner', 'Trading'],
            labels:[
                {label:'ID'},
                {label:'FULL NAME'},
                {label:'MOBILE NO.'},
                {label:'EMAIL ADDRESS'},
                {label:'DATE ADDED'},
                {label:'ACTIONS'},
            ],
        }
    }
}
</script>
<template>
    <div class="my-5">
        <!-- Form Row 1 -->
        <div class="flex justify-between items-center px-5 pb-3 w-full">
            <div class="flex items-center gap-[10px] w-[55%]">
                <div class="w-[50%]">
                    <FloatingLabelDropdown :inputLabel="'customer-type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true" :options="customerTypes" :placeholder="'Select Customer Type'"/>
                </div>
                <div class="w-[50%]">
                    <FloatingLabelDropdown :inputLabel="'category'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :options="categoryTypes" :placeholder="'Select Category'"/>
                </div>
            </div>
            <div class="flex flex-col gap-3 w-[25%]">
                <InputGroup :inputLabel="'customer id'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup :inputLabel="'status'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
            </div>
        </div>
        <SmallHeading label="Business Details" class="pl-6 w-[20%]" />
        <!-- FORM Row 2 -->
        <div class="flex flex-col gap-y-[15px] px-5 pt-[15px] pb-3 my-[15px] w-full">
            <!-- R1 -->
            <div class="flex flex-col gap-y-[15px] w-[100%]">
                <div class="flex gap-[5px]">
                    <div class="w-[47%]">
                        <FloatingLabelInput :inputLabel="'business name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                    <div class="w-[18%]">
                        <FloatingLabelInput :inputLabel="'sec/dti reg no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'"/>
                    </div>
                    <div class="w-[18%]">
                        <FloatingLabelInput :inputLabel="'date of incorporation'" :inputType="'date'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                    </div>
                    <div class="w-[17%]">
                        <FloatingLabelInput :inputLabel="'nature of business'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                    </div>
                </div>
            </div>
            <!-- R2 -->
            <div class="flex gap-x-[5px]">
                <!-- C1 -->
                <div class="flex flex-col gap-y-[15px] w-[50%]">
                    <div class="flex gap-[5px] w-full">
                        <div class="w-[68%]">
                            <FloatingLabelInput :inputLabel="'Present/Permanent Address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :placeholder="'No., Street, Phase/Village/Subdivision'"/>
                        </div>
                        <div class="w-[32%]">
                            <FloatingLabelDropdown :inputLabel="'country'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :placeholder="'Select Country'"/>
                        </div>
                    </div>
                    <div class="flex gap-[5px] w-full">
                        <div class="w-[30%]">
                            <FloatingLabelInput :inputLabel="'telephone no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'"/>
                        </div>
                        <div class="w-[30%]">
                            <FloatingLabelInput :inputLabel="'fax no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'"/>
                        </div>
                        <div class="w-[40%]">
                            <FloatingLabelInput :inputLabel="'company/email'" :inputType="'email'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                        </div>
                    </div>
                </div>
                <!-- C2 -->
                <div class="flex flex-col gap-y-[15px] w-[50%]">
                    <div class="flex gap-[5px] w-full">
                        <div class="w-[45%]">
                            <FloatingLabelDropdown :inputLabel="'province state'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :placeholder="'Select Province/State'"/>
                        </div>
                        <div class="w-[35%]">
                            <FloatingLabelDropdown :inputLabel="'city/municipality'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :placeholder="'Select City/Municipality'"/>
                        </div>
                        <div class="w-[20%]">
                            <FloatingLabelInput :inputLabel="'zip code'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                        </div>
                    </div>
                    <div class="flex gap-[5px] w-full">
                        <div class="w-[100%]">
                            <FloatingLabelInput :inputLabel="'company website'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <SmallHeading label="Contact Person" class="pl-6 w-[20%]" />
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

                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                </td>
                                <td class="whitespace-nowrap uppercase text-center py-2 px-1 tracking-wider flex justify-center items-center gap-1">
                                    <!-- <button>
                                        <img src="../../../../../../assets/images/EditIcon.png" alt="Edit Icon" class="h-5 w-5">
                                    </button> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Accordion -->
        <div class="mx-5 mt-10 shadow-md">
            <Accordion :sectiontitle="'ADD/UPDATE CONTACT PERSON'" :accordionColor="'bg-#3E3E3E'" :titleAlign="'text-right'" :setOpen="true">
                <div class="mx-5">
                    <!-- FORM -->
                    <form class="flex gap-x-[5px] pb-3 w-full">
                        <!-- Col 1 -->
                        <div class="flex flex-col gap-y-[15px] w-[50%]">
                            <div class="flex gap-[5px] w-full">
                                <div class="w-[35%]">
                                    <FloatingLabelInput :inputLabel="'last name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                </div>
                                <div class="w-[40%]">
                                    <FloatingLabelInput :inputLabel="'first name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                                </div>
                                <div class="w-[25%]">
                                    <FloatingLabelInput :inputLabel="'middle name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                                </div>
                            </div>
                            <div class="flex gap-[5px] w-full">
                                <div class="w-[50%]">
                                    <FloatingLabelDropdown :inputLabel="'contact person id type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true" />
                                </div>
                                <div class="w-[50%]">
                                    <FloatingLabelInput :inputLabel="'contact person id no'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true" />
                                </div>
                            </div>
                        </div>

                        <!-- Col 2 -->
                        <div class="flex flex-col gap-y-[15px] w-[50%]">
                            <div class="flex gap-[5px]">
                                <div class="w-[14%]">
                                    <FloatingLabelInput :inputLabel="'suffix'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                                </div>
                                <div class="w-full flex">
                                    <CountryCodeDropdown/>
                                    <FloatingLabelInput :inputLabel="'mobile no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :inputType="'number'"/>
                                </div>
                                <div class="w-full">
                                    <FloatingLabelInput :inputLabel="'email address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'email'"/>
                                </div>
                            </div>
                            <div class="flex justify-end gap-x-[5px] w-auto">
                                <BorderButton :buttonLabel="'ADD/UPDATE CONTACT PERSON'" :buttonSize="'h-auto w-[210px]'" :buttonPadding="'px-[5px] py-1'"/>
                            </div>
                        </div>
                    </form>
                </div>
            </Accordion>
        </div>

        <!-- Form row 3 -->
        <form class="flex flex-col gap-3 my-[30px] px-5 w-[40%]">
            <InputGroup :inputLabel="'EXPECTED FREQUENCY'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
            <InputGroup :inputLabel="'EXPECTED VOLUME/AMOUNT'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
        </form>

        <!-- Buttons -->
        <div class="flex justify-center gap-x-[30px]">
            <BorderButton :buttonLabel="'save as draft'" :buttonBorderColor="'border-#EE3E2C'" :buttonTextColor="'text-#EE3E2C'"  :buttonHover="'hover:bg-#EE3E2C'"/>
            <BorderButton :buttonLabel="'cancel'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonHover="'hover:bg-#3E3E3E'"/>
            <BorderButton :buttonLabel="'Next'" :isDisabled="true"/>
        </div>
    </div>
</template>
