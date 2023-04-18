<template>
    <div class="flex items-center text-xs w-full h-7 mb-2">
        <label for="name" class="inline-flex items-center h-full px-2 text-left border-2 border-[#EAEAEA]"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <input type="text" class="h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center" :class="inputWidth">
    </div>
</template>

<script>
export default{
  props: {
    inputLabel:{
        type: String,
        default: ''
    },
    inputWidth:{
        type: String,
        default: 'w-7/12'
    },
    labelWidth:{
        type: String,
        default: 'w-5/12'
    }
  },
}
</script>