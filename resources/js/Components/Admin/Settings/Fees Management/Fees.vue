<script>


import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import ServiceFee from "@/Components/Admin/Settings/Fees Management/ServiceFee.vue";
import AmendmentFee from "@/Components/Admin/Settings/Fees Management/AmendmentFee.vue";
import RefundFee from "@/Components/Admin/Settings/Fees Management/RefundFee.vue";

export default {
    name: 'Fees Management',
    components: {
        RefundFee,
        ServiceFee,
        AmendmentFee,
        Tab,
        TabNav

    },
    data() {
        return {
            selected: 'Service Fee',
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
        getState(type) {
            this.clickType = type;
        }
    }
}
</script>

<template>
    <div class="w-full">
        <TabNav class="shadow-md mt-1" :tabs="['Service Fee', 'Amendment Fee', 'Refund Fee']" :selected="selected" @selected="setSelected">
            <Tab :isSelected="selected === 'Service Fee'">
                <ServiceFee />
            </Tab>
            <Tab :isSelected="selected === 'Amendment Fee'">
                <AmendmentFee />
            </Tab>
            <Tab :isSelected="selected === 'Refund Fee'">
                <RefundFee />
            </Tab>
        </TabNav>
    </div>
    <Modal v-if="showModal" @close="showModal = false" :state="clickType" />
</template>
