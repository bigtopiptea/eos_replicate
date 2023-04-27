<script>
import InputGroup from '@/Components/Misc/Input/InputGroup.vue';
import InputDropdown from '@/Components/Misc/Input/InputDropdown.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';

export default {
    components:{
        InputGroup, InputDropdown, BorderButton
    }
}
</script>
<template>
    <div class="px-5">
        <!-- FORM -->
        <div class="w-full">
            <div class="w-[400px]">
                <InputGroup :inputLabel="'VOUCHER DATE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'" :isDisabled="true"/>
                <InputDropdown :inputLabel="'PAYMENT TYPE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
                <InputDropdown :inputLabel="'BANK ACCOUNT'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
            </div>
        </div>
        <!-- TABLE -->
        <div class="flex flex-col overflow-hidden mt-[50px]">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                    <table class="min-w-full divide-y divide-gray-300 overflow-visible">
                        <thead class="bg-[#3E3E3E] font-medium text-[11px] whitespace-nowrap text-white">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                    date
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                    due date
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                    invoice no.
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                    supplier name
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                    apv amount
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                    amount due.
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center">
                                   to be paid
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    10/01/2022 12:00:00 AM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    INV000000001
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    INKLINE OFFICE SOLUTIONS INC.
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    10,000.00
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    10,000.00
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    10,000.00
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Remarks -->
        <div class="flex items-center w-full text-[10px] my-5 px-5">
            <label for="remarks" class="font-bold uppercase w-[10%]">REMARKS</label>
            <input type="text" name="remarks" class="w-[90%] p-1 focus:z-10 border border-#D7D7D7 focus:border-collapse">
        </div>
        <!-- Buttons -->
        <div class="flex justify-center gap-x-[15px]">
            <BorderButton :buttonLabel="'RESET'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'" :buttonPadding="'px-[5px] py-2'"/>
            <BorderButton :buttonLabel="'PASS ENTRY'" :buttonPadding="'px-[5px] py-2'"/>
        </div>
    </div>
</template>
