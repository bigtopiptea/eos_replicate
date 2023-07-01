
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import POPending from "./POPending.vue";
import POApprovalHistory from "./POApprovalHistory.vue";

export default {
    components: {
        SmallHeading,
        TabNav,Tab,
        POPending,
        POApprovalHistory
    },
    data(){
        return {
            selected: "Pending",
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
        <TabNav :tabs="['Pending' , 'Approval History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Pending'" >
                <div class="w-full h-auto">
                    <POPending/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Approval History'" >
                <div class="w-full h-auto">
                    <POApprovalHistory/>
                </div>
            </Tab>
        </TabNav>
    </div>
</template>

