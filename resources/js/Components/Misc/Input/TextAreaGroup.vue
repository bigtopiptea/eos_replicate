<template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full whitespace-nowrap" :class="inputHeight">
        <label for="name" class="uppercase inline-flex items-center h-full  px-2 text-left border border-[#EAEAEA]"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <textarea  class="disabled:bg-[#EAEAEA] bg-white resize-none block p-2.5 text-[10px] text-gray-900 border border-gray-300 h-full" :class="inputWidth"  :disabled="isDisabled"></textarea>
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
        default: 'w-5/12',

    },
    labelWidth:{
        type: String,
        default: 'w-7/12',
    },
    inputHeight:{
        type: String,
        default: 'h-20',
    },
    isDisabled:{
        type: Boolean,
        default: false
    },
  },
}
</script>
