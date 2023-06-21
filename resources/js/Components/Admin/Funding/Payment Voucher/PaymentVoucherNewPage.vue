<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue"
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import Accordion from "@/Components/Misc/Accordion.vue"
import DateInput from "@/Components/Misc/Input/DateInput.vue"
import InputGroupSelectMenu from '@/Components/Misc/Select Menu/InputGroupSelectMenu.vue'
import Slideover from "@/Components/Misc/Slideover/Slideover.vue"
import PaperClipIcon from '@/Components/Misc/Icons/PaperClipIcon.vue'
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
import ChevronDownIcon  from "@/Components/Misc/Icons/ChevronDownIcon.vue";
import CreatePaymentVoucher from "./CreatePaymentVoucher.vue"
import JournalEntry from "@/Components/Admin/Funding/Payment Voucher/JournalEntry.vue"
export default{
    components:{
        InputGroup, InputTextarea,  Accordion,
        BorderButton, CreatePaymentVoucher,
        JournalEntry,  DateInput, InputGroupSelectMenu,
        Slideover, PaperClipIcon, LoadingIcon, XMarkIcon,
        ProgressIcon, ChevronDownIcon
    },

    data() {
        return {
            labels:[
                {label:'ACCOUNT TITLE'},
                {label:'BRANCH'},
                {label:'SERVICES'},
                {label:'DEBIT'},
                {label:'CREDIT'},
                {label:'VAT RATE'},
                {label:'INPUT TAX (DR.)'},
                {label:'ATC'},
                {label:'EWT RATE'},
                {label:'W/TAX -EXPANDED (CR)'},

            ],
            options:[
                {label:'SENT'},
                {label:'DELIVERED'},
                {label:'PAID'},
                {label:'PENDING'},
            ],
            attachmentOpen: false,
            paraIcon: 'FIND'
        }
    },
    methods:{
        attachmentToggle() {
            this.attachmentOpen = false;
        },
    }
}
</script>
<template>
    <div class="3xl:container flex flex-col w-full h-auto bg-white py-4 ">
        <div class="px-4">
            <div>
                <form>
                    <div class="flex w-[90%] gap-5  gap-y-3">
                        <!-- Row 1 -->
                        <div class="w-[40%] mb-3 flex flex-col gap-3">
                            <div class="w-[66%]">
                                <InputGroup :inputLabel="'reference no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                            </div>
                            <div class="w-full">
                                <InputGroup :inputLabel="'PAYEE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"  :isDisabled="true"/>
                            </div>
                            <div>
                                <InputTextarea :label="'PARTICULARS'" inputWidth="w-full"  :inputHeight="'h-[107px]'" inputColor="'bg-#EAEAEA'" :isDisabled="true"/>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3 w-[30%]">
                            <div class="w-full">
                                <InputGroup inputLabel="invoice no." :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                            </div>
                            <div>
                                <InputGroup :inputType="'date'" :inputLabel="'INVOICE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                            </div>
                            <div>
                                <InputGroup inputLabel="invoice amount" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 w-[30%]">
                            <div>
                                <InputGroup :inputType="'date'" :inputLabel="'DUE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                            </div>
                            <div>
                                <InputGroup :inputType="'date'" :inputLabel="'covered period'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="flex justify-between gap-3 items-end mb-3 ">
                    <div>
                        <BorderButton @click="(attachmentOpen = !attachmentOpen)"  :buttonLabel="'ATTACHMENTS'" :buttonPadding="'px-[5px] py-1'"/>
                    </div>
                    <div class="flex gap-3 items-end w-[45%] justify-end">
                        <div class="w-[50%]">
                            <InputGroup :inputType="'date'" :inputLabel="'Date credited'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" />
                        </div>
                        <div class="w-[50%]">
                            <InputGroupSelectMenu :label="'Status'" :labelWidth="'w-1/3'" :inputWidth="'w-2/3'" :placeholder="'Select Status'" :options="options"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLE -->
            <div class="flex flex-col overflow-hidden">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                        <table class="min-w-full divide-y divide-gray-300 overflow-visible">
                            <thead class="bg-[#3E3E3E] font-medium text-[11px] whitespace-nowrap text-white">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center">
                                        {{ label.label }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        PREPAID - STATIONARIES & OFFICE SUPPLIES
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        -
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                        -
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                        toner
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                        1
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                        1
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                        8,928.57
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        WC120
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        178.57
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        1,071.43
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Total -->
                <div class="flex  justify-between self-end text-[11px] mt-5 mr-10 w-[350px]">
                    <div class="flex flex-col gap-y-2 uppercase">
                        <p class="font-[300] ">total purchase amount:</p>
                        <p class="font-[300] ">total vat amount:</p>
                        <p class="font-[300] ">total withholding tax:</p>
                        <p class="font-bold">total amount due:</p>
                    </div>
                    <div class="flex flex-col gap-y-2 uppercase">
                        <p class="font-[300]">Php 8,928.57</p>
                        <p class="font-[300]">php 1,071.43</p>
                        <p class="font-[300]">php 178.57</p>
                        <p class="font-bold">php 10,000.00</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion -->
        <div>
            <Accordion sectiontitle="CREATE PAYMENT VOUCHER" :setOpen=true>
                <CreatePaymentVoucher/>
            </Accordion>
        </div>
        <!-- Accordion -->
        <div>
            <Accordion sectiontitle="JOURNAL ENTRY" :setOpen=true>
                <JournalEntry/>
            </Accordion>
        </div>
    </div>

    <Slideover :show="attachmentOpen" @close="attachmentToggle" :title="'ATTACHMENTS'" :iconShow="paraIcon">
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
                <BorderButton @click="(attachmentOpen = !attachmentOpen)"  :buttonLabel="'CLOSE'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>
</template>
