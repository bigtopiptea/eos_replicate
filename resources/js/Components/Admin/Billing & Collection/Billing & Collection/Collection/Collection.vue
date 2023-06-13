<script>
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue'
import CheckboxSelectMenu from '../../../../Misc/Select Menu/CheckboxSelectMenu.vue'
import ModalTwo from '../../../../Misc/Modal/ModalTwo.vue'
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue'
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue'
import TabNav from '../../../../Misc/Tabs/TabNav.vue'
import Tab from '../../../../Misc/Tabs/Tab.vue'
import CollectionAllTable from './Table/CollectionAllTable.vue';
export default {
    name: "Billing",

    components:{
        ModalTwo,
        BorderButton,
        CheckboxSelectMenu,
        FloatingLabelInput,
        NormalButton,
        TabNav,
        Tab,
        CollectionAllTable
    },
    data() {
        return {
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
            IsChosen:'',
            showTable:false,
            viewModalOpen: true,
            selected: "All",
            selectedClient: '',
            selectedService: ''

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
        },
        applyFilter() {
            const clientValue = this.selectedClient?.name || '';
            const serviceValue = this.selectedService?.name || '';
            // Do something with the filter value
            console.log(clientValue + ' - ' + serviceValue);

            // Update the flag based on the values
            this.showTable = clientValue !== '' && serviceValue !== '';
            
        }
    }

}
</script>

<template>
    <div class="bg-white w-full h-auto">
        <div class="py-5">
            <div >
                <div class="w-[35%] flex flex-col gap-3 px-3">
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
                    <TabNav :tabs="['All' , 'Open' , 'Closed']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
                        <Tab :isSelected="selected === 'All'" >
                            <div class="w-full h-full p-5">
                                <div v-if="showTable" class="w-full">                                                  
                                    <!-- TABLE -->
                                    <div class="w-full">
                                        <CollectionAllTable/>
                                    </div>
                                </div>
                                <div v-else class="flex flex-col items-center justify-center py-20">
                                    <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
                                    <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
                                </div>
                            </div>
                        </Tab>
                        <Tab :isSelected="selected === 'Open'">
                            <div class="w-full h-auto ">

                            </div>
                        </Tab>
                        <Tab :isSelected="selected === 'Closed'">
                            <div class="w-full h-auto ">

                            </div>
                        </Tab>
                    </TabNav>
                </div>
            </div>
            <div v-show="IsChosen == 'OTHER SERVICES'">
                <div>
                    Other Services
                </div>
            </div>
        </div>
    </div>
</template>

