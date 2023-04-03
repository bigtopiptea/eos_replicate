<template>
    <div class="flex h-screen">
        <div class="flex flex-1 flex-col justify-center py-12 px-4">
            <div class="mx-auto w-full max-w-sm">
                <!-- Logo -->
                <div>
                    <img src='../../../../assets/images/EOSResetPassword.png' class="w-[200px] h-[100px] m-auto ">
                </div>

                <!-- Form -->
                <div class="mt-6">
                    <form class="space-y-6">
                        <div>
                            <p class="whitespace-nowrap text-[14px] text-center font-[400] text-[#7F7F7F]">Enter below
                                the Reference Code that we sent to your email.</p>
                            <div class="flex justify-center mt-4">

                                <input class="m-2 bg-gray-200 border h-[45px] w-[45px] text-center form-control"
                                    type="text" id="first" maxlength="1" />
                                <input class="m-2 bg-gray-200 border h-[45px] w-[45px] text-center form-control"
                                    type="text" id="second" maxlength="1" />
                                <input class="m-2 bg-gray-200 border h-[45px] w-[45px] text-center form-control"
                                    type="text" id="third" maxlength="1" />
                                <input class="m-2 bg-gray-200 border h-[45px] w-[45px] text-center form-control"
                                    type="text" id="fourth" maxlength="1" />
                                <input class="m-2 bg-gray-200 border h-[45px] w-[45px] text-center form-control"
                                    type="text" id="fifth" maxlength="1" />
                                <input class="m-2 bg-gray-200 border h-[45px] w-[45px] text-center form-control"
                                    type="text" id="sixth" maxlength="1" />

                            </div>
                        </div>

                        <GroupInput label="New Password" name="password" id="password"
                            placeholder="ENTER YOUR NEW PASSWORD" />
                        <GroupInput label="Confirm Password" name="password" id="password"
                            placeholder="RE-ENTER YOUR NEW PASSWORD" />

                        <div class="text-center">
                            <span class="text-[14px] text-[#7F7F7F] font-sans">
                                Password must meet the following requirements:
                            </span>
                            <div class="flex text-[15px] text-[#6E6E6E] mt-4 space-x-4 ">
                                <p>
                                    <strong>8-15 </strong>Character
                                </p>
                                <p>
                                    <strong>AA</strong>
                                    Uppercase
                                </p>
                                <p>
                                    <strong>aa</strong>
                                    Lowercase
                                </p>
                                <p>
                                    <strong>123</strong>
                                    Number
                                </p>
                                <p>
                                    <strong>@$#</strong>
                                    Symbol
                                </p>
                            </div>
                        </div>

                        <div>
                            <BaseButton type="submit" label="Proceed"
                                class="items-center h-[50px] text-[20px] font-sans tracking-wide" />
                        </div>
                    </form>
                </div>
                <!-- powered by -->
                <div class="px-[103px] text-center mt-10">
                    <span class="text-xs font-medium text-center">
                        Powered by
                        <img class="w-full m-auto" src='../../../../assets/images/AllCash.png' />
                    </span>
                </div>
            </div>

        </div>
        <div class="relative hidden w-0 flex-1 lg:block particles">
            <LoginParticles />
        </div>

    </div>
</template>

<script setup>
import LoginParticles from "../../Misc/Particles/LoginParticles.vue";
import BaseButton from "../../Misc/Buttons/BaseButton.vue";
import GroupInput from "../../Misc/Input/GroupInputPassword.vue";
import UserInput from "../../Misc/Input/UserInput.vue";
import UserIconVue from '../../Misc/Icons/UserIcon.vue';
import VOtpInput from 'vue3-otp-input';

</script>

<script>
import { mapActions } from 'vuex'


export default {
    name: "Reset Password",
    data() {
        return {
            max: 1
        }
    }

    // data() {
    //     return {
    //         auth: {
    //             email: "",
    //             password: ""
    //         },
    //         validationErrors: {},
    //         processing: false
    //     }
    // },

}
</script>

<style scoped>
.particles {
    background: linear-gradient(126deg, #EE3E2C 33.28%, #F98B38 61.25%, #FB9E30 89.37%, #FFFFFF 115.09%);
}
</style>