<template>
    <div>
        <button class="font-medium uppercase" :class="[buttonStyle, buttonSize]">{{ buttonLabel}}</button>
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
        buttonSize:{
            type: String,
            default: 'h-[34px] w-[120px]'
        }
    }
}
</script>
