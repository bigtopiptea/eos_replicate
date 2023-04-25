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
    }
}
</script>
<template>
    <div class="my-5">
        <!-- Form Row 1 -->
        <div class="flex justify-between items-center px-5 pb-3 w-full">
            <div class="flex items-center gap-[10px] w-[55%]">
                <div class="w-[50%]">
                    <SmallLabelInput :inputLabel="'customer type'" :inputColor="'bg-#EAEAEA'" :isRequired="true"/>
                </div>
                <div class="w-[50%]">
                    <FloatingLabelDropdown :inputLabel="'category'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                </div>
            </div>
            <div class="flex flex-col items-center w-[25%]">
                <InputGroup :inputLabel="'customer id'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                <InputGroup :inputLabel="'status'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
            </div>
        </div>
        <SmallHeading label="Biller Details" class="pl-6 w-[30%]" />
        <!-- FORM Row 2 -->
        <div class="flex gap-x-[10px] px-5 pt-[30px] pb-3 w-full">
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
                        <FloatingLabelDropdown :inputLabel="'country'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-[20%]">
                        <FloatingLabelInput :inputLabel="'date of birth'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'date'" isRequired="true"/>
                    </div>
                    <div class="w-[60%]">
                        <FloatingLabelInput :inputLabel="'date of birth'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                    <div class="w-[20%]">
                        <FloatingLabelDropdown :inputLabel="'gender'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-1/3">
                        <FloatingLabelDropdown :inputLabel="'id type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                    <div class="w-1/3">
                        <FloatingLabelInput :inputLabel="'id no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                    <div class="w-1/3">
                        <FloatingLabelInput :inputLabel="'philsys no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'NAME OF COMPANY (IF EMPLOYED/SELF-EMPLOYED)'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
                    </div>
                </div>
            </div>

            <!-- Col 2 -->
            <div class="flex flex-col gap-y-[15px] w-[18%]">
                <div class="gap-[5px]">
                    <div class="w-full flex">
                        <CountryCodeDropdown/>
                        <FloatingLabelInput :inputLabel="'mobile no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelDropdown :inputLabel="'province/state'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelDropdown :inputLabel="'civil status'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-5px">
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'nature of work'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelDropdown :inputLabel="'bank name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
            </div>

            <!-- Col 3 -->
            <div class="flex flex-col gap-y-[15px] w-[22%]">
                <div class="gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'email address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="email"/>
                    </div>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-2/3">
                        <FloatingLabelDropdown :inputLabel="'city/municipality'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                    <div class="w-1/3">
                        <FloatingLabelInput :inputLabel="'zip code'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelDropdown :inputLabel="'civil status'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'nature of work'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
                <div class="gap-5px">
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'account no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form row 3 -->
        <div class="mt-[60px] mb-[30px] px-5 w-[35%]">
            <InputGroup :inputLabel="'EXPECTED FREQUENCY'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
            <InputGroup :inputLabel="'EXPECTED VOLUME/AMOUNT'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
        </div>
        <!-- Buttons -->
        <div class="flex justify-center gap-x-[30px]">
            <BorderButton :buttonLabel="'save as draft'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C text-[11px]'"/>
            <BorderButton :buttonLabel="'cancel'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'"/>
            <SolidButton :buttonLabel="'NEXT'" :isDisabled="true"/>
        </div>
    </div>
</template>