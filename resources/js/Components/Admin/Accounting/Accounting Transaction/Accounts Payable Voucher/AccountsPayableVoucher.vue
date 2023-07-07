<script setup>
import PaperClipIcon from "@/Components/Misc/Icons/PaperClipIcon.vue";
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
</script>
<script>
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import TabNav from '@/Components/Misc/Tabs/TabNav.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue'
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue'
import InputGroup from '@/Components/Misc/Input/InputGroup.vue'
import InputGroupSelectMenu from '@/Components/Misc/Select Menu/InputGroupSelectMenu.vue'
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue'
import FloatingLabelInput from '@/Components/Misc/Input/FloatingLabelInput.vue'
import TextAreaGroup from '@/Components/Misc/Input/TextAreaGroup.vue';
import Pending from '@/Components/Admin/Accounting/Accounting Transaction/Accounts Payable Voucher/Tabs/Pending.vue'
import ApprovalHistory from '@/Components/Admin/Accounting/Accounting Transaction/Accounts Payable Voucher/Tabs/ApprovalHistory.vue'
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';



    export default {

        components:{
            SearchIcon, TabNav, Tab,Pending, ApprovalHistory,BorderButton,ModalTwo,InputGroup
            ,InputGroupSelectMenu, TextAreaGroup, CheckboxSelectMenu, FloatingLabelInput, DateInput,Slideover
        },
        data(){

            return{
                isLoad:false,
                openSlideover:false,

                vatRateOption:[
                    {label:'NON-VAT'},
                    {label:'VAT-INCLUSIVE (12%)'},
                    {label:'VAT-INCLUSIVE (20%)'},
                ],
                purchaseOrderLabels:[
                    {label:'ACCOUNTING TITLE'},
                    {label:'COST CENTER'},
                    {label:'SERVICES'},
                    {label:'DEBT'},
                    {label:'CREDIT'},
                    {label:'VAT RATE'},
                    {label:'INPUT TAX (DR.)'},
                    {label:'ATC'},
                    {label:'EWT RATE'},
                    {label:'W/TAX - EXPANDED (CREDIT)'},
                ],
                branchOption:[
                    {label: 'ALL CASH MANILA'},
                    {label: 'ALL CASH BULACAN'},
                    {label: 'ALL CASH MANDALUYONG'},
                ],
                selected:'Pending',
                openModal:false,
                testCounter:1,
            }
        },

        methods:{
            setSelected(tab) {
                this.selected = tab;
            },
            openModalToggle(){
                this.openModal = false;
            },
            openSlideoverToggle(){
                this.openSlideover = false;
            },
            addNewLine(){
                this.testCounter++;
            },
            clearAll(){
                this.testCounter=1;
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
    <ModalTwo :show="openModal" @close="openModalToggle" :modalTitle="'Create AP Voucher'" :widthModal="'w-[90%]'" :heightModal="'h-[500px]'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'">
        <div class="w-full flex flex-col gap-[20px] p-5">
            <div class="uppercase text-[10px]">
                <div class="flex items-center w-[35%] h-3 ">
                    <div class="w-[50%]">
                        <div class="flex item-center gap-[5px]">
                            <input v-model="isLoad" type="checkbox" name="load_purchase">
                            <label for="load_purchase">load from purchase order</label>
                        </div>
                    </div>
                    <div v-show="isLoad == true" class="relative w-[50%]">
                        <input type="text" class="bg-white uppercase h-7 p-1 border border-gray-300 text-[#3E3E3E] pr-[30px]  w-full">
                        <div class="absolute top-[4px] right-[5px] cursor-pointer">
                            <SearchIcon />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <h1 class="uppercase text-[12px] font-bold text-black">Accounts Payable Voucher</h1>
            </div>
            <div class="flex justify-between w-full">
                <div class="flex flex-col gap-[5px] w-[33%]">
                    <div>
                        <InputGroup :inputLabel="'date'" :inputWidth="'w-7/12'" :isDisabled="true" :labelWidth="'w-5/12'" :inputType="'date'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'ap voucher no.'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div class="relative">
                        <InputGroup :inputLabel="'payee'" :placeholder="'SEARCH'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputPadRight="'pr-[30px]'"/>
                        <div class="absolute top-[4px] right-[5px] cursor-pointer">
                            <SearchIcon />
                        </div>
                    </div>
                    <div>
                        <TextAreaGroup :inputLabel="'particulars'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                    </div>
                    <div class="ml-1">
                        <BorderButton @click="(openSlideover = !openSlideover)" :buttonLabel="'attachments'" :buttonPadding="'p-0'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3e3e3e]'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                    </div>
                </div>
                <div class="flex flex-col gap-[5px] w-[33%]">
                    <div class="relative">
                        <InputGroup :inputLabel="'invoice no.'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputPadRight="'pr-[30px]'"/>
                        <div class="absolute top-[4px] right-[5px] cursor-pointer">
                            <SearchIcon />
                        </div>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'invoice date'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'invoice amount'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'due date'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'"/>
                    </div>
                    <div class="flex justify-between text-[10px] w-full h-7 whitespace-nowrap">
                        <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA] text-[10px] w-[41.5%]">covered period</label>
                        <input type="date" class=" bg-white h-full p-1 border border-gray-300 text-[#3E3E3E] w-[29%]">
                        <input type="date" class=" bg-white h-full p-1 border border-gray-300 text-[#3E3E3E] w-[29%]">
                    </div>
                    <div>
                        <InputGroup :inputLabel="'accounts payable'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"/>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="relative">
                <table class="min-w-full divide-y divide-gray-300 ">
                    <thead class="font-medium text-[11px] whitespace-nowrap bg-[#EAEAEA] sticky top-0 border">
                        <tr class="divide-x divide-gray-300 w-full">
                            <th v-for="label in purchaseOrderLabels" :key="label.label" scope="col"
                                class=" whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 font-light text-[10px] text-center border-x">
                        <tr v-for="testCounter in testCounter" :key="testCounter" class="divide-x divide-gray-300 w-full">
                            <td
                                class="whitespace-nowrap uppercase tracking-wider text-left">
                                <CheckboxSelectMenu :placeholder="'-'" :options="branchOption" :showBorder="'border-none'"/>
                            </td>
                            <td
                                class="whitespace-nowrap uppercase  tracking-wider text-left">
                                <CheckboxSelectMenu :placeholder="'-'" :options="branchOption" :showBorder="'border-none'"/>
                            </td>
                            <td
                                class="whitespace-nowrap uppercase px-2 tracking-wider text-left">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase px-2  tracking-wider text-right">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase px-2  tracking-wider text-right">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase  tracking-wider text-right">
                                <CheckboxSelectMenu :placeholder="'-'" :options="vatRateOption" :showBorder="'border-none'"/>
                            </td>
                            <td
                                class="whitespace-nowrap uppercase px-2   tracking-wider text-right">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase  tracking-wider text-right">
                                <CheckboxSelectMenu :placeholder="'-'" :options="vatRateOption" :showBorder="'border-none'"/>
                            </td>
                            <td
                                class="whitespace-nowrap uppercase px-2 tracking-wider text-right">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase px-2 tracking-wider text-right">
                                -
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="font-light text-[10px] text-center">
                        <td colspan="2" class="whitespace-nowrap uppercase  tracking-wider text-right">
                            <div class="flex gap-[10px] m-[5px]">
                                <BorderButton @click="addNewLine" :buttonLabel="'add new line'" :buttonPadding="'p-0'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                                <BorderButton @click="clearAll" :buttonLabel="'clear all'" :buttonPadding="'p-0'" :buttonTextColor="'text-[#ee3e2c]'" :buttonBorderColor="'border-[#ee3e2c]'" :buttonHover="'hover:bg-[#ee3e2c]'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                            </div>
                        </td>
                        <td class="whitespace-nowrap uppercase px-2 tracking-wider text-right font-bold ">
                            total
                        </td>
                        <td class="whitespace-nowrap uppercase px-2  tracking-wider text-right border">
                            -
                        </td>
                        <td class="whitespace-nowrap uppercase px-2  tracking-wider text-right border">
                            -
                        </td>
                        <td colspan="5" class="whitespace-nowrap uppercase   tracking-wider text-right"></td>
                    </tfoot>
                </table>
                <div class="flex justify-center gap-[20px] mt-[30px]">
                    <BorderButton @click.prevent="openModalToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                    <BorderButton :buttonLabel="'CREATE'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
                </div>
            </div>
        </div>
    </ModalTwo>
    <Slideover :show="openSlideover" @close="openSlideoverToggle" :title="'ATTACHMENTS'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between gap-[20px] h-full py-5 mx-10">
            <div>
                <div>
                    <div class="flex flex-col items-center border-dashed border-2 border-[#7F7F7F] rounded-md p-5">
                        <div class="text-center mb-5">
                            <p class="text-sm">DRAG FILE HERE<br>OR</p>
                            <div class="flex items-center justify-center cursor-pointer">
                                <BorderButton :buttonLabel="'browse'" :buttonSize="'h-auto w-[100px]'" :buttonTextColor="'text-[#EE3E2C]'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2c]'" :buttonPadding="'px-4 py-1'" :buttonTextSize="'text-[12px]'"/>
                                <input class="absolute w-[100px] opacity-0" type="file" accept=".jpg, .jpeg, .png, .pdf">
                            </div>
                        </div>
                        <div class="text-center text-[10px]">
                            <p>MAX FILE SIZE: <span class="font-bold">10MB</span><br>
                            SUPPORTED FILE TYPES: <span class="font-bold">JPEG, JPG, PNG, PDF</span>
                            </p>
                        </div>
                    </div>
                    <div class="pt-5 ">
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center text-sm">
                                <LoadingIcon></LoadingIcon>
                                <span>photo_lasconia.jpg</span>
                            </div>
                            <div class="cursor-pointer">
                                <XMarkIcon></XMarkIcon>
                            </div>
                        </div>
                        <div class="mb-3">
                            <ProgressIcon :progressWidth="'w-96'"></ProgressIcon>
                        </div>
                        <div class="flex justify-between text-[10px] mb-3">
                            <div>
                                <p>
                                    <span>0.5 MB</span>
                                    of
                                    <span>10 MB</span>
                                </p>
                            </div>
                            <div class="text-#194E72">
                                <p>UPLOADING...
                                    <span>50%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col gap-5 h-auto border-dashed border-2 border-[#7F7F7F] rounded-md p-5">
                    <h1 class="absolute -top-[10px] px-[5px] text-[13px] font-semibold text-[#3E3E3E] bg-white">UPLOADED DOCUMENTS</h1>
                    <div v-if="!records" class="flex flex-col gap-[20px]">
                        <div>
                            <div class="flex gap-3">
                                <PaperClipIcon/>
                                <div class="text-[12px]">
                                    <div class="flex items-center gap-3">
                                        <p class="text-[#1F4583] underline"><a href="#">payment_request.pdf</a></p>
                                        <XMarkIcon class="stroke-red-500 cursor-pointer"></XMarkIcon>
                                    </div>
                                    <p class="font-bold">
                                        Date uploaded:
                                        <span class="font-normal">09/28/2022 10:55:09 AM</span>
                                    </p>
                                    <p class="font-bold">
                                        Uploaded by:
                                        <span class="font-normal">SOLTES, CAROL</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center text-[#1F4583] text-[14px] hover:underline cursor-pointer">
                            <p class="capitalize">See more</p>
                            <ChevronDownIcon class="w-5 h-6"/>
                        </div>
                    </div>
                    <div v-else class="flex flex-col items-center justify-center">
                        <img src="../../../../../assets/images/no-records-img.png" alt="" class="h-[150px] w-[180px]">
                        <p class="uppercase text-center text-[14px] font-semibold">no records to display</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <BorderButton @click="(openSlideover= !openSlideover)"  :buttonLabel="'CLOSE'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>
</template>

