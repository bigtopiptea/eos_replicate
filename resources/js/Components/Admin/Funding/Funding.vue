<script >

import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import PaymentVoucher from "@/Components/Admin/Funding/Payment Voucher/PaymentVoucher.vue";
import FromTieUp from "@/Components/Admin/Funding/From Tie-Up/FromTieUp.vue";
import OeriToOeri from "@/Components/Admin/Funding/Oeri to Oeri/OeriToOeri.vue";
import BanksProviders from "./Banks & Providers/Banks&Providers.vue";



export default defineComponent({
  watch: {
  },
    components: {
        Tab,
        TabNav,
        PaymentVoucher,
        FromTieUp,
        OeriToOeri,
        BanksProviders
    },
    data(){
        return {
            selected: 'Payment Voucher',

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
    <TabNav :selected="selected" :tabs="['Payment Voucher', 'From Tie-Up', 'Oeri to Oeri', 'Banks/Providers', 'Tie-Up to Oeri']" @selected="setSelected" >
        <Tab :isSelected="selected === 'Payment Voucher'">
            <PaymentVoucher/>
        </Tab>
        <Tab :isSelected="selected === 'From Tie-Up'">
            <FromTieUp/>
        </Tab>
        <Tab :isSelected="selected === 'Oeri to Oeri'">
            <OeriToOeri/>
        </Tab>
        <Tab :isSelected="selected === 'Banks/Providers'">
            <BanksProviders/>
        </Tab>
        <Tab :isSelected="selected === 'Tie-Up to Oeri'">
            <TieUpToOeri/>
        </Tab>
    </TabNav>
    </div>
</template>
