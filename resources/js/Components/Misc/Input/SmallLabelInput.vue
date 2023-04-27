<template>
    <!-- OJT -->
    <div class="flex flex-col font-light w-full h-auto mb-4 whitespace-nowrap text-[10px]">
        <label for="name" class="uppercase inline-flex items-center h-auto px-2"  :class="[labelWidth,labelTextSize]">
            {{ inputLabel }}
            <span v-show="isRequired" :class="labelTextSize" class="ml-1 text-red-500">*</span>
        </label>
        <input :type="inputType" class="uppercase h-7 p-1 focus:z-10 border border-gray-300 text-[#3E3E3E] text-left  focus:border-collapse" :class="[inputColor,inputWidth]" :disabled="isDisabled">
    </div>
</template>

<script>
export default{
  props: {
    inputLabel:{
        type: String,
        default: 'Label'
    },
    labelTextSize:{
        type: String,
        default: 'text-[10px]',
    },
    labelWidth:{
        type: String,
        default: '7/12',
        required: true
    },
    inputWidth:{
        type: String,
        default: '5/12',
        required: true
    },
    inputColor:{
        type: String,
        default: 'bg-[#ECECEC]'
    },
    inputType:{
        type: String,
        default: 'text',
    },
    isRequired:{
        type: Boolean,
        default: false
    },
    isDisabled:{
        type: Boolean,
        default: false
    }
  },
}
</script>
