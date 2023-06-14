<script>
import TabNav from '@/Components//Misc/Tabs/TabNav.vue'
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import CollectionPaymentDetails from './Tabs/CollectionPaymentDetails.vue';
import CollectionPaymentHistory from './Tabs/CollectionPaymentHistory.vue';
export default{
    
    components:{
        Tab, TabNav,
        CollectionPaymentDetails,
        CollectionPaymentHistory,
    },
    data(){
        return{
            selected: 'Payment Details'
        }
    },

    methods:{
        setSelected(tab) {
            this.selected = tab;
        },
    }
}
</script>
<template>
    <div class="bg-white">
        <TabNav :tabs="['Payment Details' , 'Payment History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Payment Details'" >
                <CollectionPaymentDetails/>
            </Tab>
            <Tab :isSelected="selected === 'Payment History'">
                <CollectionPaymentHistory/>
            </Tab>
        </TabNav>
    </div>

</template>
