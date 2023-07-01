<template>
    <!-- OJT -->
    <div class="relative flex flex-col font-light w-full h-auto whitespace-nowrap text-[10px]">
        <label for="name" class="absolute -top-[8px] left-[10px] uppercase inline-flex items-center h-auto bg-white first-letter:z-9"  :class="[labelWidth, labelTextSize]">
            {{ inputLabel }}
            <span v-show="isRequired" :class="labelTextSize" class="ml-1 text-red-500">*</span>
        </label>
        <input :type="inputType" class="disabled:bg-gray-300 bg-white uppercase h-7 p-1 z-8 border border-gray-300 text-[#3E3E3E] pl-2 text-left " :class="inputWidth" :value="inputValue" :disabled="isDisabled" :required="isRequired" :placeholder="placeholder">
    </div>
</template>

<script>
export default{
  props: {
    inputLabel:{
        type: String,
        default: ''
    },
    labelTextSize:{
        type: String,
        default: 'text-[10px]',
    },
    labelWidth:{
        type: String,
        default: 'w-0/12',

    },
    inputWidth:{
        type: String,
        default: 'w-full',

    },
    inputColor:{
        type: String,
        default: 'bg-white'
    },
    inputType:{
        type: String,
        default: 'text',
    },
    inputValue:{
        type: String,
        default: '',
    },
    isRequired:{
        type: Boolean,
        default: false
    },
    isDisabled:{
        type: Boolean,
        default: false
    },
    placeholder:{
        type: String,
        default: ''
    }
  },
}
</script>
