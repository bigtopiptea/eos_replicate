<script>
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import TabNav from '@/Components/Misc/Tabs/TabNav.vue'
import Reconciliation from '@/Components/Admin/Accounting/Accounting Transaction/Reconciliation of Accounts/Tabs/Reconciliation.vue';
import ReconHistory from '@/Components/Admin/Accounting/Accounting Transaction/Reconciliation of Accounts/Tabs/ReconHistory.vue';
import ReconReports from '@/Components/Admin/Accounting/Accounting Transaction/Reconciliation of Accounts/Tabs/ReconReports.vue';

    export default {

        components:{
          TabNav, Tab,ReconHistory, Reconciliation, ReconReports

        },
        data(){

            return{
                selected:'Reconciliation',
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
    <div class="bg-white w-full min-h-screen max-h-auto">
        <div class="">
            <TabNav :tabs="['Reconciliation', 'Recon. Reports','Recon. History']" :selected="selected" @selected="setSelected"  >
                <Tab :isSelected="selected === 'Reconciliation'" >
                    <Reconciliation/>
                </Tab>
                <Tab :isSelected="selected === 'Recon. Reports'" >
                    <ReconReports/>
                </Tab>
                <Tab :isSelected="selected === 'Recon. History'" >
                    <ReconHistory/>
                </Tab>
            </TabNav>
        </div>
    </div>

</template>

