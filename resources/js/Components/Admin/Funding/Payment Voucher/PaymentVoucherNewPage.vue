<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue"
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import Accordion from "@/Components/Misc/Accordion.vue"
import CreatePaymentVoucher from "./CreatePaymentVoucher.vue"
import JournalEntry from "@/Components/Admin/Funding/Payment Voucher/JournalEntry.vue"
export default{
    components:{
        InputGroup,
        InputTextarea,
        Accordion,
        BorderButton,
        CreatePaymentVoucher,
        JournalEntry,
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

            ]
        }
    },
}
</script>
<template>
    <div class="3xl:container flex flex-col w-full h-auto bg-white py-4 ">
        <div class="px-4">
            <form class="flex w-[90%] gap-5  gap-y-3">
                <!-- Row 1 -->
                <div class="w-[40%] mb-3 ">
                    <div class="w-[66%]">
                        <InputGroup :inputLabel="'reference no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                    <div class="w-full">
                        <InputGroup :inputLabel="'PAYEE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"  :isDisabled="true"/>
                    </div>
                    <div class="">
                        <InputTextarea :label="'PARTICULARS'" inputWidth="w-full"  :inputHeight="'h-[107px]'" inputColor="'bg-#EAEAEA'" :isDisabled="true"/>
                    </div>
                    <div class="-mt-2">
                        <BorderButton :buttonLabel="'ATTACHMENTS'" :buttonPadding="'px-[5px] py-1'"/>
                    </div>
                </div>
                <div class="w-[30%]">
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
                <div class="w-[30%]">
                    <div>
                        <InputGroup :inputType="'date'" :inputLabel="'DUE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    </div>
                    <div>
                        <InputGroup :inputType="'date'" :inputLabel="'covered period'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    </div>
                </div>
            </form>
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
</template>
