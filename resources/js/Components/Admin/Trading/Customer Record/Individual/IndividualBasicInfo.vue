<script>
import FloatingLabelDropdown from '../../../../Misc/Input/FloatingLabelDropdown.vue';
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue';
import SmallLabelInput from '../../../../Misc/Input/SmallLabelInput.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import CountryCodeDropdown from '../../../../Misc/Dropdown/CountryCodeDropdown.vue';
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        FloatingLabelDropdown, FloatingLabelInput, SmallLabelInput, InputGroup,
        SmallHeading, CountryCodeDropdown, BorderButton, SolidButton, CheckboxSelectMenu
    },
    data(){
        return{
            categoryTypes:[
                {name: 'Provider'},
                {name: 'Tie-Up Partner'},
                {name: 'Trading'},
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
            sourceFunds:[
                {name: 'Source 1'},
                {name: 'Source 2'},
                {name: 'Source 3'},
            ],
        }
    }
}
</script>
<template>
    <div class="my-5">
        <!-- Form Row 1 -->
        <div class="flex justify-between items-center px-5 pb-3 w-full">
            <div class="flex items-end gap-[10px] w-[55%]">
                <div class="w-[50%]">
                    <SmallLabelInput :inputLabel="'customer type'" :isRequired="true" :isDisabled="true"/>
                </div>
                <div class="w-[50%]">
                    <CheckboxSelectMenu :label="'category'" :placeholder="'select category'" :inputWidth="'w-12/12'"  :isRequired="true"  :options="categoryTypes"/>
                </div>
            </div>
            <div class="flex flex-col gap-3 items-center w-[25%]">
                <InputGroup :inputLabel="'customer id'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup :inputLabel="'status'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
            </div>
        </div>
        <SmallHeading label="Customer Details" class="pl-6 w-[20%]" />
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
                        <FloatingLabelInput :inputLabel="'Present/Permanent Address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'No., Street, Phase/Village/Subdivision'"/>
                    </div>
                    <div class="w-[32%]">
                        <CheckboxSelectMenu :label="'country'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'SELECT COUNTRY'" :options="country"/>
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
                        <CheckboxSelectMenu :label="'gender'" :inputWidth="'w-12/12'"  isRequired="true" :placeholder="'SELECT GENDER'" :options="gender"/>
                    </div>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-1/3">
                        <CheckboxSelectMenu :label="'id type'" :inputWidth="'w-12/12'"  isRequired="true" :placeholder="'Select Type of ID'" :options="idType"/>
                    </div>
                    <div class="w-1/3">
                        <FloatingLabelInput :inputLabel="'id no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :inputType="'number'"/>
                    </div>
                    <div class="w-1/3">
                        <FloatingLabelInput :inputLabel="'philsys no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :inputType="'number'"/>
                    </div>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-full">
                        <FloatingLabelInput :inputLabel="'NAME OF COMPANY (IF EMPLOYED/SELF-EMPLOYED)'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :placeholder="'ENTER NAME OF COMPANY'"/>
                    </div>
                </div>
            </div>

            <!-- Col 2 -->
            <div class="flex flex-col gap-y-[15px] w-[18%]">
                <div class="w-full flex">
                    <CountryCodeDropdown/>
                    <FloatingLabelInput :inputLabel="'mobile no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :inputType="'number'"/>
                </div>
                <div class="w-full">
                    <CheckboxSelectMenu :label="'province/state'" :inputWidth="'w-12/12'" :isRequired="true" :placeholder="'Select Province/State'" :options="province"/>
                </div>
                <div class="w-full">
                    <CheckboxSelectMenu :label="'civil status'" :inputWidth="'w-12/12'"  :isRequired="true" :placeholder="'Select Civil Status'" :options="civilStatus"/>
                </div>
                <div class="w-full">
                    <FloatingLabelInput :inputLabel="'nature of work'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true"/>
                </div>
                <div class="w-full">
                    <CheckboxSelectMenu :label="'bank name'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :placeholder="'Select Bank'" :options="bank"/>
                </div>
            </div>

            <!-- Col 3 -->
            <div class="flex flex-col gap-y-[15px] w-[22%]">
                <div class="w-full">
                    <FloatingLabelInput :inputLabel="'email address'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :inputType="'email'"/>
                </div>
                <div class="flex gap-[5px]">
                    <div class="w-2/3">
                        <CheckboxSelectMenu :label="'city/municipality'" :inputWidth="'w-12/12'"  isRequired="true" :placeholder="'Select City'" :options="cityMunicipality"/>
                    </div>
                    <div class="w-1/3">
                        <FloatingLabelInput :inputLabel="'zip code'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :inputType="'number'"/>
                    </div>
                </div>
                <div class="w-full">
                    <CheckboxSelectMenu :label="'nationality/citizenship'" :inputWidth="'w-12/12'"  isRequired="true" :placeholder="'Select Nationality'" :options="nationality"/>
                </div>
                <div class="w-full">
                    <CheckboxSelectMenu :label="'Source of funds'" :inputWidth="'w-12/12'"  isRequired="true" :options="sourceFunds"/>
                </div>
                <div class="w-full">
                    <FloatingLabelInput :inputLabel="'account no.'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" isRequired="true" :inputType="'number'" :placeholder="'ENTER ACCOUNT NO.'"/>
                </div>
            </div>
        </div>
        <!-- Form row 3 -->
        <div class="flex flex-col gap-3 mt-[60px] mb-[30px] px-5 w-[35%]">
            <InputGroup :inputLabel="'EXPECTED FREQUENCY'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
            <InputGroup :inputLabel="'EXPECTED VOLUME/AMOUNT'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
        </div>
        <!-- Buttons -->
        <div class="flex justify-center align-center gap-x-[30px]">
            <BorderButton :buttonLabel="'save as draft'" :buttonBorderColor="'border-#EE3E2C'" :buttonTextColor="'text-#EE3E2C'"  :buttonHover="'hover:bg-#EE3E2C'"/>
            <BorderButton :buttonLabel="'cancel'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonHover="'hover:bg-#3E3E3E'"/>
            <BorderButton :buttonLabel="'Next'" :isDisabled="true"/>
        </div>
    </div>
</template>
