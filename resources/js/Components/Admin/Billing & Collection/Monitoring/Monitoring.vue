
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";;
import MonitoringPending from "./Tabs/MonitoringPending.vue";
import MonitoringApprovalHistory from "./Tabs/MonitoringApprovalHistory.vue";
export default {
    components: {
        SmallHeading, TabNav, Tab, MonitoringPending,
        MonitoringApprovalHistory
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
    <div class="border bg-white border-white shadow-md">
        <TabNav :tabs="['Pending' , 'Approval History' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Pending'" >
                <div class="w-full h-auto">
                    <MonitoringPending/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Approval History'" >
                <div class="w-full h-auto">
                    <MonitoringApprovalHistory/>
                </div>
            </Tab>
        </TabNav>
    </div>
</template>
