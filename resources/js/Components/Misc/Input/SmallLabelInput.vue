<template>
    <!-- OJT -->
    <div class="flex flex-col font-light text-[10px] w-full h-auto mb-4 whitespace-nowrap">
        <label for="name" class="uppercase inline-flex items-center h-full px-2"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <input :type="inputType" class="uppercase h-7 p-1 focus:z-10 border border-gray-300 text-[#3E3E3E] text-left  focus:border-collapse" :class="[inputColor,inputWidth]">
    </div>
</template>

<script>
export default{
  props: {
    inputLabel:{
        type: String,
        default: 'Label'
    },
    inputWidth:{
        type: String,
        default: '5/12',
        required: true
    },
    labelWidth:{
        type: String,
        default: '7/12',
        required: true
    },
    inputColor:{
        type: String,
        default: 'bg-[#ECECEC]'
    },
    inputType:{
        type: String,
        default: 'text',
    }
  },
}
</script>
