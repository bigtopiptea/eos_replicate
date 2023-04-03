<script>

import {defineComponent} from "vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import axios from "axios";

export default defineComponent({
    components: {NormalButton},
    data(){
        return {
            monitoring: []
        }
    },
    methods: {
        printPage() {
            window.print();
        },
        async outfile(){
            await axios.get(`/api/transactions/monitoring/${this.$route.params.id}`)
                .then((response) => {
                    this.monitoring = response.data;
                })
        },
    },
    created() {
        this.outfile();
    }
})
</script>
<template>
    <div class="p-8">
        <div class="flex justify-between items-center">
            <NormalButton @click="printPage()" label="Print" class="border-2 border-[#F98B38] px-6 font-rubik-light py-1 uppercase text-[11px] text-[#F98B38] tracking-widest hover:bg-[#F98B38] hover:text-white duration-300" />
            <NormalButton label="Export" class="border-2 border-[#3E3E3E] px-6 font-rubik-light py-1 uppercase text-[11px] text-[#3E3E3E] tracking-widest hover:bg-[#3E3E3E] hover:text-white duration-300" />
        </div>
        <div class="border border-gray-300 mt-4">
            <div class="block text-center mt-2">
                <h1 class="text-[14px] font-bold tracking-widest">OPTIMUM EXCHANGE REMIT INC.</h1>
                <h1 class="text-[11px] tracking-wider">PROCESSED DATE: SEPTEMBER 28, 2022</h1>
            </div>
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-6 mb-10">
                <div class="min-w-full align-middle md:px-6 lg:px-8">
                    <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 px-10 ">
                        <table class="min-w-full table-fixed ">
                            <thead >
                            <tr >
                                <th scope="col"
                                    class="px-3 py-2 tracking-widest uppercase text-left text-[11px] text-gray-900">
                                    BANK
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-left text-[11px] text-gray-900">
                                    TRANSACTION TYPE
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-left text-[11px] text-gray-900">
                                    CURRENCY
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-center text-[11px] text-gray-900">
                                    Items
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-center text-[11px] text-gray-900">
                                    AMOUNT
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-left text-[11px] text-gray-900">
                                    HANDLING FEE
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-center text-[11px] text-gray-900">
                                    COST
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 whitespace-nowrap tracking-widest uppercase text-center text-[11px] text-gray-900">
                                    INCOME
                                </th>
                            </tr>
                            </thead>
                            <tbody v-for="items in monitoring.transaction">
                               <tr v-for="item in items.items" >
                                    <td class="whitespace-nowrap  px-3 text-left py-2 text-[11px] text-[#3E3E3E]">
                                        {{items.bank_name}}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ items.transaction_type }} - CREDIT TO BANK ACCOUNT
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-left uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ JSON.stringify(item.currency).replace(/^\["|"\]$/g, '') ?? '' }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{item.item_count}}
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ item.amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        <span v-for="handling in item.handling_fee">
                                            {{ handling.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        26,200.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        26,200.00
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="border-y border-[#d9d9d9]" >
                                <tr >
                                    <td
                                        class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                    </td>
                                    <td
                                        class="whitespace-nowrap font-bold text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                       GRAND TOTAL
                                    </td>
                                    <td
                                        class="whitespace-nowrap font-bold text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ monitoring.item_count }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap font-bold text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ monitoring.total_amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap font-bold text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
<!--                                        {{ monitoring.total_amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}-->
                                    </td>
                                    <td
                                        class="whitespace-nowrap font-bold text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        26,200.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap font-bold text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        26,200.00
                                    </td>
                                </tr>

                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-3 pb-2 pt-4 tracking-widest uppercase text-left text-[11px] text-gray-900">
                                        BATCH NO.
                                    </th>
                                    <th scope="col"
                                        class="px-3 pb-2 pt-4 tracking-widest uppercase text-left text-[11px] text-gray-900">
                                        FILENAME
                                    </th>
                                    <th scope="col"
                                        class="px-3 pb-2 pt-4 tracking-widest uppercase text-left text-[11px] text-gray-900">
                                        RATE
                                    </th>
                                    <th scope="col"
                                        class="px-3 pb-2 pt-4 tracking-widest uppercase text-left text-[11px] text-gray-900">
                                        USD AMOUNT
                                    </th>
                                    <th scope="col"
                                        class="px-3 pb-2 pt-4 tracking-widest uppercase text-left text-[11px] text-gray-900">
                                        TIE-UP PARTNER
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="upload in monitoring.batch_upload">
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ upload.batch_number }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ upload.filename }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ upload.exchange_rate }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ upload.total_amount }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ upload.company_name.name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="border-t border-[#d9d9d9] mt-2">
                            <div class="mt-4 px-3">
                                <div class="uppercase text-[11px] tracking-widest font-bold">PROCESSED BY:</div>
                                <div class="uppercase text-[10px] tracking-widest">{{ monitoring.processed_by.first_name }} {{monitoring.processed_by.last_name}}</div>
                            </div>
                            <div class="mt-4 px-3">
                                <div class="uppercase text-[11px] tracking-widest font-bold">VERIFIED BY:</div>
                                <div class="uppercase text-[10px] tracking-widest">PENDING</div>
                            </div>
                            <div class="mt-4 px-3">
                                <div class="uppercase text-[11px] tracking-widest font-bold">APPROVED BY:</div>
                                <div class="uppercase text-[10px] tracking-widest">PENDING</div>
                            </div>
                            <div class="mt-4 px-3">
                                <div class="uppercase text-[11px] tracking-widest font-bold">CMT:</div>
                                <div class="uppercase text-[10px] tracking-widest">-</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
