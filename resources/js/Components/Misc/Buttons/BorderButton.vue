<template>
    <div>
        <!-- buttonLabel.length < 6 ? 'px-8' : 'px-6', -->
        <button class="w-[120px]  text-[10px]  font-medium uppercase" :class="[ buttonStyle, buttonSize]">{{ buttonLabel }}</button>
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
        },
    },

}
</script>
