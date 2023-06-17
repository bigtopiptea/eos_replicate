<script>
import FromTieUp from './Tabs/SetupFromTieUp.vue';
import TieUpToOeri from './Tabs/SetupTieUpToOeri.vue';
import OeriToOeri from './Tabs/SetupOeriToOeri.vue';
import BanksProvider from './Tabs/SetupBanksProvider.vue';
import TabNav from '@/Components/Misc/Tabs/Tabnav.vue';
import Tab from '@/Components/Misc/Tabs/Tab.vue';

export default {

    components:{
        TabNav,
        Tab,
        FromTieUp,
        TieUpToOeri,
        OeriToOeri,
        BanksProvider,
    },

    data(){
        return {

            selected: "From Tie Up",
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
        <TabNav :tabs="['From Tie Up' , 'Tie Up To Oeri','Oeri To Oeri','Banks/Providers']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C]'" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'From Tie Up'" >
                <div class="w-full h-auto ">
                    <FromTieUp/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Tie Up To Oeri'" >
                <div class="w-full h-auto ">
                    <TieUpToOeri/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Oeri To Oeri'" >
                <div class="w-full h-auto ">
                    <OeriToOeri/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Banks/Providers'" >
                <div class="w-full h-auto ">
                    <BanksProvider/>
                </div>
            </Tab>
        </TabNav>
    </div >
</template>
