<script setup>
import allCashLogo from "/resources/assets/images/AllCash.png"
import ParticlesComponent from '../../Misc/Particles/LandingPageParticles.vue';
import EOSlogo from '../../../../assets/images/EOS.png';
</script>
<template>
    <!-- <ParticlesComponent /> -->
    <div class="h-screen overflow-hidden">
        <div class="w-full m-auto text-center mt-28">
            <h3 class="font-bold uppercase text-[51px]">Hi!</h3>
            <h2 class="uppercase tracking-widest">Welcome to</h2>
            <img class="w-[331px] m-auto mt-4" :src="EOSlogo" />
        </div>

        <div class="flex justify-between items-center w-full  fixed bottom-[50px] px-20">
            <router-link class="uppercase font-bold text-sm flex items-center hover:text-amber-500"
                :to="{ path: '/remittance-inquiry' }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>
                    Remittance Inquiry
                </span>
            </router-link>
            <span class="text-xs font-medium text-center">
                Powered by
                <img class="w-1/2 m-auto" :src="allCashLogo" />
            </span>
            <router-link class="uppercase duration-300 font-bold text-sm flex items-center hover:text-amber-500" to="login">
                <span>Login Now</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </router-link>
        </div>
    </div>
</template>

<style>
.landing-page {
    background: linear-gradient(126deg, #EE3E2C 33.28%, #F98B38 61.25%, #FB9E30 89.37%, #FFFFFF 115.09%);
}
</style>
