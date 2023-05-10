<template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full h-7 whitespace-nowrap">
        <label for="name" class="uppercase inline-flex items-center h-full  px-2 text-left border border-[#EAEAEA]"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <input :type="inputType" class="uppercase bg-white h-full p-1 focus:z-10 border border-gray-300 text-[#3E3E3E] text-left disabled:bg-[#EAEAEA] focus:border-collapse" :class="inputWidth" :disabled="isDisabled" :maxlength="setMax" :placeholder="placeholder">
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
    setMax:{
        type: Number,
        required: false,
    },
    inputType:{
        type: String,
        default: 'text',
    },
    isDisabled:{
        type: Boolean,
        default: false
    },
    placeholder:{
        type: String,
        required: false
    }
  },
}
</script>
