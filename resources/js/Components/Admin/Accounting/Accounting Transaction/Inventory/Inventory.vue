<script>
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import TabNav from '@/Components/Misc/Tabs/TabNav.vue'
import IInventory from '@/Components/Admin/Accounting/Accounting Transaction/Inventory/Tabs/IInventory.vue';
import Ilogs from '@/Components/Admin/Accounting/Accounting Transaction/Inventory/Tabs/ILogs.vue'
    export default {

        components:{
          TabNav, Tab,Ilogs, IInventory

        },
        data(){

            return{
                selected:'Inventory',
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
    <div class="bg-white w-full min-h-screen max-h-auto relative">
        <div class="">
            <TabNav :tabs="['Inventory', 'Inventory Logs']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'" >
                <Tab :isSelected="selected === 'Inventory'" >
                    <IInventory/>
                </Tab>
                <Tab :isSelected="selected === 'Inventory Logs'" >
                    <Ilogs/>
                </Tab>
            </TabNav>
        </div>
    </div>

</template>

