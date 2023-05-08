<script>
import PHP from '@/Components/Admin/New Settings/Distribution Setup/Tabs/PHP.vue';
import USD from '@/Components/Admin/New Settings/Distribution Setup/Tabs/USD.vue';
import TabNav from '@/Components/Misc/Tabs/Tabnav.vue';
import Tab from '@/Components/Misc/Tabs/Tab.vue';
export default {
    components:{
        TabNav,
        Tab,
        PHP,
        USD

    },
    
    data(){
        return {

            selected: "PHP",
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
        <TabNav :tabs="['PHP' , 'USD']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C]'" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'PHP'" >
                <div class="w-full h-full ">
                    <PHP/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'USD'" >
                <div class="w-full h-full ">
                    <USD/>
                </div>
            </Tab>
        </TabNav>
    </div >
</template>
