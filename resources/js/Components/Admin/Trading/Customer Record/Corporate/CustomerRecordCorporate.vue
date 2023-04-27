<script>
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import CorporateBasicInfo from "./CorporateBasicInfo.vue";
import CorporateOwners from "./CorporateOwners.vue";
import CorporateRepresentatives from "./CorporateRepresentatives.vue";
import CorporateTraders from "./CorporateTraders.vue";
import CorporateBeneficiaries from "./CorporateBeneficiaries.vue";
import CorporateRemarks from "./CorporateRemarks.vue";
import CorporateDocsSubmitted from "./CorporateDocsSubmitted.vue";
import CorporateEDD from "./CorporateEDD.vue";

export default {
    components: {
        Tab, TabNav, CorporateBasicInfo, CorporateOwners,
        CorporateRepresentatives, CorporateTraders,
        CorporateBeneficiaries, CorporateRemarks,
        CorporateDocsSubmitted, CorporateEDD
    },
    data(){
        return {
            selected: "Basic Info",
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
    <div class="border bg-white border-white shadow-md">
        <TabNav :tabs="['Basic Info' , 'Owners', 'Representatives', 'Traders', 'Beneficiaries', 'Remarks', 'Docs Submitted', 'EDD']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Basic Info'" >
                <div class="w-full h-auto ">
                    <CorporateBasicInfo/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Owners'" >
                <div class="w-full h-auto ">
                    <CorporateOwners/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Representatives'" >
                <div class="w-full h-auto ">
                    <CorporateRepresentatives/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Traders'" >
                <div class="w-full h-auto ">
                    <CorporateTraders/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Beneficiaries'" >
                <div class="w-full h-auto ">
                    <CorporateBeneficiaries/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Remarks'" >
                <div class="w-full h-auto ">
                    <CorporateRemarks/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Docs Submitted'" >
                <div class="w-full h-auto ">
                    <CorporateDocsSubmitted/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'EDD'" >
                <div class="w-full h-auto ">
                    <CorporateEDD/>
                </div>
            </Tab>
        </TabNav>
    </div>
</template>
