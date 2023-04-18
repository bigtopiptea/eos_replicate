<script >

import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import DistributionProcessing from "@/Components/Admin/Distribution/Processing/DistributionProcessing.vue";
import DistributionCancellation from "@/Components/Admin/Distribution/Cancellation/DistributionCancellation.vue";
import DistributionAdditional from "@/Components/Admin/Distribution/Additional/DistributionAdditional.vue";
import DistributionRefund from "@/Components/Admin/Distribution/Refund/DistributionRefund.vue";
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
            selected: 'Cancellation',

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
    <TabNav :selected="selected.name" :tabs="[{name:'Processing', value: 1}, {name:'Cancellation', value: 1} , {name:'Additional', value: 1} , {name:'Adjustment', value: 1}  , {name:'Refund', value: 1} , ]" @selected="setSelected" >
        <Tab :isSelected="selected.name === 'Processing'">
            <DistributionProcessing/>
        </Tab>
        <Tab :isSelected="selected.name === 'Cancellation'">
            <DistributionCancellation/>
        </Tab>
        <Tab :isSelected="selected.name === 'Additional'">
            <DistributionAdditional/>
        </Tab>
        <Tab :isSelected="selected.name === 'Adjustment'">
            <DistributionAdjustment/>
        </Tab>
        <Tab :isSelected="selected.name === 'Refund'">
            <DistributionRefund/>
        </Tab>
    </TabNav>
    </div>
</template>
