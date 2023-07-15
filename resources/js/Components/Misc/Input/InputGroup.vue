<template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full h-7 whitespace-nowrap">
        <label for="name" class="uppercase inline-flex items-center h-full  px-2 text-left border border-[#EAEAEA]"  :class="[labelColor,labelWidth,labelTextColor]">
            {{ inputLabel }}
            <span v-show="isRequired" class="ml-1 text-red-500">*</span>
        </label>
        <input :type="inputType" class="bg-white h-full py-1 px-[14px] focus:outline-none border border-[#EAEAEA] disabled:bg-[#EAEAEA]" :class="[inputType == 'number' ? 'text-right' : '',inputWidth, inputPadRight,inputTextAlign]" :disabled="isDisabled" :maxlength="setMax" :placeholder="placeholder" :required="isRequired">
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
        default: 'w-5/12',
    },
    labelWidth:{
        type: String,
        default: 'w-7/12',
    },
    labelTextColor:{
        type: String,
        default: 'text-[#3e3e3e]'
    },
    labelColor:{
        type: String,
        default: ''
    },
    inputTextAlign:{
        type: String,
        default: 'text-left'
    },
    setMax:{
        type: Number,
        required: false,
    },
    inputType:{
        type: String,
        default: 'text',
    },
    inputPadRight:{
        type: String,
        default: ''
    },
    isDisabled:{
        type: Boolean,
        default: false
    },
    isRequired:{
        type: String,
        required: false
    },
    placeholder:{
        type: String,
        required: false
    }
  },
  data() {
    return {
        value:false,
    }
  },
  computed:{
        checkNumber(value){
            if(this.inputType == 'number'){
                return true;
            }
            else{
                return false;
            }
        }
    }
}
</script>
