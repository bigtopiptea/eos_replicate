<script setup>

import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
import UserIcon from "@/Components/Misc/Icons/UserIcon.vue";

</script>

<script>
import {defineComponent} from "vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import RangeSlider from "@/Components/Misc/Range Slider/RangeSlider.vue";
import HomeMainContent from "./HomeComponent/HomeMainContent.vue";
import FundingWorksheet from "./HomeComponent/FundingWorksheet.vue";


export default defineComponent({
    components: {
        HomeMainContent, SmallHeading, Slideover, LoadingIcon, XMarkIcon, ProgressIcon, RangeSlider, FundingWorksheet, 
    },
    data(){
        return{
            isOpen: true,
            slideoverOpen: false, //Slideover 1 (Profile)
            profileSlideoverOpen: false, //Slideover 2 (Profile Image Upload)
            adjustProfileSlideoverOpen: false, //Slideover 3 (Profile Image Setup)
        }   
    },
    methods: {
        openFundingWorksheet(){
            this.isOpen = !this.isOpen;
        },
        slideOverToggle() {
            this.slideoverOpen = false;
        },
        profileSlideOverToggle() {
            this.profileSlideoverOpen = false;
        },
        adjustProfileSlideoverToggle(){
            this.adjustProfileSlideoverOpen = false;
        },
        getState(type) {
            this.state = type;
        },
    }
})
</script>
<template>
    <!-- MAIN CONTENT -->
    <HomeMainContent/>

    <!-- FUNDING WORKSHEET -->
    <SmallHeading :isOpen="isOpen" label="FUNDING WORKSHEET" class="bg-#EE3E2C" :icon="ChevRightIcon" @clicked="openFundingWorksheet()" disabled />
    <Transition name="slide-fade" >
        <div class="3xl:container h-auto bg-white p-3" v-if="!isOpen">
            <FundingWorksheet/>
        </div>
    </Transition>

    <!-- SLIDEOVER PROFILE DETAILS-->
    <Slideover :show="slideoverOpen" @close="slideOverToggle" :title="'PROFILE'">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="input-area mx-10">
                <div class="profile-upload flex justify-evenly items-center">
                    <img src="../../../../assets/images/user-logo.png" alt="user-logo" class="w-36 h-36 rounded-full">
                    <button type="button" class=" text-sm py-1 px-3 h-7 border border-#F9951E text-#F9951E font-bold" @click="(profileSlideoverOpen = !profileSlideoverOpen)" @click.prevent="slideOverToggle()">UPLOAD</button>
                </div>
                <div class="mt-5">
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">COMPLETE NAME</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">USER ROLE</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">COMPANY</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">DEPARTMENT</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">EMAIL ADDRESS</label>
                        <input type="email" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">CONTACT NUMBER</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">DATE CREATED</label>
                        <input type="date" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button @click.prevent="slideOverToggle()" type="submit" class="py-1 px-5 text-[17px] font-medium border-2 border-black">CLOSE</button>
            </div>
        </div>
    </Slideover>

    <!-- SLIDEOVER CHANGE PHOTO - Step 1-->
    <Slideover :show="profileSlideoverOpen" @close="profileSlideOverToggle" :title="'CHANGE PHOTO'">
        <div class="flex flex-col justify-between items-center h-full pb-5">
            <div class="py-5 mx-5 w-4/5">
                <div class="flex flex-col items-center border-dotted border-2 border-#7F7F7F rounded-md p-5">
                    <div class="font-rubik-light text-center mb-5">
                        <p class="text-sm">DRAG IMAGE HERE<br>OR</p>
                        <button type="button" class="text-sm text-#EE3E2C font-medium py-1 px-4 border-2 border-#EE3E2C">BROWSE</button>
                    </div>
                    <div class="text-center text-xs">
                        <p>MAX FILE SIZE: <span class="font-bold">1MB</span><br>
                        SUPPORTED FILE TYPES: <span class="font-bold">JPEG, JPG, PNG</span>
                        </p>
                    </div>
                </div>
                <div class="pt-5 font-rubik-light">
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center text-sm">
                            <LoadingIcon></LoadingIcon>
                            <span>photo_lasconia.jpg</span>
                        </div>
                        <div class="cursor-pointer">
                            <XMarkIcon></XMarkIcon>
                        </div>
                    </div>
                    <div class="mb-3">
                        <ProgressIcon :progressWidth="'w-96'"></ProgressIcon>
                    </div>
                    <div class="flex justify-between text-xs mb-3">
                        <div>
                            <p>
                                <span>0.5 MB</span>
                                of
                                <span>1 MB</span>
                            </p>
                        </div>
                        <div class="text-#194E72">
                            <p>UPLOADING...
                            <span>50%</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between w-4/5">
                <buttton @click.prevent="profileSlideOverToggle()" type="submit" class="px-8 py-2 bg-#3E3E3E text-white text-[17px] cursor-pointer">CANCEL</buttton> 
                <buttton type="submit" class="px-11 py-2 bg-#F9951E text-white text-[17px] cursor-pointer" @click="(adjustProfileSlideoverOpen = !adjustProfileSlideoverOpen)" @click.prevent="profileSlideOverToggle()">SAVE</buttton>
            </div>
        </div>
    </Slideover>

    <!-- SLIDEOVER CHANGE PHOTO - Step 2-->
    <Slideover :show="adjustProfileSlideoverOpen" @close="adjustProfileSlideoverToggle" :title="'CHANGE PHOTO'">
        <div class="flex flex-col justify-between items-center py-5 h-full">
            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center w-auto h-auto p-7 bg-#F9951E rounded-md relative">
                    <div class="absolute top-3 right-3 text-white cursor-pointer">
                        <XMarkIcon></XMarkIcon>
                    </div>
                    <div class="flex justify-center items-center w-72 h-52 bg-#EAEAEA">
                        <img src="../../../../assets/images/user-logo.png" alt="user-logo" class=" w-48 h-48 rounded-full border border-#3E3E3E">
                    </div>
                </div>
                <div class="mt-2">
                    <RangeSlider></RangeSlider>
                </div>
            </div>

            <div class="flex justify-between w-4/5">
                <buttton @click.prevent="adjustProfileSlideoverToggle()" type="submit" class="px-8 py-2 bg-#3E3E3E text-white text-[17px] cursor-pointer">CANCEL</buttton> 
                <buttton type="submit" class="px-11 py-2 bg-#F9951E text-white text-[17px] cursor-pointer">SAVE</buttton>
            </div>
        </div>
    </Slideover>

    <!-- SLIDEOVER TRIGGER (FOR DEMONSTRATION)-->
    <button type="submit" @click="(slideoverOpen = !slideoverOpen)" class="p-3 bg-black text-white rounded-full flex">
        <UserIcon></UserIcon>
    </button>
</template>

