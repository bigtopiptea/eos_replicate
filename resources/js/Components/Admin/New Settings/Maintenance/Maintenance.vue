
<script>
import TabNav from '@/Components/Misc/Tabs/Tabnav.vue';
import Tab from '@/Components/Misc/Tabs/Tab.vue';
import TieUps from './Tabs/TieUps.vue';
export default {
    components:{
        TabNav,
        Tab,
        TieUps

    },
    
    data(){
        return {
            selected: "TIE-UPS",

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
        <TabNav :tabs="['TIE-UPS' , 'BANKS/PROVIDERS', 'TIE-UP PLUS']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C]'" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'TIE-UPS'" >
                <div class="w-full h-auto ">
                    <TieUps/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'BANKS/PROVIDERS'" >
                <div class="w-full h-full ">
                    <BanksProviders/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'TIE-UP PLUS'" >
                <div class="w-full h-full ">
                    <TieUpPlus/>
                </div>
            </Tab>
        </TabNav>
    </div >
</template>
