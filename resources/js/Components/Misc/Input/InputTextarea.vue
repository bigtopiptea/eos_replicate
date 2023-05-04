<!-- OJT - VDq -->
<template>
    <div class="flex flex-col text-xs w-full mb-5">
        <label for="desription" class="w-5/12 px-2 uppercase text-left text-[10px]">{{ label }}</label>
        <textarea rows="4" class="disabled:bg-[#EAEAEA] bg-white resize-none block p-2.5 text-[10px] text-gray-900 border border-gray-300" :class="[inputWidth, inputHeight]" :disabled="isDisabled"></textarea>
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
            default: 'w-full'
        },
        inputHeight:{
            type: String,
            default: 'h-24'
        },
        isDisabled:{
            type: Boolean,
            default: false
        }
    }
}
</script>
