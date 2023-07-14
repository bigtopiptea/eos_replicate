<script setup>

import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
// import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
// import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
// import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
// import UserIcon from "@/Components/Misc/Icons/UserIcon.vue";

</script>

<script>
import {defineComponent} from "vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
// import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
// import RangeSlider from "@/Components/Misc/Range Slider/RangeSlider.vue";
import HomeMainContent from "./HomeComponent/HomeMainContent.vue";
import FundingWorksheet from "./HomeComponent/FundingWorksheet.vue";


export default defineComponent({
    components: {
        HomeMainContent, SmallHeading, FundingWorksheet,
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
        getState(type) {
            this.state = type;
        },
    }
})
</script>
<template>
    <!-- MAIN CONTENT -->
    <div>
        <HomeMainContent/>
    </div>

    <!-- FUNDING WORKSHEET (Currently Disabled - add '@click="openFundingWorksheet()"' to enable)-->
    <SmallHeading :isOpen="isOpen" label="FUNDING WORKSHEET" class="bg-#EE3E2C" :icon="ChevRightIcon" />
    <Transition name="slide-fade" >
        <div class="w-full h-auto bg-white p-3" v-if="!isOpen">
            <FundingWorksheet/>
        </div>
    </Transition>

</template>

