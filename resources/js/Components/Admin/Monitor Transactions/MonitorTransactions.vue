<script>
import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import MTDistribution from ".//Distribution/MTDistribution.vue"
import MTFunding from "./Funding/MTFunding.vue";
import MTTrading from "./Trading/MTTrading.vue"

export default defineComponent({
    components: {

        Tab,
        TabNav,
        MTDistribution,
        MTFunding,
        MTTrading,

    },
    data(){
        return {
            selected: "Distribution",
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
       <div class="w-full border bg-white border-white">
           <TabNav :tabs="['Distribution', 'Funding', 'Trading']" :selected="selected" @selected="setSelected">
               <Tab :isSelected="selected === 'Distribution'">
                   <MTDistribution/>
               </Tab>
               <Tab :isSelected="selected === 'Funding'">
                   <MTFunding/>
               </Tab>
               <Tab :isSelected="selected === 'Trading'">
                   <MTTrading/>
               </Tab>
           </TabNav>
       </div>
</template>
