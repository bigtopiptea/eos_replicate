<template>
    <div v-show="!isOpen">
        <h1>Hello</h1>
        <button @click="isOpen == !isOpen">Close</button>
    </div>
</template>
<script>
export default{    

  props: {
    isOpen:{
        type: Boolean,
        default: false
    }
  },
}
</script>