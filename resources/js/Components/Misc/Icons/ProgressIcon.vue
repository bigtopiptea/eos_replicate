<template>
    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 " :class="progressHeight">
        <div class="bg-#194E72 h-full rounded-full w-1/4"></div>
    </div>
</template>

<script>
export default{
    props: {
      progressWidth: {
        type: String,
        default: "w-1/3",
      },
      progressHeight: {
        type: String,
        default: 'h-2.5'
      }
    },
    
}
</script>