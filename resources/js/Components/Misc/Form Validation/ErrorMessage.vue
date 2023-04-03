<script>
export default {
    name: 'Error Message',
    props: {
        error: {
            type: String,
            default: '',
        }
    }
}
</script>
<template>
    <span class="text-mid-red uppercase text-[10px] absolute" >
        {{error}}
    </span>
</template>
