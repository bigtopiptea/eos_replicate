<script>
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import TextAreaGroupMenu from '@/Components/Misc/Input/TextAreaGroupMenu.vue';
import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";

export default {

    name:'JE Maintenance',

    components:{
        Tab,
        TabNav,
        BorderButton,
        TextAreaGroupMenu,
        InputGroupSelectMenu,
    },

    data(){
        return {
            selected: "Journal Entry",
            clientOption:[
                {label: 'CLIENT NAME 1'},
                {label: 'CLIENT NAME 2'},
                {label: 'CLIENT NAME 3'},
            ],
            deptOption:[
                {label: 'DEPARTMENT 1'},
                {label: 'DEPARTMENT 2'},
                {label: 'DEPARTMENT 3'},
            ],
            moduleOption:[
                {label: 'MODULE 1'},
                {label: 'MODULE 2'},
                {label: 'MODULE 3'},
            ],
            providerOption:[
                {label: 'PROVIDER 1'},
                {label: 'PROVIDER 2'},
                {label: 'PROVIDER 3'},
            ],
            accountOption:[
                {label: 'ACCOUNT NAME 1'},
                {label: 'ACCOUNT NAME 2'},
                {label: 'ACCOUNT NAME 3'},
            ],
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
    }
}
</script>
<template>
    <div class="w-full h-auto bg-white">
        <div class="p-[20px]">
            <div class="p-[15px]">
                <div class="flex flex-col gap-[10px] w-[38%]">
                    <InputGroupSelectMenu :label="'client name'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select client name'" :isRequired="true" :options="clientOption"/>
                    <InputGroupSelectMenu :label="'departnment'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select department'" :isRequired="true" :options="deptOption"/>
                    <InputGroupSelectMenu :label="'module'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select module'" :isRequired="true" :options="moduleOption"/>
                    <InputGroupSelectMenu :label="'provider'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select/search provider'" :options="providerOption"/>
                    <InputGroupSelectMenu :label="'account name'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select account name'" :isRequired="true" :options="accountOption"/>
                    <div class="flex justify-between text-[10px] w-full h-7 whitespace-nowrap">
                        <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA] text-[10px] w-[41.5%]">
                            entry type
                            <span class="ml-1 text-red-500">*</span>
                        </label>
                        <div class="flex justify-between w-[57%]">
                            <div class="flex items-center gap-[3px]">
                                <input type="radio">
                                <p class="uppercase">debit</p>
                            </div>
                            <div class="flex items-center gap-[3px]">
                                <input type="radio">
                                <p class="uppercase">credit</p>
                            </div>
                            <div>
                                <BorderButton :buttonLabel="'add formula'" :buttonPadding="'p-1'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                            </div>
                        </div>
                    </div>
                    <div class="border border-red-500">
                        <TextAreaGroupMenu :inputLabel="'reply'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/> 
                    </div>
                </div>
            </div>
        </div>
        <TabNav :tabs="['Journal Entry' , 'Maintenance']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Journal Entry'" >
                <div class="w-full h-auto">
                    Dyornal Entri
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Maintenance'" >
                <div class="w-full h-auto">
                    Meyntinans
                </div>
            </Tab>
        </TabNav>
    </div>
</template>