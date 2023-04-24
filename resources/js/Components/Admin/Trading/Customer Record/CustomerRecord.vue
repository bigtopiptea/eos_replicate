<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
</script>

<script>
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import CRPending from "./CRPending.vue";
import CRApprovalHistory from "./CRApprovalHistory.vue";
import CRDocumentsTracker from "./CRDocumentsTracker.vue";


export default {
    components: {
        Tab, TabNav, InputLabel, CRPending, CRApprovalHistory,
        CRDocumentsTracker
    },
    data(){
        return {

            selected: "Pending",
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
        <TabNav :tabs="['Pending' , 'Approval History', 'Documents Tracker']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Pending'" >
                <div class="w-full h-auto ">
                    <CRPending/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Approval History'" >
                <div class="w-full h-auto ">
                    <CRApprovalHistory/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Documents Tracker'" >
                <div class="w-full h-auto ">
                    <CRDocumentsTracker/>
                </div>
            </Tab>
        </TabNav>
    </div>
</template>
<!-- <style>
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
</style> -->
