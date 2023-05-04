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
        },
        buttonPadding:{
            type: String,
            default: 'py-3'
        },
        buttonFont:{
            type: String,
            default: 'font-normal'
        },

    },



}
</script>
<template>
    <button class="tracking-widest text-center uppercase disabled:bg-[#D7D7D7] text-white text-[11px]" :class="[buttonStyle, buttonSize, buttonTextSize,buttonPadding,buttonFont]" :disabled="isDisabled">{{ buttonLabel }}</button>
</template>
