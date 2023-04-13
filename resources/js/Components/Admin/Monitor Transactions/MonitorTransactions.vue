<script>
import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import MTDistribution from ".//Distribution/MTDistribution.vue"
import MTFunding from "./Funding/MTFunding.vue";
import MTTrading from "./Trading/MTTrading.vue"

export default{
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
}
</script>
<template>
       <div class="w-full border bg-white border-white">
           <TabNav :selected="selected.name" :tabs="[{name: 'Distribution', value: 6}, {name: 'Funding', value: 4 }, {name: 'Trading', value: 2 }]"  @selected="setSelected">
               <Tab :isSelected="selected.name === 'Distribution'">
                   <MTDistribution/>
               </Tab>
               <Tab :isSelected="selected.name === 'Funding'">
                   <MTFunding/>
               </Tab>
               <Tab :isSelected="selected.name === 'Trading'">
                   <MTTrading/>
               </Tab>
           </TabNav>
       </div>
</template>
