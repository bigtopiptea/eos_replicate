<template>
    <div class="bg-white w-full min-h-screen max-h-auto relative">
        <div class="">
            <TabNav :tabs="['Pending', 'Approval History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'" >
                <Tab :isSelected="selected === 'Pending'" >
                    <Pending/>
                </Tab>
                <Tab :isSelected="selected === 'Approval History'" >
                    <ApprovalHistory/>
                </Tab>
            </TabNav>
            <BorderButton @click="(openModal = !openModal)" :buttonLabel="'Create New'" :buttonPadding="'px-2 py-1'" :buttonSize="'h-auto w-[100px]'" class="absolute top-3.5 right-3 "/>
        </div>
    </div>
    <ModalTwo :show="openModal" @close="openModalToggle" :modalTitle="'Create Purchase Order'" :widthModal="'w-[90%]'" :heightModal="'h-[500px]'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'">
        <div class="w-full flex flex-col gap-3 px-3 py-5">
            <div class="flex justify-end ">
                <div class="w-[32.6%]">
                    <InputGroup :inputLabel="'Product Order No'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                </div>
            </div>
            <div class="flex justify-center">
                <h1 class="uppercase text-[12px] font-[500] text-black">Purchase Order</h1>
            </div>
            <div class="flex w-full gap-3">
                <div class="flex flex-col border w-[33%] gap-5">
                    <div>
                        <InputGroupSelectMenu :label="'Supplier'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact Person'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Email Address'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact No.'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                    </div>
                </div>
                <div class="flex flex-col border w-[33%]">
                    hello
                    hello
                </div>
                <div class="flex flex-col border w-[33%] gap-3">
                    <div>
                        <InputGroup :inputLabel="'PO DATE'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputType="'date'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Payment Terms'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Expected Del. Date'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"  :inputType="'date'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact Person'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact No.'" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" />
                    </div>

                </div>
            </div>
        </div>
    </ModalTwo>
</template>
<script>
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import TabNav from '@/Components/Misc/Tabs/TabNav.vue'
import Pending from '@/Components/Admin/Accounting/Accounting Transaction/Purchase Order/Tabs/Pending.vue'
import ApprovalHistory from '@/Components/Admin/Accounting/Accounting Transaction/Purchase Order/Tabs/ApprovalHistory.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue'
import ModalTwo from '../../../../Misc/Modal/ModalTwo.vue'
import InputGroup from '../../../../Misc/Input/InputGroup.vue'
import InputGroupSelectMenu from '../../../../Misc/Select Menu/InputGroupSelectMenu.vue'


    export default {

        components:{
            TabNav, Tab,Pending, ApprovalHistory,BorderButton,ModalTwo,InputGroup
            ,InputGroupSelectMenu
        },
        data(){

            return{

                selected:'Pending',
                openModal:false,

            }
        },

        methods:{
            setSelected(tab) {
                this.selected = tab;
            },
            openModalToggle(){
                this.openModal = false;
            }
        }
    }
</script>
