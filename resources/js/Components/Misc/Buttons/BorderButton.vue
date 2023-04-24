<!-- OJT -->
<template>
    <div>
        <button class="text-[11px] p-2 font-medium uppercase whitespace-nowrap" :class="[buttonStyle, buttonSize]">{{ buttonLabel}}</button>
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
            default: 'h-auto w-[120px]'
        }
    }
}
</script>
