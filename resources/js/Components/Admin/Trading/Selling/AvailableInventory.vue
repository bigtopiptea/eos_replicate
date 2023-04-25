<script>
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import AddIcon from '@/Components/Misc/Icons/AddIcon.vue'
import ResetIcon from '@/Components/Misc/Icons/ResetIcon.vue'
import SettingsInput from '@/Components/Misc/Input/SettingsInput.vue';
import InputGroup from '../../../Misc/Input/InputGroup.vue';
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
export default{
    components:{
        DropDown,
        NormalButton,
        AddIcon,
        ResetIcon,
        SettingsInput,
        InputGroup,
        BorderButton,


    },

    data(){
        return{
            myOptions:['Currency','Option2','Option3'],

        }
    },

}
</script>
<template>
    <div class="h-auto  mx-8 ">
        <!-- 1st Content -->
        <div class="flex justify-end h-auto w-full">
            <DropDown label="Currency" :options="myOptions"/>
            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px]  p-1.5 text-[10px] text-white px-3 uppercase" />
        </div>
        <!-- 2nd Content -->
        <div>
            <div class="flex justify-center gap-3 mt-3 overflow-y-auto border border-#EAEAEA">
                <div class="w-[40%]  h-[170px]">
                    <table class="divide-y divide-[#EAEAEA] w-full h-auto">
                        <thead class=" bg-[#D7D7D7] font-medium text-[11px] text-center px-3 py-2  whitespace-nowrap">
                            <tr class="divide-x divide-[#EAEAEA]">
                                <th>
                                    USD RATE
                                </th>
                                <th>
                                    Rate
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-x divide-[#EAEAEA] font-light text-[10px] text-center  whitespace-nowrap border border-gray-200">
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>
                            <tr class="divide-x divide-[#EAEAEA] ">
                                <td class="py-2">
                                    200,000
                                </td>
                                <td class="py-2">
                                    200,000
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="w-[60%] h-[170px]">
                    <table class="divide-y divide-[#EAEAEA] w-full h-auto">
                        <thead class=" bg-[#D7D7D7] font-medium text-[11px] text-center px-3 py-2 whitespace-nowrap">
                            <tr class="divide-x divide-[#EAEAEA]">
                                <th>
                                    USD RATE
                                </th>
                                <th>
                                    Rate
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" font-light text-[10px] text-center  px-3 py-2  whitespace-nowrap border border-gray-200 tracking-wider ">
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider ">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="whitespace-nowrap uppercase  px-2   tracking-wider">
                                    <SettingsInput placeholder="-"
                                        class="w-full uppercase " type="number"  />
                                </td>
                                <td class="w-[30%] ">
                                    <div class="flex items-center justify-center gap-3 ">
                                        <div>
                                            <button class="flex items-center">
                                                <AddIcon/>
                                                <Span class="uppercase">Add</Span>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="flex items-center">
                                                <ResetIcon class="mr-1"/>
                                                <Span class="uppercase">Reset</Span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-start mt-3  gap-3">
                <div class="w-[39.4%]">
                    <InputGroup :inputLabel="'Committed Rate'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"/>
                </div>
                <div class="w-[39.4%]">
                    <InputGroup :inputLabel="'Committed Peso Value'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'"/>
                </div>
            </div>
        </div>
        <!-- 3rd Content -->
        <div class="flex justify-center gap-5">
            <BorderButton :buttonLabel="'Reset'" :buttonStyle="'border-2 border-black text-black text-[11px]'" />
            <BorderButton :buttonLabel="'Pass Entry'" :buttonStyle="'border-2 border-[#EE3E2C] text-[#EE3E2C] text-[11px]'"/>
        </div>
    </div>
</template>
