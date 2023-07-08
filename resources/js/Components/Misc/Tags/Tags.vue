<template>
    <button class="flex items-center gap-[8px] rounded-md p-[6px] text-[9px] text-white w-auto" :class="bgColor">
        {{ label }} 
        <div v-if="withButton == true" class="cursor-pointer">
            X
        </div>
    </button>
</template>
<script>

export default{
 
    props:{
        label:{
            type:String,
            default: ''
        },
        bgColor:{
            type:String,
            default: 'bg-[#3e3e3e]'
        },
        withButton:{
            type:Boolean,
            default: false
        }
    }
}
</script>