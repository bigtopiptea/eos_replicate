<template>
    <!-- OJT -->
    <div class="relative flex flex-col font-light w-full h-auto whitespace-nowrap">
        <label for="name" class="absolute -top-[8px] left-[10px] uppercase inline-flex items-center h-auto  bg-white z-9"  :class="[labelWidth, labelTextSize]">
            {{ inputLabel }}
            <span v-show="isRequired" :class="labelTextSize" class="ml-1 text-red-500">*</span>
        </label>
        <select class="uppercase h-7 p-1 focus:z-9  text-[#3E3E3E] text-left text-[10px] border border-grey-200 focus:border-collapse" :class=[inputWidth,inputColor] >

            <option v-for="(option,index) in options" :key="index" value=index class="z-10 bg-white">
                {{option}}</option>
        </select>
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
    isRequired:{
        type: Boolean,
        default: false
    }, 
    isRequired:{
        type: Boolean,
        default: false
    }, 
    options: {
        type: Array,
        required: true
    }
  },
}
</script>
