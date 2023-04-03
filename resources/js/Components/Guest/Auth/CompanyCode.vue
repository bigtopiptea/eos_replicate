<template>
    <div class="flex h-screen">
        <div class="flex flex-1  justify-center">
            <div class="mx-auto flex flex-col justify-between h-screen">
                <!-- Logo -->
                <div class="mt-10">
                    <img src="../../../../assets/images/EOS.png" class="w-[140px] m-auto h-[60px]" />
                </div>
                <div class="mt-0">
                    <form @submit.prevent="login()">
                        <div class="w-full">
                            <InputLabel label="Partner Code" />
                            <SettingsInput v-model="auth.partner_code" class="uppercase w-[436px] placeholder:text-[12px] h-[40px]" placeholder="Enter Partner Code" />
                            <SettingsInput v-model="auth.auth_partnerCode" class="uppercase w-[436px] placeholder:text-[12px] h-[40px]" placeholder="Enter Partner Code" />

                        </div>
                        <div class="w-full text-center">
                            <NormalButton label="Proceed" class="uppercase tracking-wider text-white
                             px-10 py-2 text-[11px] border bg-[#F9951E] hover:bg-[#f9951e]/90" />
                        </div>
                    </form>
                </div>
                <!-- powered by -->
                <div class="w-full text-center mb-4">
                    <div class="text-[10px]">Powered by</div>
                    <img class="mx-auto h-10" src="../../../../assets/images/AllCash.png" />
                </div>
            </div>

        </div>
        <div class="relative hidden w-0 flex-1 lg:block particles">
            <LoginParticles />
        </div>
    </div>
</template>



<script>
import { mapActions } from "vuex";
import axios from "axios";
import ErrorMessage from "@/Components/Misc/Form Validation/ErrorMessage.vue";
import SettingsInput from "../../Misc/Input/SettingsInput.vue";
import InputLabel from "../../Misc/Input/InputLabel.vue";
import store from "@/store";
import LoginParticles from "@/Components/Misc/Particles/LoginParticles.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";

export default {
    name: "Company Code",
    components: {
        NormalButton,
        LoginParticles,
        ErrorMessage,
        SettingsInput,
        InputLabel
    },

    data() {
        return {
            auth: {
                partner_code: "",
                auth_partnerCode: "",
            },
            generated_code: "",
            validationErrors: Object,
            processing: false,
            auth_user: this.$store.state.auth,
            partner_code: "",
        };
    },
    beforeRouteLeave(to, from, next){
        if(to.meta.middleware === "guest"){
            window.confirm('Do you really want to leave? you have unsaved changes!')
            axios.post("/logout").then(({ data }) => {
                this.signOut();
                next();
            });
        }
        next()
    },
    methods: {
        ...mapActions({
            signIn: "auth/secondLogin",
            signOut: "auth/logout",
        }),
        async login(){
            const isCorrect = this.auth.partner_code === this.auth.auth_partnerCode;
            if(isCorrect) {
                await this.signIn();
            }else{
                console.log("mali repa");
            }
        }
    },
    mounted() {
        this.auth.auth_partnerCode = this.auth_user.user.company_name.partner_code;

    }
};
</script>

<style scoped>
.particles {
    background:
        linear-gradient(126deg,
            #ee3e2c 33.28%,
            #f98b38 61.25%,
            #fb9e30 89.37%,
            #ffffff 115.09%);
}
</style>
