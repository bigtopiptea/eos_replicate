<script setup>
//input component
import BaseButton from '../../Misc/Buttons/BaseButton.vue';
import UserInput from '../../Misc/Input/UserInput.vue';

//components for particle, icon, and Logo
import LoginParticles from '../../Misc/Particles/LoginParticles.vue';
import allCashLogo from "/resources/assets/images/AllCash.png";
import EOSForgotPassLogo from '../../../../assets/images/EOSForgotPasswordLogo.png';
import UserIcon from '../../Misc/Icons/UserIcon.vue';
import LockIcon from '../../Misc/Icons/LockIcon.vue';

</script>
<script>

</script>
<template>
    <div class="flex">
        <div class="flex flex-1 flex-col justify-center py-12 px-4">
            <div class="mx-auto w-full max-w-sm">
                <!-- Logo -->
                <div>
                    <img :src="EOSForgotPassLogo" class="w-[200px] h-[100px] m-auto mb-10" />
                    <span class="text-[14px] font-medium text-[#7F7F7F] flex justify-center">No worries, we'll send
                        you reset instructions
                    </span>
                </div>

                <!-- Form -->
                <div class="mt-6">
                    <form @submit.prevent="login(form)" class="space-y-6">
                        <UserInput :icon="UserIcon" label="registered email" type="email"
                            placeholder="ENTER YOUR REGISTERED EMAIL " />
                        <UserInput :icon="LockIcon" label="enter partner code" type="text"
                            placeholder="ENTER PARTNER CODE" />
                        <div>
                            <BaseButton type="submit" label="proceed" class="items-center mt-12 mb-4" />
                            <router-link
                                class="flex hover:text-[#386ac2] justify-center text-[12px] uppercase text-[#4472C4]"
                                :to="{ name: 'login' }">go back to login page</router-link>
                        </div>
                    </form>
                </div>
            </div>
            <!-- powered by -->
            <div class="px-[103px] text-center mt-10">
                <span class="text-xs font-medium text-center">
                    Powered by
                    <img class="w-[35%] m-auto" :src="allCashLogo" />
                </span>
            </div>
        </div>

        <div class="relative hidden w-0 flex-1 lg:block particles">
            <LoginParticles />
        </div>

    </div>



</template>

<style scoped>
.particles {
    background: linear-gradient(126deg, #EE3E2C 33.28%, #F98B38 61.25%, #FB9E30 89.37%, #FFFFFF 115.09%);
}
</style>
