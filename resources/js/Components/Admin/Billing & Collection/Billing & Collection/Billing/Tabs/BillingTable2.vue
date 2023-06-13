<script>
export default {
    props:{
        labels:{
            type:Array,
            default:[],
        }

    }
}
</script>

<template>
     <table class="min-w-full border border-[#EDEDED] w-full">
        <thead class="bg-[#EDEDED] divide-y divide-gray-200 font-medium text-[11px] w-full whitespace-nowrap sticky top-0">
            <tr class="divide-x divide-[#EDEDED] ">
                <th v-for="label in labels" :key="label.label" scope="col" class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                    {{  label.label }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
            <tr class="divide-x divide-gray-200">
                <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider text-cyan-500 cursor-pointer">
                    SOAOOOOOOOO91
                </td>
                <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                    SEPTEMBER
                </td>
                <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                    2022
                </td>
                <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                    redha al ansari exchange
                </td>
                <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider text-cyan-500 cursor-pointer">
                    <div class="w-full flex justify-center">
                        <div class="flex justify-center items-center w-fit">
                            <DownloadIcon/>
                            <p>Download</p>
                        </div>
                    </div>
                </td>
                <td class=" whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider text-cyan-500 cursor-pointer">
                    <div class="w-full flex justify-center">
                        <div class="flex justify-center items-center w-fit">
                            <ChevRightIcon/>
                            <p>Send Email</p>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
``
