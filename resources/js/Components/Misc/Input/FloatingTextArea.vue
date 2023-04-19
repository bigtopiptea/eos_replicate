<template>
<div class="flex flex-col relative text-xs w-full  mb-5 border border-red-500">
    <label for="Remarks" class="absolute mx-2 text-left text-[10px] px-1 uppercase -top-[7px] bg-white">{{ label }}</label>
    <textarea rows="4" class="resize-none block p-2.5  text-[10px] text-gray-900 bg-white border border-gray-300" :class="[inputHeight,inputWidth]"/>

</div>
</template>

<script>

export default{
    props:{
        label:{
            type: String,
            default: 'Label'
        },
        inputWidth:{
            type: String,
            default:'w-full'
        },
        inputHeight:{
            type: String,
            default:'h-24'
        },
    }
}
</script>
