<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
</script>

<script>
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";

import IndividualBasicInfo from "./IndividualBasicInfo.vue";
import IndividualDocsSubmitted from "./IndividualDocsSubmitted.vue";


export default {
    components: {
        Tab, TabNav, InputLabel, IndividualBasicInfo,
        IndividualDocsSubmitted
    },
    data(){
        return {

            selected: "Basic Info",
            // isOpen: true,
            // rates: [],
            // selected: '',

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
    <div class="border bg-white border-white shadow-md">
        <TabNav :tabs="['Basic Info' , 'Docs Submitted', 'EDD', 'Remarks']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Basic Info'" >
                <div class="w-full h-auto ">
                    <IndividualBasicInfo/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Docs Submitted'" >
                <div class="w-full h-auto ">
                    <IndividualDocsSubmitted/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'EDD'" >
                <div class="w-full h-auto ">
                    <h1>Hello</h1>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Remarks'" >
                <div class="w-full h-auto ">
                    <h1>Hello</h1>
                </div>
            </Tab>
        </TabNav>
    </div>
</template>
