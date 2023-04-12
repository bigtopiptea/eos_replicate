<script >

import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import DistributionProcessing from "@/Components/Admin/CMT/Processing/DistributionProcessing.vue";
import DistributionCancellation from "@/Components/Admin/CMT/Cancellation/DistributionCancellation.vue";
import DistributionAdditional from "@/Components/Admin/CMT/Additional/DistributionAdditional.vue";
import DistributionRefund from "@/Components/Admin/CMT/Refund/DistributionRefund.vue";
import DistributionAdjustment from "./Adjustment/DistributionAdjustment.vue";


export default defineComponent({
    components: {
        Tab,
        TabNav,
        DateInput,
        DistributionProcessing,
        DistributionRefund,
        DistributionCancellation,
        DistributionAdditional,
        DistributionAdjustment,


    },
    data(){
        return {
            selected: "Processing",

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
    <TabNav :selected="selected" :NumTabs="['1','1','1','1','1']" :tabs="['Processing', 'Cancellation' , 'Additional' , 'Adjustment' , 'Refund']" @selected="setSelected ">
        <Tab :isSelected="selected === 'Processing'">
            <DistributionProcessing/>
        </Tab>
        <Tab :isSelected="selected === 'Cancellation'">
            <DistributionCancellation/>
        </Tab>
        <Tab :isSelected="selected === 'Additional'">
            <DistributionAdditional/>
        </Tab>
        <Tab :isSelected="selected === 'Adjustment'">
            <DistributionAdjustment/>
        </Tab>
        <Tab :isSelected="selected === 'Refund'">
            <DistributionRefund/>
        </Tab>
    </TabNav>
    </div>
</template>
