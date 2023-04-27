<template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full h-7 mb-4 whitespace-nowrap">
        <label for="name" class="uppercase inline-flex items-center h-full  px-2 text-left border border-[#EAEAEA]"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <input :type="inputType" class="uppercase h-full p-1 focus:z-10 border border-gray-300 text-[#3E3E3E] text-left  focus:border-collapse" :class="[inputColor,inputWidth]" :disabled="isDisabled">
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
        default: 'bg-white'
    },
    inputType:{
        type: String,
        default: 'text',
    },
    isDisabled:{
        type: Boolean,
        default: false
    }
  },
}
</script>
