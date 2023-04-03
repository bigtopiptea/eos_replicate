<script>
import Title from "../../Misc/Section/Title.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import SettingsInput from "@/Components/Misc/Input/SettingsInput.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
export default {
    components: {
        SearchIcon,
        NormalButton,
        InputLabel,
        SettingsInput,
        Tab,
        TabNav,
        Title,
    },
    data(){
        return {
            selected: 'Inquiries',
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
    }
};
</script>
<template>
    <div class="w-full border bg-white h-screen border-white">
        <TabNav :tabs="['Inquiries', 'Inquiry History', 'Search TXNS']" :selected="selected" @selected="setSelected">
            <Tab :isSelected="selected === 'Inquiries'">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <InputLabel label="Start Date" />
                            <br/>
                            <input class="text-[11px] border border-gray-300 p-2" type="date" />
                        </div>
                        <div>
                            <InputLabel label="End Date" />
                            <br/>
                            <input class="text-[11px] border border-gray-300 p-2" type="date" />
                        </div>
                    </div>
                    <div class="">
                        <form class="flex items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                       class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                       placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                                          class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                            <NormalButton label="Export"
                                          class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                        </form>
                    </div>
                </div>
                <div class="">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-[11px] uppercase tracking-widest">INQ. ID</th>
                                <th class="text-[11px] uppercase tracking-widest">Date INquired</th>
                                <th class="text-[11px] uppercase tracking-widest">Reference No.</th>
                                <th class="text-[11px] uppercase tracking-widest">TRANSACTION TYPE</th>
                                <th class="text-[11px] uppercase tracking-widest">Bank/BILLER</th>
                                <th class="text-[11px] uppercase tracking-widest">CURRENCY</th>
                                <th class="text-[11px] uppercase tracking-widest">Amount</th>
                                <th class="text-[11px] uppercase tracking-widest">STATUS</th>
                                <th class="text-[11px] uppercase tracking-widest">TIE UP PARTNER</th>
                                <th class="text-[11px] uppercase tracking-widest">Requested by</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Inquiry History'">
                <h1>Inquiry History</h1>
            </Tab>
            <Tab :isSelected="selected === 'Search TXNS'">
                <h1>Search TXNS</h1>
            </Tab>
        </TabNav>
    </div>
</template>
