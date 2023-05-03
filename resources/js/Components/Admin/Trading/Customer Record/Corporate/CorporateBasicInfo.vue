<script>
import FloatingLabelDropdown from '../../../../Misc/Input/FloatingLabelDropdown.vue';
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue';
import SmallLabelInput from '../../../../Misc/Input/SmallLabelInput.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import CountryCodeDropdown from '../../../../Misc/Dropdown/CountryCodeDropdown.vue';
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';

export default{
    components:{
        FloatingLabelDropdown, FloatingLabelInput, SmallLabelInput, InputGroup,
        SmallHeading, CountryCodeDropdown, BorderButton, SolidButton
    },
    data(){
        return{
            customerTypes: ['Sole Proprietorship', 'Partneship', 'Corporation'],
            categoryTypes: ['Provider', 'Tie-Up Partner', 'Trading'],
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
                    <FloatingLabelDropdown :inputLabel="'customer-type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true" :options="customerTypes"/>
                </div>
                <div class="w-[50%]">
                    <FloatingLabelDropdown :inputLabel="'category'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :options="categoryTypes"/>
                </div>
            </div>
            <div class="flex flex-col items-center w-[25%]">
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
                        <FloatingLabelInput :inputLabel="'sec/dti reg no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
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
                            <FloatingLabelInput :inputLabel="'Present/Permanent Address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                        </div>
                        <div class="w-[32%]">
                            <FloatingLabelDropdown :inputLabel="'country'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                        </div>
                    </div>
                    <div class="flex gap-[5px] w-full">
                        <div class="w-[30%]">
                            <FloatingLabelInput :inputLabel="'telephone no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'number'"/>
                        </div>
                        <div class="w-[30%]">
                            <FloatingLabelInput :inputLabel="'fax no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
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
                            <FloatingLabelDropdown :inputLabel="'province state'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                        </div>
                        <div class="w-[35%]">
                            <FloatingLabelDropdown :inputLabel="'city/municipality'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
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
        <!-- FORM Row 3 -->
        <div class="flex gap-x-[5px] px-5 pt-[30px] pb-3 w-full">
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
                        <FloatingLabelInput :inputLabel="'contact person id type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true"/>
                    </div>
                    <div class="w-[50%]">
                        <FloatingLabelDropdown :inputLabel="'contact person id type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :isRequired="true"/>
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
                        <FloatingLabelInput :inputLabel="'mobile no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'email address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'email'"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form row 3 -->
        <div class="my-[30px] px-5 w-[35%]">
            <InputGroup :inputLabel="'EXPECTED FREQUENCY'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
            <InputGroup :inputLabel="'EXPECTED VOLUME/AMOUNT'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
        </div>
        <!-- Buttons -->
        <div class="flex justify-center gap-x-[30px]">
            <BorderButton :buttonLabel="'save as draft'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C text-[11px]'" :buttonHover="'hover:bg-#EE3E2C'"/>
            <BorderButton :buttonLabel="'cancel'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'" :buttonHover="'hover:bg-#3E3E3E'"/>
            <SolidButton :buttonLabel="'NEXT'" :isDisabled="true"/>
        </div>
    </div>
</template>
