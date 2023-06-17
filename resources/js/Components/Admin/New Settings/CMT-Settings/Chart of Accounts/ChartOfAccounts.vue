<script>
import COAPending from './Tabs/COAPending.vue';
import COAApprovalHistory from './Tabs/COAApprovalHistory.vue';
import COAChartOfAccounts from './Tabs/COAChartOfAccounts.vue';
import TabNav from '@/Components/Misc/Tabs/Tabnav.vue';
import Tab from '@/Components/Misc/Tabs/Tab.vue';

export default {

    components:{
        TabNav,
        Tab,
        COAPending,
        COAApprovalHistory,
        COAChartOfAccounts,

    },

    data(){
        return {

            selected: "Pending",
            // isOpen: true,
            // rates: [],
            // selected: '',

        }
    },

    methods: {
        setSelected(tab) {
            this.selected = tab;
        },

    },

}
</script>

<template>
    <div class="h-auto w-full bg-white pt-3">
        <TabNav :tabs="['Pending' , 'Approval History','Chart Of Accounts']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C]'" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Pending'" >
                <div class="w-full h-auto ">
                    <COAPending/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Approval History'" >
                <div class="w-full h-auto ">
                    <COAApprovalHistory/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Chart Of Accounts'" >
                <div class="w-full h-auto ">
                    <COAChartOfAccounts/>
                </div>
            </Tab>
        </TabNav>
    </div >
</template>
