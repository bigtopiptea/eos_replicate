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
            <div class="flex w-full gap-3 mb-5">
                <div class="flex flex-col w-[33%] justify-between">
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
                <div class="flex flex-col w-[33%] gap-3">
                    <div>
                        <TextAreaGroup :inputLabel="'Supplier Address'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                    </div>
                    <div>
                        <InputGroupSelectMenu :label="'Deliver to'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :options="sampleOption"/>
                    </div>
                    <div>
                        <TextAreaGroup :inputLabel="'Delivery Address'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                    </div>
                </div>
                <div class="flex flex-col w-[33%] justify-between">
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
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-2 uppercase tracking-wider text-center whitespace-nowrap text-gray-900 ">
                                    {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        01
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <CheckboxSelectMenu :placeholder="'ALLCASH SJDM BULACAN'"/>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <CheckboxSelectMenu :placeholder="'INPUT/select item (PRODUCT/SERVICE)'"/>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <CheckboxSelectMenu :placeholder="'select unit'"/>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <input type="number" name="" id="quantity" class="w-full py-1.5 px-2 uppercase text-[10px] border border-gray-300 focus:outline-none">
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        php
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        10,000.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
import TextAreaGroup from '../../../../Misc/Input/TextAreaGroup.vue'
import CheckboxSelectMenu from '../../../../Misc/Select Menu/CheckboxSelectMenu.vue'


    export default {

        components:{
            TabNav, Tab,Pending, ApprovalHistory,BorderButton,ModalTwo,InputGroup
            ,InputGroupSelectMenu, TextAreaGroup, CheckboxSelectMenu
        },
        data(){

            return{

                selected:'Pending',
                openModal:false,
                sampleOption:[
                    {label:'A'},
                    {label:'B'},
                    {label:'C'},
                ],
                labels:[
                    {label:'#'},
                    {label:'Cost Center'},
                    {label:'Description'},
                    {label:'Unit'},
                    {label:'Quantity'},
                    {label:'Unit Price'},
                    {label:'Amount'},
                ]
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
