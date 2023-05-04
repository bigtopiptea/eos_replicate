<script>
import SettingsInput from '@/Components/Misc/Input/SettingsInput.vue';
import SolidButton from '@/Components/Misc/Buttons/SolidButton.vue';
import BorderButton from '../../Misc/Buttons/BorderButton.vue';
import Toast from '../../Misc/Toast/Toast.vue';
export default{
    components:{
        SettingsInput,
        SolidButton,
        BorderButton,
        Toast,

    },
    data(){
        return{
            viewToastOpen: false,
        }
    },

    methods: {
        viewToastToggle(){
            this.viewToastOpen = false;
        }
    },

}
</script>
<template>
    <div class="sm:px-6 lg:px-8">
        <div class="inline-block min-w-full py-4 align-middle ">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                <table class="min-w-full ">
                    <thead class="bg-[#3E3E3E] text-[10px]">
                        <tr class="divide-x divide-#EAEAEA">
                            <th scope="col"
                                class="pl-5 py-2 whitespace-nowrap uppercase tracking-wider text-left font-bold text-#FFFFFF">
                                Entries
                            </th>
                            <th scope="col"
                                class="px-2 py-2 w-[15%] uppercase tracking-wider text-center font-semibold text-#FFFFFF">
                                Debit
                            </th>
                            <th scope="col"
                                class="px-2 py-2 w-[15%] uppercase whitespace-nowrap tracking-wider text-center font-semibold text-#FFFFFF">
                                Credit
                            </th>
                            <th scope="col"
                                class="px-2 py-2 w-[40%] uppercase tracking-wider text-center font-semibold text-#FFFFFF">
                                Remarks
                            </th>

                        </tr>
                    </thead>
                    <tbody class=" bg-white text-[10px]">
                        <tr class="divide-x divide-gray-200 border-b border-b-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                <SettingsInput placeholder="-"
                                    class="w-full uppercase" :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                <SettingsInput placeholder="-"
                                    class="w-full uppercase" :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                <SettingsInput placeholder="-"
                                    class="w-full uppercase" :isDisabled="true"/>
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                <SettingsInput placeholder="-"
                                    class="w-full uppercase" :isDisabled="true"/>
                            </td>

                        </tr>
                    </tbody>
                    <div class="flex gap-3 w-full mb-2 mt-1 mx-2">
                        <BorderButton :buttonLabel="'Add New Line'" :buttonPadding="'p-0'" />
                        <BorderButton :buttonLabel="'Clear All'" :buttonPadding="'p-0'" :buttonStyle="'border-2 border-#EE3E2C text-[#EE3E2C] text-[11px]'" :buttonHover="'hover:bg-[#EE3E2C]'"/>
                    </div>
                    <tfoot class=" bg-#D7D7D7 text-[10px]">
                        <tr class=" text-left">
                            <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider font-bold text-right text-#3E3E3E">
                              total
                            </td>
                            <td type="number" class="whitespace-nowrap uppercase py-2 px-2 font-bold tracking-wider text-#3E3E3E">
                                100
                            </td>
                            <td type="number" class="whitespace-nowrap uppercase py-2 px-2 font-bold tracking-wider text-#3E3E3E">
                                100
                            </td>
                            <td type="none" class="whitespace-nowrap uppercase py-2 px-2 font-bold tracking-wider text-#3E3E3E">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="flex justify-center gap-5 items-center w-full h-auto mt-5">
                <!-- default isDisabled set to false -->
                <SolidButton :buttonLabel="'Cancel'"/>
                <SolidButton :buttonLabel="'Submit'" :buttonStyle="'bg-[#FB9E30]'" @click="(viewToastOpen = !viewToastOpen)"/>
            </div>
        </div>
    </div>
    <Toast :show="viewToastOpen" @close="viewToastToggle()" :toastBody="''"/>
</template>
