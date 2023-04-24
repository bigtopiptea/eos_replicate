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
            default: false,
        }

    },



}
</script>
<template>
    <button class=" uppercase h-auto py-3 disabled:bg-[#D7D7D7] px-10 text-white font-sans font-normal text-[11px]" :class="buttonStyle" :disabled="isDisabled">{{ buttonLabel }}</button>
</template>
