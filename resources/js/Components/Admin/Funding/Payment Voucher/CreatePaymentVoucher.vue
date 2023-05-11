<script>
import InputGroup from '@/Components/Misc/Input/InputGroup.vue';
import InputDropdown from '@/Components/Misc/Input/InputDropdown.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import InputGroupSelectMenu from '../../../Misc/Select Menu/InputGroupSelectMenu.vue';
export default {
    components:{
        InputGroup,
        InputDropdown,
        BorderButton,
        InputGroupSelectMenu
    },
    data() {
        return {
            labels:[
                {label:'DATE'},
                {label:'DUE DATE'},
                {label:'INVOICE NO.'},
                {label:'SUPPLIER NAME'},
                {label:'APV AMOUNT'},
                {label:'AMOUNT DUE.'},
                {label:'TO BE PAID'},
            ],
            paymentType:[
                {name: 'payment 1'},
                {name: 'payment 2'},
                {name: 'payment 3'},
            ],
            bankAccount:[
                {name: 'bank account 1'},
                {name: 'bank account 2'},
                {name: 'bank account 3'},
                {name: 'bank account 4'},
                {name: 'bank account 5'},
            ],
        }
    },
}
</script>
<template>
    <div class="px-5">
        <!-- FORM -->
        <div class="w-full">
            <form class="flex flex-col gap-3 w-[400px]">
                <InputGroup :inputLabel="'VOUCHER DATE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'" :isDisabled="true"/>
                <div class="w-full">
                    <InputGroupSelectMenu :label="'PAYMENT TYPE'" :placeholder="'SELECT PAYMENT TYPE'"  :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"  :options="paymentType"/>
                </div>
                <div class="w-full">
                    <InputGroupSelectMenu  :labelWidth="'w-4/12'" :placeholder="'SELECT BANK ACCOUNT'"  :inputWidth="'w-8/12'" :label="'BANK ACCOUNT'" :options="bankAccount"/>
                </div>
            </form>
        </div>
        <!-- TABLE -->
        <div class="flex flex-col overflow-hidden mt-[50px]">
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
        <form class="flex items-center w-full text-[10px] my-5 px-5">
            <label for="remarks" class="font-bold uppercase w-[10%]">REMARKS</label>
            <input type="text" name="remarks" class="w-[90%] p-1 focus:z-10 border border-#D7D7D7 focus:border-collapse">
        </form>
        <!-- Buttons -->
        <div class="flex justify-center gap-x-[15px]">
            <BorderButton :buttonLabel="'RESET'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonPadding="'px-[5px] py-2'" :buttonHover="'hover:bg-#3E3E3E'" />
            <BorderButton :buttonLabel="'PASS ENTRY'" :buttonPadding="'px-[5px] py-2'"/>
        </div>
    </div>
</template>
