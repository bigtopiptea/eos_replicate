<!-- OJT -->
<template>
    <div>
        <button class="disabled:border-#D9D9D9 disabled:text-#D9D9D9  disabled:hover:bg-transparent font-bold uppercase whitespace-nowrap tracking-wide  border-2" :disabled="isDisabled" :class="[buttonBorderColor,buttonTextColor,buttonTextSize, buttonSize, buttonPadding, buttonHover, buttonHoverTextColor]">
            {{ buttonLabel}}</button>
    </div>
</template>

<script>
export default{
  data () {
    return {
    }
  },
    props:{
        buttonLabel:{
            type: String,
            default: 'Button'
        },
        buttonHoverTextColor:{
            type: String,
            default: 'hover:text-white'
        },
        buttonBorderColor:{
            type: String,
            default: 'border-#F9951E'
        },
        buttonTextColor:{
            type: String,
            default: 'text-[#F9951E]'
        },
        buttonTextSize:{
            type: String,
            default: 'text-[11px]'
        },
        buttonHover:{
            type: String,
            default: 'hover:bg-[#F9951E]'
        },
        buttonPadding:{
            type: String,
            default: 'px-2 py-3'
        },
        buttonSize:{
            type: String,
            default: 'h-auto w-[120px]'
        },
        isDisabled:{
            type: Boolean,
            default:false
        }
    }
}
</script>
