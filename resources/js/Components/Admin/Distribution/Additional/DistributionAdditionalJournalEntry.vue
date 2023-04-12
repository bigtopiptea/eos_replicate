<script>
import SettingsInput from '@/Components/Misc/Input/SettingsInput.vue';

export default{
    components:{
        SettingsInput,

    }
}
</script>
<template>
    <div class="sm:px-6 lg:px-8">
        <div class="inline-block min-w-full py-4 align-middle ">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#3E3E3E]">
                        <tr class="divide-x divide-#EAEAEA">
                            <th scope="col"
                                class="pl-5 py-3 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-[12px] font-bold text-#FFFFFF">
                                Entries
                            </th>
                            <th scope="col"
                                class="px-2 py-3 w-[15%] uppercase tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-#FFFFFF">
                                Debit
                            </th>
                            <th scope="col"
                                class="px-2 py-3 w-[15%] uppercase whitespace-nowrap tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-#FFFFFF">
                                Credit
                            </th>
                            <th scope="col"
                                class="px-2 py-3 w-[40%] uppercase tracking-wider font-rubik-light text-center  text-[12px] font-semibold text-#FFFFFF">
                                Remarks
                            </th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput placeholder="Enter Entries"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput  placeholder="Enter Debit"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput  placeholder="Enter Credit"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput  placeholder="Enter Remarks"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput placeholder="Enter Entries"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput  placeholder="Enter Debit"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput  placeholder="Enter Credit"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider">
                                <SettingsInput  placeholder="Enter Remarks"
                                    class="w-full uppercase font-rubik-light" />
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class=" bg-#D7D7D7">
                        <tr class=" text-left">
                            <td class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider text-right text-#3E3E3E">
                                Total
                            </td>
                            <td type="number" class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider text-#3E3E3E">
                                100
                            </td>
                            <td type="number" class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider text-#3E3E3E">
                                100
                            </td>
                            <td type="none" class="whitespace-nowrap uppercase py-3 px-2 text-sm font-rubik-light tracking-wider text-#3E3E3E">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="flex justify-center space-x-4 items-center w-full h-auto mb-10 mt-10 w-f">
                <button class=" uppercase py-3 px-10 m-2 bg-#3E3E3E text-white  font-sans font-normal text-base">CANCEL</button>
                <button class=" uppercase py-3 px-10 m-2 bg-dark-orange text-white font-sans font-normal text-base">SUBMIT</button>
            </div>
        </div>
    </div>
</template>
