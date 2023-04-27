<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue"
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import Accordion from "@/Components/Misc/Accordion.vue"
import CreatePaymentVoucher from "./CreatePaymentVoucher.vue"
import JournalEntry from "@/Components/Admin/Funding/Payment Voucher/JournalEntry.vue"
export default{
    components:{
        InputGroup, InputTextarea, Accordion, BorderButton, CreatePaymentVoucher, JournalEntry
    }
}
</script>
<template>
    <div class="3xl:container flex flex-col w-full h-auto bg-white py-4 ">
        <div class="px-4">
            <div class="w-[90%]">
                <!-- Row 1 -->
                <div class="flex justify-between items-center w-[74.7%]">
                    <div>
                        <InputGroup :inputLabel="'reference no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" checked>
                            <span class="text-[10px] whitespace-nowrap">LOAD FROM PURCHASE ORDER </span>
                        </div>
                        <input type="text" class="h-7 w-40 bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center border border-gray-300">
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="">
                    <div class="flex gap-2">
                        <div class="w-[50.5%]">
                            <InputGroup :inputLabel="'PAYEE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
                        </div>

                        <div  class="w-[25%]">
                            <InputGroup :inputType="'date'" :inputLabel="'INVOICE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                        </div>
                        <div  class="w-[25%]">
                            <InputGroup :inputType="'date'" :inputLabel="'DUE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <InputGroup :inputLabel="'invoice no.'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
                        <InputGroup :inputLabel="'invoice amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                        <InputGroup :inputType="'date'" :inputLabel="'covered period fr.'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'"/>
                        <InputGroup :inputType="'date'" :inputLabel="'covered period to'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'"/>
                    </div>
                </div>
                <!-- Row 3 -->
                <div class="flex items-center gap-[20px]">
                    <div class="w-[50%]">
                        <InputTextarea :label="'PARTICULARS'" inputWidth="w-[99%]"  :inputHeight="'h-[107px]'"/>
                    </div>
                    <div>
                        <BorderButton :buttonLabel="'ATTACHMENTS'"/>
                        <!-- <button class="px-8 py-2 text-[11px] border-2 border-#F9951E text-#F9951E font-bold">ATTACHMENTS</button> -->
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
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        acc title
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        cost center
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        service
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        item
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        quantity
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        unit
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center">
                                        amount
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center   ">
                                        w/tax code
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center   ">
                                        w/tax
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center   ">
                                        vat
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
                                    <td lass="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
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
                        <p>total purchase amount:</p>
                        <p>total vat amount:</p>
                        <p>total withholding tax:</p>
                        <p class="font-bold">total amount due:</p>
                    </div>
                    <div class="flex flex-col gap-y-2 uppercase">
                        <p class="font-bold">Php 8,928.57</p>
                        <p class="font-bold">php 1,071.43</p>
                        <p class="font-bold">php 178.57</p>
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
