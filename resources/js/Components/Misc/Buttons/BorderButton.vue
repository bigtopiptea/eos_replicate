<template>
    <div>
        <button class="text-[11px] font-medium uppercase" :class="[buttonStyle, buttonSize]">{{ buttonLabel}}</button>
    </div>
</template>

<script>
export default{
    props:{
        buttonLabel:{
            type: String,
            default: 'Button'
        },
        buttonStyle:{
            type: String,
            default: 'border-2 border-#F9951E text-#F9951E'
        },
        buttonSize:{
            type: String,
            default: 'h-[34px] w-[120px]'
        }
    }
}
</script>