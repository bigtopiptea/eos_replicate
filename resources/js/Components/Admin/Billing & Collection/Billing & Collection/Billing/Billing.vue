<script>
import BillingTable2 from './Tabs/BillingTable2.vue'
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue'
import CheckboxSelectMenu from '../../../../Misc/Select Menu/CheckboxSelectMenu.vue'
import ModalTwo from '../../../../Misc/Modal/ModalTwo.vue'
import NormalButton from '../../../../Misc/Buttons/NormalButton.vue'
import TabNav from '../../../../Misc/Tabs/TabNav.vue'
import Tab from '../../../../Misc/Tabs/Tab.vue'
import DownloadIcon from '../../../../Misc/Icons/DownloadIcon.vue'
import ChevRightIcon from '../../../../Misc/Icons/ChevRightIcon.vue'
import BillingTable1 from './Tabs/BillingTable1.vue'
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue'

export default {
    name: "Billing",

    components:{
        FloatingLabelInput,
        ModalTwo,
        BorderButton,
        CheckboxSelectMenu,
        NormalButton,
        TabNav,
        Tab,
        DownloadIcon,
        ChevRightIcon,
        BillingTable1,
        BillingTable2,



    },
    data() {
        return {
            IsChosen:'',
            IsView:false,
            viewModalOpen: true,
            selected: "View Soa",
            TieUpPartner:[
                {name:'REDHA AL ANSARI EXCHANGE'},
                {name:'RIGHT CHOICE PAYMENTS'},
                {name:'AL EKTESAD United Exchange Company WLL.'},
                {name:'JDEE REMIT'},
                {name:'CITI EXPRESS PAYMENT'},
                {name:'RNV FOREX'},
            ],
            labels:[
                {label:'SOA NO.'},
                {label:'MONTH'},
                {label:'YEAR'},
                {label:'CLIENT NAME'},
                {label:'PAPER BILLING'},
                {label:'PAPERLESS BILLING'},

            ],
            clientOptions:[
                {name:'AFFILIATE 1'},
                {name:'AFFILIATE 2'},
                {name:'COMMUNITIES DAVAO'},
                {name:'COMMUNITIES BATANGAS'},
            ],
            serviceOptions:[
                {name:'LBC'},
                {name:'LALAMOVE'},
                {name:'JRS EXPRESS'},
                {name:'J&T EXPRESS'},
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
                        <CheckboxSelectMenu :label="'Tie-up Partner'" :placeholder="'Select Tie Up Partner'" :options="TieUpPartner" />
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
                            <div class="w-full min-h-screen max-h-full">
                                <div v-if="IsView" class="w-full px-14 flex justify-center py-20">
                                    <BillingTable1 :labels="labels"/>
                                </div>
                                <div v-else class="flex flex-col items-center justify-center py-20">
                                    <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
                                    <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
                                </div>
                            </div>
                        </Tab>
                        <Tab :isSelected="selected === 'View Details'" >
                            <div class="w-full h-auto py-3 px-3 ">
                                <BillingTable2/>
                            </div>
                        </Tab>
                    </TabNav>
                </div>
            </div>
            <div v-show="IsChosen == 'OTHER SERVICES'">
                <div class="w-[35%] flex flex-col gap-3">
                    <div>
                        <CheckboxSelectMenu v-model="selectedClient" :label="'Clients'" :placeholder="'Select Client'" :options="clientOptions" />
                    </div>
                    <div class="w-[45%]">
                        <CheckboxSelectMenu v-model="selectedService" :label="'Service'" :placeholder="'Select Service'" :options="serviceOptions"/>
                    </div>
                    <div class="flex gap-[10px] w-[70%]">
                        <FloatingLabelInput :inputLabel="'Start Date'" :inputType="'date'"/>
                        <FloatingLabelInput :inputLabel="'End Date'" :inputType="'date'"/>
                    </div>
                    <div class="flex gap-3 w-[70%]">
                        <FloatingLabelInput :inputLabel="'Reference No.'" :placeholder="'Input Reference No.'"/>
                    </div>
                    <div>
                        <NormalButton @click="applyFilter" class="bg-[#3E3E3E] h-auto w-[75px] text-white py-2 px-3 text-[13px]" :label="'FILTER'"/>
                    </div>
                </div>
                <div class="w-full my-3">
                    <TabNav :tabs="['View Soa' , 'View Details']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
                        <Tab :isSelected="selected === 'View Soa'" >
                            <div class="w-full min-h-screen max-h-full">
                                <div v-if="IsView" class="w-full px-14 flex justify-center py-20">
                                    <BillingTable1 :labels="labels"/>
                                </div>
                                <div v-else class="flex flex-col items-center justify-center py-20">
                                    <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
                                    <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
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
                             <svg class="h-[150px] w-[200px] hover:stroke-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
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

