<template>
    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div class=" bg-#194E72 h-2.5 rounded-full w-1/2"></div>
    </div>
</template>

<script>
export default{
    props: {
      progressWidth: {
        type: String,
        default: "w-1/3",
      },
    },
    
}
</script>