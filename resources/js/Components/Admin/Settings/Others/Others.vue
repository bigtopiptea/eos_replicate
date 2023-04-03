<template>
    <div class="bg-white min-h-screen w-full shadow-md">
        <TabNav :tabs="tabnames" :selected="selected"
                @selected="setSelected">
            <Tab :isSelected="selected === 'TRANSACTION TYPE'">
                <TransactionType></TransactionType>
            </Tab>
            <Tab :isSelected="selected === 'BILLER CATEGORY'">
                <Biller></Biller>
            </Tab>
            <Tab :isSelected="selected === 'PROVIDERS'">
                <Providers></Providers>
            </Tab>
            <Tab :isSelected="selected === 'DOOR TO DOOR'">
                <DoorToDoor></DoorToDoor>
            </Tab>
            <Tab :isSelected="selected === 'CASH PICKUP ANYWHERE'">
                <CashPickUpAnywhere></CashPickUpAnywhere>
            </Tab>
            <Tab :isSelected="selected === 'CREDIT TO BANK ACCOUNT'">
                <Banks></Banks>
            </Tab>
            <Tab :isSelected="selected === 'SOURCE OF FUNDS'">
                <SourceOfFund></SourceOfFund>
            </Tab>
            <Tab  :isSelected="selected === 'SOPHIA API ACCESS'">
                <APIAccess :api_access="api_access"></APIAccess>
            </Tab>
        </TabNav>
    </div>

<!--    <div class="bg-white w-full min-h-screen border border-white shadow-md">-->
<!--        <div class="min-w-full">-->
<!--            <TabGroup @change="changeTab">-->
<!--                    <TabList class="flex space-x-1 bg-gray-100 ">-->
<!--                    <Tab class="rounded-none tracking-wider font-rubik-light" v-for="item in tabnames" as="template"-->
<!--                        :key="item" v-slot="{ selected }">-->
<!--                        <button class="whitespace-nowrap px-4"-->
<!--                            :class="['w-full py-2.5 text-[12px] p-1 leading-5 font-rubik-light font-bold',-->
<!--                            selected ? 'bg-[#F98B38] text-white ' : 'text-[#3e3e3e] hover:text-white hover:bg-[#f98b38]',]">-->
<!--                            {{ item }}-->
<!--                        </button>-->
<!--                    </Tab>-->
<!--                </TabList>-->

<!--                <TabPanels class="mt-2">-->
<!--                    <TabPanel>-->
<!--                        <TransactionType></TransactionType>-->
<!--                    </TabPanel>-->
<!--                    <TabPanel>-->
<!--                        <Biller></Biller>-->
<!--                    </TabPanel>-->
<!--                    <TabPanel>-->
<!--                        <DoorToDoor></DoorToDoor>-->
<!--                    </TabPanel>-->
<!--                    <TabPanel>-->
<!--                        <CashPickUpAnywhere></CashPickUpAnywhere>-->
<!--                    </TabPanel>-->
<!--                    <TabPanel>-->
<!--                        <Banks></Banks>-->
<!--                    </TabPanel>-->
<!--                    <TabPanel>-->
<!--                        <SourceOfFund></SourceOfFund>-->
<!--                    </TabPanel>-->
<!--                    <TabPanel>-->
<!--                        <APIAccess :api_access="api_access"></APIAccess>-->
<!--                    </TabPanel>-->
<!--                </TabPanels>-->
<!--            </TabGroup>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
import Title from "@/Components/Misc/Section/Title.vue";
import Biller from "./Components/BillerCategory.vue";
import TransactionType from "./Components/TransactionType.vue";
import Banks from "./Components/Banks.vue";
import DoorToDoor from "./Components/DoorToDoor.vue";
import CashPickUpAnywhere from "./Components/CashPickUpAnywhere.vue";
import APIAccess from "@/Components/Admin/Settings/Others/Components/APIAccess.vue";
import SourceOfFund from "@/Components/Admin/Settings/Others/Components/SourceOfFund.vue";

// import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from '../../../Misc/Tabs/Tab.vue';
import Providers from "@/Components/Admin/Settings/Others/Components/Providers.vue";


export default {
    name: "others",
    components: {
        Providers,
        TabNav,
        Title,
        APIAccess,
        SourceOfFund,
        Tab,
        Biller,
        TransactionType,
        Banks,
        DoorToDoor,
        CashPickUpAnywhere
    },
    data() {
        return {
            api_access: [],
            tabnames: [
                'TRANSACTION TYPE',
                'BILLER CATEGORY',
                'PROVIDERS',
                'DOOR TO DOOR',
                'CASH PICKUP ANYWHERE',
                'CREDIT TO BANK ACCOUNT',
                'SOURCE OF FUNDS',
                'SOPHIA API ACCESS',
            ],
            selected: 'TRANSACTION TYPE',
        }
    },
    methods: {
        setTab(tab) {
            this.tabSet = tab
        },
        changeTab() {
            console.log('test');

            // if(this.selected === 'SOPHIA API ACCESS'){
                axios.get("/api/get-api-access").then(({ data }) => (this.api_access = data.data));
            // }
        },
        setSelected(tab) {
            this.selected = tab;
        },
    },
    created() {
        this.changeTab();
    }
}

</script>
