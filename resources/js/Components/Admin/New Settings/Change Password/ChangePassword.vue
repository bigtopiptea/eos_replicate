
<script>
import FloatingLabelInput from '../../../Misc/Input/FloatingLabelInput.vue';
import SolidButton from '../../../Misc/Buttons/SolidButton.vue';
import ModalTwo from '../../../Misc/Modal/ModalTwo.vue';
import EyeIcon from '@/Components/Misc/Icons/EyeIcon.vue'
import BorderButton from '../../../Misc/Buttons/BorderButton.vue';
export default {
    components:{
        FloatingLabelInput, SolidButton, ModalTwo, EyeIcon, BorderButton
    },
    data(){
        return{
            changePasswordOpen: false, // Modal
            password: '',
            types: false,
        }
    },
    methods:{
        // Modal
        changePasswordToggle() {
            this.changePasswordOpen = false;
        },
        toggleShowPassword() {
            this.types = !this.types;
        }
    }
}
</script>
<template>
    <div class="h-auto w-full bg-white">
       <div class="flex flex-col gap-[50px] items-center w-full text-[13px] py-[80px]">
            <div class="flex flex-col gap-[30px] items-center w-full text-[#3E3E3E]">
                <img class="w-[80px] h-[80px]" src="../../../../../assets/images/change-password-logo.png" alt="lock with pin">
                <p class="font-semibold">To update password, you must provide current password.</p>
                <div class="relative w-[25%]">
                    <!-- :placeholder="'•••••••••••••'" -->
                    <FloatingLabelInput :inputLabel="'current password'"  :inputWidth="'w-12/12'" :inputType="[types ? 'text' : 'password']"  v-model="password" />
                    <div class="w-6 h-5 absolute top-[3px] right-[5px] cursor-pointer hover:opacity-80">
                        <EyeIcon @click="toggleShowPassword"/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[15px] text-[#3E3E3E]">
                <div class="text-center">
                    <p class="font-semibold ">Password must meet the following requirements:</p>
                </div>
                <div class="flex gap-[20px]">
                    <div class="text-center">
                        <p class="font-semibold">
                            8-15 <br>
                            <span class="font-normal">Character</span>
                        </p>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold">
                            AA <br>
                            <span class="font-normal">Uppercase</span>
                        </p>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold">
                            aa <br>
                            <span class="font-normal">Lowercase</span>
                        </p>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold">
                            123 <br>
                            <span class="font-normal">Number</span>
                        </p>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold">
                            @$# <br>
                            <span class="font-normal">Symbol</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-[20px] text-[#3E3E3E] w-full">
                <h5 class="italic font-semibold">Just type it twice and try not to forget it</h5>
                <div class="relative w-[25%]">
                    <FloatingLabelInput :inputLabel="'new password'"  :inputWidth="'w-12/12'" :inputType="'password'"/>
                    <div class="w-6 h-5 absolute top-[3px] right-[5px] cursor-pointer hover:opacity-80">
                        <EyeIcon/>
                    </div>
                </div>
                <div class="relative w-[25%]">
                    <FloatingLabelInput :inputLabel="'confirm password'"  :inputWidth="'w-12/12'" :inputType="'password'"/>
                    <div class="w-6 h-5 absolute top-[3px] right-[5px] cursor-pointer hover:opacity-80">
                        <EyeIcon/>
                    </div>
                </div>
            </div>
            <div class="flex gap-10">
                <BorderButton :buttonLabel="'CANCEL'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" />
                <BorderButton @click="(changePasswordOpen = !changePasswordOpen)" :buttonLabel="'PROcEED'"  />
            </div>
       </div>
    </div>

    <ModalTwo :show="changePasswordOpen" @close="changePasswordToggle" :modalTitle="'CHANGE PASSWORD'" :modalTitlePosition="'text-right'" :iconShow="'LOCK'">
        <div class="flex flex-col items-center justify-around h-full">
            <div>
                <p class="text-center text-[15px]">
                   <span class="font-semibold text-[18px]">Well Done!</span> <br>
                   Your password has been successfully changed. <br>
                   Please use your new password to login!
                </p>
            </div>
            <BorderButton @click="(changePasswordOpen = !changePasswordOpen)" :buttonLabel="'Login'"  />
        </div>
    </ModalTwo>
</template>
