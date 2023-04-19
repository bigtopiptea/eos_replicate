<template>
    <div>
        <button class="px-4 text-[11px] font-bold" :class="[buttonStyle, buttonSize]">{{ buttonLabel}}</button>
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
            default: 'h-[34px]'
        }
    }
}
</script>