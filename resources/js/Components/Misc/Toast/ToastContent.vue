<script>
import XmarkIcon from '../Icons/XmarkIcon.vue'

export default{
    components:{
        XmarkIcon,
    },

    props:{
        toastBody:{
            type:String,
            required: true
        }
    }
}</script>
<template>
        <div class="whitespace-nowrap flex items-center py-4 w-full text-gray-500 bg-white shadow-md uppercase">

            <div class=" mx-3 py-1  text-[10px] font-normal">{{ toastBody }}</div>
            <button on-click="" class="absolute top-1 right-1">
                <XmarkIcon/>
            </button>
        </div>
</template>
