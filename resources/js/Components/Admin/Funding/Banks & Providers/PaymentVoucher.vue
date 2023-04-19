<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue"
export default{
    components:{
        InputGroup, InputTextarea
    }
}
</script>
<template>
    <div class="3xl:container w-full h-auto bg-white py-4 px-5">
        <div class="w-[90%]">
            <!-- Row 1 -->
            <div class="flex justify-start gap-[195px]">
                <div>
                    <InputGroup :inputLabel="'reference no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                </div>
                <div class="flex gap-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" checked>
                        <span class="text-[10px] whitespace-nowrap">LOAD FROM PURCHASE ORDER </span>
                    </div>
                    <input type="text" class="h-7 w-40 bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                </div>
            </div>
            <!-- Row 2 -->
            <div class="">
                <div class="flex gap-2">
                    <div class="w-[50.5%]">
                        <InputGroup :inputLabel="'PAYEE'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
                    </div>
                    <div  class="w-[25%]">
                        <InputGroup :inputLabel="'INVOICE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                    </div>
                    <div  class="w-[25%]">
                        <InputGroup :inputLabel="'DUE DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                    </div>
                </div>
                <div class="flex gap-2">
                    <InputGroup :inputLabel="'invoice no.'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
                    <InputGroup :inputLabel="'invoice amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                    <InputGroup :inputLabel="'covered period from'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'"/>
                    <InputGroup :inputLabel="'covered period to'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'"/>
                </div>
            </div>
            <!-- Row 3 -->
            <div class="flex items-center gap-[20px]">
                <div class="w-[50%]">
                    <InputTextarea :label="'PARTICULARS'" inputWidth="w-[99%]"  :inputHeight="'h-[107px]'"/>
                </div>
                <div>
                    <button class="px-8 py-2 text-[10px] border-2 border-#F9951E text-#F9951E font-bold">ATTACHMENTS</button>
                </div>
            </div>
        </div>
        <!-- <InputGroup :inputLabel="'Name'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
        <InputGroup :inputLabel="'Age'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/> -->
    </div>
</template>