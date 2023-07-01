<script>
import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import CreditConfirmation from "./Credit Confirmation/CreditConfirmation.vue";
import AccountsPayable from "./Accounts Payable/AccountsPayable.vue";
import PurchaseOrder from "./Purchase Order/PurchaseOrder.vue";
export default defineComponent({
    components: {
        Tab,
        TabNav,
        AccountsPayable,
        CreditConfirmation,
        PurchaseOrder
    },
    data(){
        return {
            selected: "Credit Back Confirmation",
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
           <TabNav :tabs="['Credit Back Confirmation', 'Accounts Payable', 'Purchase Order', 'Journal Entry']" :selected="selected" @selected="setSelected">
               <Tab :isSelected="selected === 'Credit Back Confirmation'">
                   <CreditConfirmation/>
               </Tab>
               <Tab :isSelected="selected === 'Accounts Payable'">
                   <AccountsPayable/>
               </Tab>
               <Tab :isSelected="selected === 'Purchase Order'">
                   <PurchaseOrder/>
               </Tab>
               <Tab :isSelected="selected === 'Journal Entry'">
                   journal entry
               </Tab>
           </TabNav>
       </div>
</template>
