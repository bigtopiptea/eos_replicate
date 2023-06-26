<template>
    <div class="h-auto bg-white w-full">
        <div>
            <div class="flex flex-col justify-center items-center h-full  gap-3 mb-5">
                <div>
                    <img src="../../../../assets/images/SophiaLogo.png" alt="">
                </div>
                <div>
                    <h1 class="text-[15px] font-[400px] text-center text-[#3E3E3E] mb-3">Know The Status of your remittance now!</h1>
                    <h2 class="text-[12px] font-[400px] text-center text-[#3E3E3E]" >Simply enter the complete reference number including alphabet or special characters (if any) <br/>provided by remittance partners of your remitter.</h2>
                </div>
            </div>

            <div class="flex flex-col justify-center items-center " >
                <div class="w-[25%] flex flex-col gap-1">
                    <div class="relative">
                        <input type="text" class="h-full w-full border border-gray-300 text-[9px] py-2 px-3 uppercase focus:outline-none bg-[#EAEAEA]" placeholder="Enter Remittance Reference No."/>
                        <SearchIcon class="absolute top-1 right-2 z-10 cursor-pointer"/>
                    </div>

                    <div class="flex gap-1">
                        <div class="w-[90%] ">
                            <div class="h-full border-gray-300 bg-[#F9951E] opacity-[30%] w-full flex items-center justify-center">
                                <captcha-code
                                    v-model:captcha="code"
                                    @on-change="handleChange"
                                    ref="captcha"
                                    >
                                </captcha-code>
                            </div>
                        </div>
                        <div class="flex flex-col w-[10%] gap-1">
                            <button class="flex justify-center w-full h-full border border-gray-300 bg-[#EAEAEA]">
                                <SpeakerIcon/>
                            </button>
                            <button @click="handleClick" class="flex justify-center w-full h-full border border-gray-300 bg-[#EAEAEA]">
                                <LoadIcon/>
                            </button>
                        </div>
                    </div>
                    <div class="">
                        <input type="text" v-model="inputCaptcha" class="h-full w-full border border-gray-300 text-[9px] py-2 px-3 focus:outline-none bg-[#EAEAEA]" placeholder="Type the Characters Above"/>
                    </div>
                </div>
                <div class="mt-8">
                    <NormalButton @click="isCorrect()" class="bg-[#F9951E] text-white py-1 shadow-lg h-auto w-[150px] " label="TRACK"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import LoadIcon from '../../Misc/Icons/LoadIcon.vue'
import SearchIcon from '../../Misc/Icons/SearchIcon.vue'
import SpeakerIcon from '../../Misc/Icons/SpeakerIcon.vue'
</script>

<script>
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import CaptchaCode from "vue-captcha-code";

export default {

    components:{
        NormalButton, CaptchaCode
    },
    data() {
        return {
            remittanceRef: "",
            code:"",
            finalCode:"",
            result:false,
            inputCaptcha:'',
        };
    },
    methods: {
        isCorrect(){
            if (this.inputCaptcha === this.code){
                console.log('Success');
            }
            else{
                console.log('Failed');
            }
        },
        handleClick(code,finalCode) {
            this.$refs.captcha.refreshCaptcha();

        },
        handleChange(code) {
            console.log("code:", code);
        },
    },
}
</script>
