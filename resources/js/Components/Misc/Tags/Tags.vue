<template>
    <button class="flex items-center gap-[8px] rounded-md p-[6px] text-[9px] text-white w-auto" :class="bgColor">
        {{ label }} 
        <div v-if="withButton == true" class=" cursor-pointer">
            X
        </div>
    </button>
</template>
<script>
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
export default{
    components:{
        XMarkIcon
    },  
    props:{
        label:{
            type:String,
            default: ''
        },
        bgColor:{
            type:String,
            default: 'bg-[#f9951e]'
        },
        withButton:{
            type:Boolean,
            default: false
        }
    }
}
</script>