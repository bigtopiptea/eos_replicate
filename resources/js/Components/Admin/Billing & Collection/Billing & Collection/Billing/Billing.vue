<script>
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue'
import CheckboxSelectMenu from '../../../../Misc/Select Menu/CheckboxSelectMenu.vue'
import ModalTwo from '../../../../Misc/Modal/ModalTwo.vue'
import NormalButton from '../../../../Misc/Buttons/NormalButton.vue'
import TabNav from '../../../../Misc/Tabs/TabNav.vue'
import Tab from '../../../../Misc/Tabs/Tab.vue'
export default {
    name: "Billing",

    components:{
        ModalTwo,
        BorderButton,
        CheckboxSelectMenu,
        NormalButton,
        TabNav,
        Tab,



    },
    data() {
        return {
            IsChosen:'',
            IsView:false,
            viewModalOpen: true,
            selected: "View Soa",
            TieUpPartner:[
                {label:'REDHA AL ANSARI EXCHANGE'},
                {label:'RIGHT CHOICE PAYMENTS'},
                {label:'AL EKTESAD United Exchange Company WLL.'},
                {label:'JDEE REMIT'},
                {label:'CITI EXPRESS PAYMENT'},
                {label:'RNV FOREX'},
            ],

        }
    },

    methods:{
        viewModalToggle() {
            this.viewModalOpen = false;
        },
        setSelected(tab) {
            this.selected = tab;
        },
        goBack(){
            window.history.back();
        }
    },

}
</script>

<template>
    <div class="bg-white w-full h-auto">
        <div v-show="IsChosen != ''" class="px-3 py-5">
            <div v-show="IsChosen == 'TIE-UP-PARTNERS'">
                <div class="w-[35%] flex flex-col gap-3">
                    <div>
                        <CheckboxSelectMenu :label="'Tie-up Partner'" :placeholder="'Select Tie Up Partner'" />
                    </div>
                    <div class="flex gap-3">
                        <CheckboxSelectMenu :label="'Month'" :placeholder="'Select Month'" />
                        <CheckboxSelectMenu :label="'Year'"  :placeholder="'Select Year'" />
                        <NormalButton @click="(IsView = !IsView)" class="bg-[#3E3E3E] h-auto w-[75px] text-white" :label="'View'"/>
                    </div>
                </div>
                <div class="w-full my-3">
                    <TabNav :tabs="['View Soa' , 'View Details']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
                        <Tab :isSelected="selected === 'View Soa'" >
                            <div class="w-full h-full flex justify-center py-20 border border-red-500 ">
                                <div v-if="IsView">
                                    Result
                                </div>
                                <div v-else>
                                    <div class="">
                                        <img src="../../../../../../assets/images/NoRecords.png" alt="" class="h-[200px] w-[200px]">
                                    </div>
                                </div>
                            </div>
                        </Tab>
                        <Tab :isSelected="selected === 'View Details'" >
                            <div class="w-full h-auto ">

                            </div>
                        </Tab>
                    </TabNav>
                </div>
            </div>
        </div>

    </div>
    <ModalTwo :show="IsChosen == ''" :modalTitle="'Billing'" :heightModal="'h-[300px]'" :modalTitlePosition="'text-center'">
        <div class="flex flex-col justify-between mx-5 mb-5 mt-[20px] h-full">
            <div class="flex justify-between">
                <button class="focus:outline-none" @click="IsChosen = 'TIE-UP-PARTNERS'">
                    <div class="flex flex-col justify-center items-center ">
                        <p class="text-[#F9951E] text-center text-[14px] font-bold border-[3px] border-[#F9951E] hover:bg-[#F9951E] hover:text-white">
                             <svg class="h-[150px] w-[200px] hover:stroke-white"  fill="none" stroke="#F9951E" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                            </svg>
                            TIE-UP-PARTNERS
                        </p>
                    </div>
                </button>
                <button class="focus:outline-none" @click="IsChosen = 'OTHER SERVICES'">
                    <div class="flex flex-col justify-center items-center ">
                        <p class="text-[#F9951E] text-center text-[14px] font-bold border-[3px] border-[#F9951E] hover:bg-[#F9951E] hover:text-white">
                            <svg class="h-[150px] w-[200px] hover:stroke-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F9951E">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                             </svg>
                            OTHER SERVICES
                        </p>
                    </div>
                </button>
            </div>
            <div class="flex justify-center">
                <BorderButton @click="goBack" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'"  />
            </div>
        </div>
    </ModalTwo>
</template>

