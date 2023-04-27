<!-- OJT -->
<script>
import ToastContent from './ToastContent.vue';

export default{
    components:{
        ToastContent,
    }
}
</script>


<template>
    <div class="fixed top-[80px] right-4 z-11 space-y-2 w-auto min-w-auto mr-3">
        <ToastContent :toastBody="'Adjustment Entry Successfully Submitted!'"/>
    </div>
</template>
