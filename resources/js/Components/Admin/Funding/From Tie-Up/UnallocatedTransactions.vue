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

            selected:"Pending",
            isOpen: true,

            labels:[
                {label:'DATE'},
                {label:'TIE-UP'},
                {label:'BATCH'},
                {label:'BATCH'},
                {label:'CURRENCY'},
                {label:'ITEMS'},
                {label:'TOTAL TAX AMT.'},
                {label:'COMMITED RATE'},
                {label:'CONVERTED AMT'},
                {label:'FUNDED AMT'},
                {label:'OUTSTANDING'},
                {label:'FOR ALLOCATION'},
            ]

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
    <div class="inline-block items-center w-auto  align-middle px-1">
        <div class="2xl:w-auto sm:w-[1070px] md:w-[1200px]  overflow-x-auto  shadow ring-1 ring-black ring-opacity-5 mx-3">
            <table class=" divide-y gray-red-300 border border-gray-300">
                <thead class="bg-[#D7D7D7]  font-medium text-[11px] whitespace-nowrap" >
                    <tr class="divide-x gray-red-300">
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider text-center">
                            <div class="flex justify-center gap-x-1">
                            <input type="checkbox" @click="checkedAll = !checkedAll" >
                            ID
                            </div>
                        </th>
                        <th v-for="label in labels" :key="label.label" scope="col"
                            class="py-2 px-1 uppercase tracking-wider text-center w-1/3">
                            {{ label.label }}
                        </th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]" :class="checkedAll ? 'bg-blue-200' : ''" >
                    <tr class="divide-x divide-gray-200" >
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <div class="flex justify-center gap-x-1">
                            <input type="checkbox" >
                            01
                            </div>
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase"/>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <div class="flex justify-center gap-x-1">
                            <input type="checkbox" @click="checkedOnce = !checkedOnce" >

                            01
                            </div>
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase"/>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <div class="flex justify-center gap-x-1">
                                <input type="checkbox">
                                01
                            </div>
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase"/>
                        </td>
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <div class="flex justify-center gap-x-1">
                                <input type="checkbox">
                                01
                            </div>
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            09/28/2022 12:00:05 PM
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            REDHA AL ANSARI
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            USD
                        </td>
                        <td lass="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            242
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            1,849,394.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            48.57
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            -
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            89,825,066.58
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            <SettingsInput placeholder="-"
                            class="w-full uppercase"/>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="bg-[#EAEAEA] font-normal text-[11px] whitespace-nowrap">
                    <tr class="">
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                        Total
                        </td>
                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                        449
                        </td>
                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                        2,705,576.00
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                        131,575,913.68
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                        </td>
                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                        131,575,913.68
                        </td>
                        <td class="whitespace-nowrap text-left pl-4 uppercase py-2 px-1 tracking-wider">
                        -
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="self-center w-full">
        <Pagination @paginate="getFTPUnallocatedTransactions()" :pagination="pagination"
                        :offset="1" class="mt-8"/>
        </div>
            <div class="flex gap-[15px] justify-center mt-3">
                <BorderButton :buttonLabel="'Reset'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-black'"/>
                <BorderButton :buttonLabel="'Allocate Fund'" :buttonPadding="'px-2 py-2'"/>
                <BorderButton :buttonLabel="'Pass Entry'" :buttonBorderColor="'border-#EE3E2C'" :buttonTextColor="'text-#EE3E2C'" :buttonPadding="'px-2 py-2'" :buttonHover="'hover:bg-red-500'"/>
            </div>
        </div>
</template>
<!-- <style>
input:checked {
  height: 50px;
}
</style> -->

