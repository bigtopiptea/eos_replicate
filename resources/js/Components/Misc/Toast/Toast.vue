<!-- OJT -->
<script>
import ToastContent from './ToastContent.vue';
import XmarkIcon from '../Icons/XmarkIcon.vue'

export default{
    components:{
        ToastContent,
        XmarkIcon,
    },

    data() {
        return {
            isClosed: false
        }
    },

    methods:{

        close(){
            isShow = false;
        },

    },

    props:{
        toastBody:{
            type:String,
            default:'Fill',
        },
        isShow:{
            type:Boolean,
            default:false,
        }
    }
}
</script>


<template>
    <div :hidden="isShow" class="fixed top-[80px] right-4 z-11 space-y-2 w-auto min-w-auto mr-3">
        <div class="whitespace-nowrap flex items-center py-4 w-full text-gray-500 bg-white shadow-md uppercase">
            <div class=" mx-3 py-1  text-[10px] font-normal">{{ toastBody }}</div>
            <button @click="(isShow = !isShow),isClosed = true" class="absolute top-1 right-1">
                <XmarkIcon/>
            </button>
        </div>
    </div>
</template>
