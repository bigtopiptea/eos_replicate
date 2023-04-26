<!-- OJT -->
<template>
    <div>
        <button class="font-medium uppercase whitespace-nowrap tracking-wide" :class="[buttonStyle, buttonSize, buttonPadding]">{{ buttonLabel}}</button>
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
        buttonStyle:{
            type: String,
            default: 'border-2 border-#F9951E text-#F9951E text-[11px]'
        },
        buttonPadding:{
            type: String,
            default: 'px-2 py-3'
        },
        buttonSize:{
            type: String,
            default: 'h-auto w-[120px]'
        }
    }
}
</script>
