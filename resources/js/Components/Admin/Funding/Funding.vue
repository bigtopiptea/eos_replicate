<script >

import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import BanksProviders from "@/Components/Admin/Funding/Banks & Providers/Banks&Providers.vue";



export default defineComponent({
    components: {
        Tab,
        TabNav,
        BanksProviders,



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
    <TabNav :selected="selected" :tabs="['Payment Voucher', 'From Tie-Up', 'Oeri to Oeri', 'Banks/Providers', 'Tie-Up to Oeri' ]" @selected="setSelected" >
        <Tab :isSelected="selected === 'Payment Voucher'">
            <BanksProviders/>
        </Tab>
        <Tab :isSelected="selected === 'From Tie-Up'">

        </Tab>
        <Tab :isSelected="selected === 'Oeri to Oeri'">
        </Tab>
        <Tab :isSelected="selected === 'Banks/Providers'">

        </Tab>
        <Tab :isSelected="selected === 'Tie-Up to Oeri'">

        </Tab>
    </TabNav>
    </div>
</template>
