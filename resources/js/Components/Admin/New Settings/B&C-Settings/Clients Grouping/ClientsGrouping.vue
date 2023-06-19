<script>
import TabNav from '@/Components//Misc/Tabs/TabNav.vue'
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import Clients from './Tabs/Clients.vue';
import Groups from './Tabs/Groups.vue';
export default{
    
    components:{
        Tab, TabNav,
        Clients,
        Groups,
    },
    data(){
        return{
            selected: 'Clients'
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
        <TabNav :tabs="['Clients' , 'Groups']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Clients'" >
                <Clients/>
            </Tab>
            <Tab :isSelected="selected === 'Groups'">
                <Groups/>
            </Tab>
        </TabNav>
    </div>

</template>
