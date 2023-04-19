<script>
import SettingsInput from '../../../Misc/Input/SettingsInput.vue';
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import Pagination from '@/Components/Misc/Pagination/Pagination.vue';
export default{
    components:{
        SettingsInput,
        BorderButton,
        Pagination,
    },
    data() {
        return {
            FTPUnallocatedTransactions: [],
            pagination: {
                current_page: 1,
            },

            selected: "Pending",
            isOpen: true,
            // rates: [],
            // selected: '',

        }
    },
    methods: {
        async getFTPUnallocatedTransactions() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.FTPUnallocatedTransactions = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },

        setSelected(tab) {
        this.selected = tab;
        },

    },
}

</script>
<template>
    <div class="inline-block min-w-full align-middle px-1">
        <div class=" shadow ring-1 ring-black ring-opacity-5">
            <table class="min-w-full divide-y gray-red-300 border border-gray-300">
                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap ">
                    <tr class="divide-x gray-red-300">
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            ID
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            Date
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            Tie-Up
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            Batch
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            Batch
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            Currency
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center">
                            Items
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center   ">
                            Total Tax Amt.
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center   ">
                            Commited Rate
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center   ">
                            Converted AMT
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center   ">
                            Funded AMT
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center   ">
                            Outstanding
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider  text-center   ">
                            For Allocation
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            01
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase " />
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            01
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase " />
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            01
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase " />
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            01
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase " />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="self-center">
        <Pagination @paginate="getDistributionRefund()"  :pagination="pagination"
                        :offset="1" class="mt-8" />
        </div>
            <div class="flex gap-[15px] justify-center mt-3">
            <BorderButton :buttonLabel="'Reset'" :buttonStyle="'border-2 border-black text-black '"></BorderButton>
            <BorderButton :buttonLabel="'Allocate Fund'" ></BorderButton>
            <BorderButton :buttonLabel="'Pass Entry'" :buttonStyle="'border-2 border-red-500 text-red-500 '" ></BorderButton>
            </div>
    </div>
</template>
