<!-- OJT -->
<script>

export default{

    props:{
        buttonLabel:{
            type: String,
            default: 'Label'
        },
        buttonStyle:{
            type: String,
            default: 'bg-[#3E3E3E]'
        },
        isDisabled:{
            type: Boolean,
            default: false
        },
        buttonSize:{
            type: String,
            default: 'h-auto w-[120px]'
        },
        buttonTextSize:{
            type: String,
            default: 'text-[11px]'
        }

    },



}
</script>
<template>
    <button class="text-center uppercase py-3 disabled:bg-[#D7D7D7] text-white font-sans font-normal text-[11px]" :class="[buttonStyle, buttonSize, buttonTextSize]" :disabled="isDisabled">{{ buttonLabel }}</button>
</template>
