
<script>
import STRFileNew from "./STRFileNew.vue";
import STRHistory from '@/Components/Admin/Trading/STR/STRHistory.vue';
import Accordion from "@/Components/Misc/Accordion.vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";



export default {
    components: {
        SmallHeading,
        TabNav,
        Tab,
        STRFileNew,
        STRHistory,



    },
    data(){
        return {

            selected: "File New",


        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },


    },

}

</script>
<template>
    <div class="w-full h-full bg-white">
        <div class="border mx-3 pt-3 bg-white border-white shadow-md">
            <TabNav :tabs="['File New' , 'History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C]'" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
                <Tab :isSelected="selected === 'File New'" >
                    <STRFileNew/>
                </Tab>
                <Tab :isSelected="selected === 'History'" >
                    <STRHistory/>
                </Tab>
            </TabNav>
        </div>
    </div>
</template>

