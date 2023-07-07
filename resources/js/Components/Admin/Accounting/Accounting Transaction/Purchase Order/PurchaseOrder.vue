<script>
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import TabNav from '@/Components/Misc/Tabs/TabNav.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue'
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue'
import InputGroup from '@/Components/Misc/Input/InputGroup.vue'
import InputGroupSelectMenu from '@/Components/Misc/Select Menu/InputGroupSelectMenu.vue'
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue'
import FloatingLabelInput from '@/Components/Misc/Input/FloatingLabelInput.vue'
import TextAreaGroup from '@/Components/Misc/Input/TextAreaGroup.vue';
import Pending from '@/Components/Admin/Accounting/Accounting Transaction/Purchase Order/Tabs/Pending.vue'
import ApprovalHistory from '@/Components/Admin/Accounting/Accounting Transaction/Purchase Order/Tabs/ApprovalHistory.vue'

    export default {

        components:{
            TabNav, Tab,Pending, ApprovalHistory,BorderButton,ModalTwo,InputGroup
            ,InputGroupSelectMenu, TextAreaGroup, CheckboxSelectMenu, FloatingLabelInput
        },
        data(){

            return{
                purchaseOrderLabels:[
                    {label:'#'},
                    {label:'COST CENTER'},
                    {label:'DESCRIPTION'},
                    {label:'UNIT'},
                    {label:'QUANTITY'},
                    {label:'UNIT PRICE'},
                    {label:'AMOUNT'},
                ],
                supplierOptions: [
                    {label: 'Inkline Office Solutions Inc.'},
                    {label: 'Inkline Office Solutions Inc.'},
                    {label: 'Inkline Office Solutions Inc.'},
                ],
                deliverToOptions:[
                    {label: 'ALLCASH SJDM BULACAN'},
                    {label: 'ALLCASH CAVITE'},
                    {label: 'ALLCASH MANILA'},

                ],
                descriptionOptions:[
                    {label: 'PRODUCT'},
                    {label: 'SERVICE'},

                ],
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
                ],
                counter:1,
            }
        },

        methods:{
            setSelected(tab) {
                this.selected = tab;
            },
            openModalToggle(){
                this.openModal = false;
            },
            addNewLine(){
                this.counter++;
            },
            clearAll(){
                this.counter=1;
            }
        }
    }
</script>
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
        <div class="w-full flex flex-col gap-[30px] p-5">
            <div class="flex justify-end ">
                <div class="w-[32.6%]">
                    <InputGroup :inputLabel="'Product Order No'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                </div>
            </div>
            <div class="flex justify-center">
                <h1 class="uppercase text-[12px] font-bold text-black">Purchase Order</h1>
            </div>
            <div class="flex w-full gap-3">
                <div class="flex flex-col justify-between w-[33%]">
                    <div>
                        <InputGroupSelectMenu :label="'supplier'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select supplier'" :options="supplierOptions"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact Person'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Email Address'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact No.'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                </div>
                <div class="flex flex-col justify-between gap-[10px] w-[33%]">
                    <div>
                        <TextAreaGroup :inputLabel="'supplier address'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputHeight="'h-[70px]'" :isDisabled="true" />
                    </div>
                    <div>
                        <InputGroupSelectMenu :label="'deliver to'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select option'" :options="deliverToOptions"/>
                    </div>
                    <div>
                        <TextAreaGroup :inputLabel="'delivery address'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputHeight="'h-[70px]'" :isDisabled="true" />
                    </div>

                </div>
                <div class="flex flex-col justify-between w-[33%]">
                    <div>
                        <InputGroup :inputLabel="'PO DATE'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Payment Terms'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Expected Del. Date'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"  :inputType="'date'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact Person'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact No.'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div>
                <table class="min-w-full divide-y divide-gray-300 border">
                    <thead class="font-medium text-[11px] whitespace-nowrap bg-[#EAEAEA] sticky top-0">
                        <tr class="divide-x divide-gray-300">
                            <th v-for="label in purchaseOrderLabels" :key="label.label" scope="col"
                                class="p-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 font-light text-[10px] text-center">
                        <tr v-for="counter in counter" :key="counter" class="divide-x divide-gray-300">
                            <td
                                class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase p-2 tracking-wider">
                                {{ counter }}
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                                <CheckboxSelectMenu  :inputWidth="'w-12/12'"  :placeholder="'SELECT cost center '" :options="deliverToOptions"/>
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                                <CheckboxSelectMenu  :inputWidth="'w-12/12'"  :placeholder="'SELECT item'" :options="descriptionOptions"/>
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider">
                                PCS
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-center">
                                <!-- add increment/decrement button -->
                                <input type="number" class="bg-white uppercase h-7 p-1 border border-gray-300 text-[#3E3E3E] pl-2 text-center w-full">
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                1,800.00
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                3,600.00
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="flex flex-col text-[10px] uppercase">
                <div class="flex gap-[10px] mb-[5px]">
                    <BorderButton @click="addNewLine" :buttonLabel="'add new line'" :buttonPadding="'p-0'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                    <BorderButton @click="clearAll" :buttonLabel="'clear all'" :buttonPadding="'p-0'" :buttonTextColor="'text-[#ee3e2c]'" :buttonBorderColor="'border-[#ee3e2c]'" :buttonHover="'hover:bg-[#ee3e2c]'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                </div>
                <div class="flex gap-[2px]  h-[110px]">
                    <div class="w-[75%] relative">
                        <label for="remarks" class="absolute top-[2px] left-[2px] pt-[10px] pl-[10px] bg-white w-[99%]">Remarks</label>
                        <textarea class="w-full  bg-white resize-none block pt-[30px] pb-2.5 px-2.5 text-[10px] text-gray-900 h-full border-2 border-[#EAEAEA]" name="remarks" cols="30" rows="10"></textarea>
                    </div>
                    <div class="w-[25%] h-full flex flex-col justify-between">
                        <div class="flex items-center justify-between h-[32%] p-2 border-2 border-[#EAEAEA]">
                            <p>ToTAL AMOUNT (VAT INCLUSIVE):</p>
                            <p>3,600.00</p>
                        </div>
                        <div class="flex items-center justify-between h-[32%] p-2 border-2 border-[#EAEAEA]">
                            <p>vat-amount:</p>
                            <p>3,600.00</p>
                        </div>
                        <div class="flex items-center justify-between h-[32%] p-2 border-2 border-[#EAEAEA]">
                            <p>grand total:</p>
                            <p>3,600.00</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-[20px] mt-[30px]">
                    <BorderButton @click.prevent="openModalToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                    <BorderButton :buttonLabel="'CREATE'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
                </div>
            </div>
        </div>
    </ModalTwo>
</template>
