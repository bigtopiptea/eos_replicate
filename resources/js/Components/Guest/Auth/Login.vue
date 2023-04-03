<template>
    <div class="flex h-screen">
        <div class="flex flex-1 flex-col justify-center py-12">
            <div class="mx-[10rem]">
                <!-- Logo -->
                <div>
                    <img src="../../../../assets/images/EOSLogin.png" class="w-[160px] h-[80px] m-auto mb-10" />
                </div>
                <div class="text-center">
                    <span v-if="validationErrors.message"
                        class="p-4 my-4 text-[12px] uppercase font-rubik-light text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        {{ validationErrors.message }}
                    </span>
                </div>
                <div class="mt-6">
                    <form @submit.prevent="login()" class="space-y-6 w-full">
                        <UserInput :error="auth.errors.get('identity')" :icon="UserIconVue" label="username"
                            placeholder="ENTER YOUR USERNAME " v-model="auth.identity" />
                        <GroupInputPassword :error="auth.errors.get('password')" label="password" name="password"
                            id="password" v-model="auth.password" placeholder="ENTER YOUR PASSWORD" />
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                <label for="remember-me"
                                    class="ml-2 block text-sm hover:text-indigo-500 hover:cursor-pointer text-[#4472C4]">Remember
                                    me
                                </label>
                            </div>

                            <div class="text-sm">
                                <router-link :to="{ name: 'forgot-password' }"
                                    class="font-normal text-[#4472C4] hover:text-indigo-500">Forgot your password?
                                </router-link>
                            </div>
                        </div>

                        <div class="flex -space-x-px">
                            <div class="w-1/2 min-w-0 flex-1 relative">
<!--                                <label for="card-expiration-date" class="sr-only">Expiration date</label>-->

                                <input maxlength="6"
                                    type="text" v-model="auth.code"
                                    :class="auth.errors.has('code') ? '                                       relative text-[#3E3E3E] block w-full h-[50px] p-4 border-2 border-red-500 bg-[#ECECEC] focus:z-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm\n' : 'relative text-[#3E3E3E] block w-full h-[50px] p-4 border-[#ECECEC] border bg-[#ECECEC] focus:z-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'"
                                    placeholder="ENTER CODE HERE" />
                                <label v-if="auth.errors.has('code')"
                                       class="text-[8px] absolute uppercase text-red-500 tracking-widest">
                                    {{auth.errors.get('code')}}
                                </label>
                            </div>
                            <div class="min-w-0 flex-1 flex items-center space-x-2">
                                <span class="font-dokdo p-2.5 text-white text-center text-[20px] tracking-[0.5rem] select-none block w-full h-[50px] border border-[#ECECEC] bg-[#A0A0A0] focus:z-10 focus:border-indigo-500 focus:ring-indigo-500 flex justify-center">
                                    {{ auth.generated_code }}
                                </span>
                            </div>

                        </div>

                        <div class="flex items-center">
                            <BaseButton :disabled="processing" type="submit"
                                :label="!processing ? 'login' : 'please wait   '" />
                            <div v-if="processing" role="status" class="relative">
                                <svg aria-hidden="true"
                                    class="absolute -top-4 -right-2 w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- powered by -->
                <div class="text-center mt-10">
                    <span class="text-xs font-medium text-center">
                        Powered by
                        <img class="m-auto h-10 w-[10rem]" src="../../../../assets/images/AllCash.png" />
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
import UserIconVue from "../../Misc/Icons/UserIcon.vue";
import AlertVue from "../../Misc/Alert/Alert.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import GroupInputPassword from "@/Components/Misc/Input/GroupInputPassword.vue";
import LoadIcon from "@/Components/Misc/Icons/LoadIcon.vue";
</script>

<script>
import { mapActions } from "vuex";
import axios from "axios";
import ErrorMessage from "@/Components/Misc/Form Validation/ErrorMessage.vue";
import {Form} from "vform";
import { successMessage, errorMessage } from '@/utils/toast.js';


export default {
    name: "login",
    components: {
        ErrorMessage,
    },
    data() {
        return {
            auth: new Form ({
                identity: "",
                password: "",
                code: "",
                generated_code: "",
            }),
            validationErrors: Object,
            processing: false,
        };
    },
    methods: {
        ...mapActions({
            signIn: "auth/login",
        }),
        async login() {
            this.processing = true;
            await axios.get("/sanctum/csrf-cookie");
            await this.auth.post("/login")
                .then((response) => {
                    this.signIn();
                })
                .catch((errors) => {
                    this.processing = false;
                    errorMessage('Opps!', 'Something went wrong when logging in.', 'top-right');

                })
        },
        generateRandomCode(length) {
            let word = '';
            const alphabet = 'abcdefhijklmnopqrstuvwxyz';

            for (let i = 0; i < length; i++) {
                word += alphabet.charAt(Math.floor(Math.random() * alphabet.length));
            }
            return this.auth.generated_code = word;
        },
    },
    mounted() {
        this.generateRandomCode(6)
    }
};
</script>

<style scoped>
.particles {
    background: linear-gradient(126deg,
            #ee3e2c 33.28%,
            #f98b38 61.25%,
            #fb9e30 89.37%,
            #ffffff 115.09%);
}
</style>
