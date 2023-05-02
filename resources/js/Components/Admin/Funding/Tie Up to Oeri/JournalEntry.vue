<script>
import SettingsInput from '@/Components/Misc/Input/SettingsInput.vue';

export default{
    components:{
        SettingsInput,

    },
}
</script>
<template>
    <div class="sm:px-6">
        <div class="inline-block min-w-full py-4 align-middle ">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#3E3E3E] text-[10px]">
                        <tr class="divide-x divide-#EAEAEA">
                            <th scope="col"
                                class="pl-5 py-2 whitespace-nowrap uppercase tracking-wider  text-left  font-bold text-#FFFFFF">
                                Entries
                            </th>
                            <th scope="col"
                                class="px-2 py-2 w-[15%] uppercase tracking-wider  text-center font-semibold text-#FFFFFF">
                                Debit
                            </th>
                            <th scope="col"
                                class="px-2 py-2 w-[15%] uppercase whitespace-nowrap tracking-wider  text-center   font-semibold text-#FFFFFF">
                                Credit
                            </th>
                            <th scope="col"
                                class="px-2 py-2 w-[40%] uppercase tracking-wider  text-center   font-semibold text-#FFFFFF">
                                Remarks
                            </th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider">
                                <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class=" bg-#D7D7D7 text-[10px]">
                        <tr class=" text-left">
                            <td class="whitespace-nowrap uppercase py-2 px-2   tracking-wider font-bold text-right text-#3E3E3E">
                                Total
                            </td>
                            <td type="number" class="whitespace-nowrap uppercase py-2 px-2   font-bold tracking-wider text-#3E3E3E">
                                100
                            </td>
                            <td type="number" class="whitespace-nowrap uppercase py-2 px-2   font-bold tracking-wider text-#3E3E3E">
                                100
                            </td>
                            <td type="none" class="whitespace-nowrap uppercase py-2 px-2   font-bold tracking-wider text-#3E3E3E">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="flex justify-center space-x-4 items-center w-full h-auto mt-5">
                <slot/>
            </div>
        </div>
    </div>
</template>
