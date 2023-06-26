
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import CCReply from "./CCReply.vue";
import CCUpdate from "./CCUpdate.vue";

export default {
    components: {
        SmallHeading,
        TabNav,Tab,
        CCReply,
        CCUpdate
    },
    data(){
        return {
            selected: "Reply",
        }
    },

    methods: {
        setSelected(tab) {
            this.selected = tab;
        }

    }
}

</script>
<template>
    <div class="m-3">
        <TabNav :tabs="['Reply' , 'Update' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Reply'" >
                <div class="w-full h-auto">
                    <CCReply/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Update'" >
                <div class="w-full h-auto">
                    <CCUpdate/>
                </div>
            </Tab>
        </TabNav>

    </div>
</template>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(20px);
    opacity: 0;
}
</style>
