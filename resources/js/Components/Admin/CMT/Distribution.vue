<script>

import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
// import Accordion from "@/Components/Misc/Tabs/Accordion.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import DistributionProcessing from "@/Components/Admin/CMT/Processing/DistributionProcessing.vue";
import DistributionRefund from "@/Components/Admin/CMT/Refund/DistributionRefund.vue";

export default defineComponent({
    components: {
        Tab,
        TabNav,
        DateInput,
        DistributionProcessing,
        DistributionRefund,

    },
    data(){
        return {
            selected: "1 Processing",
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
    }
})
</script>
<template>
    <div class="w-full min-h-full bg-white ">
    <TabNav :selected="selected" :tabs="['1 Processing', '1 Cancellation' , '1 Additional' , '1 Adjustment' , '1 Refund']" @selected="setSelected">
        <Tab :isSelected="selected === '1 Processing'">
            <DistributionProcessing/>
        </Tab>
        <Tab :isSelected="selected === '1 Cancellation'">
            <h1>Cancellation</h1>
        </Tab>
        <Tab :isSelected="selected === '1 Additional'">
            <h1>Additional</h1>
        </Tab>
        <Tab :isSelected="selected === '1 Adjustment'">
            <h1>Adjustment</h1>
        </Tab>
        <Tab :isSelected="selected === '1 Refund'">
            <DistributionRefund/>
        </Tab>
    </TabNav>
</div>
</template>
