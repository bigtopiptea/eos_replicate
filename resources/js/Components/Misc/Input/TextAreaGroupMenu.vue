<template>
    <!-- OJT -->
    <div class="relative">
        <div class="relative flex items-center font-light text-[10px] w-full whitespace-nowrap" :class="inputHeight">
            <label for="name" class="uppercase inline-flex items-start h-full  px-2 py-3 text-left border border-[#EAEAEA]"  :class="labelWidth">
                {{ inputLabel }}
                <span v-show="isRequired" class="ml-1 text-red-500">*</span>
            </label>
            <textarea  class="focus:outline-none disabled:bg-[#EAEAEA] bg-white resize-none block p-2.5 text-[10px] text-gray-900 border border-gray-300 h-full pr-[20px]" :class="inputWidth"  :disabled="isDisabled" :placeholder="placeholder" :required="isRequired"></textarea>
        <div @click="(isToggle = !isToggle)" class="absolute top-[5px] right-[5px] cursor-pointer rounded-full hover:bg-gray-200">
                <EllipsisVertical class="h-5 w-5"/>
            </div>
        </div>

        <div v-if="isToggle == true" class="absolute top-[5px] right-[25px] z-50 shadow-lg bg-white">
            <ul v-for="option in options" :key="option.label">
                <li @click="handleOptionClick(option.label)" class="py-1 px-2 hover:bg-gray-200 list-none text-[9px] uppercase cursor-pointer border-b" :class="selected == option.label ? 'bg-gray-200' : ''">
                    {{ option.label }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import EllipsisVertical from '@/Components/Misc/Icons/EllipsisVertical.vue'
export default{
  components:{
    EllipsisVertical
  },
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
    placeholder:{
        type: String,
        default: '',
    },
    isDisabled:{
        type: Boolean,
        default: false
    },
    isRequired:{
        type: Boolean,
        default: false
    },
    options:{
        type: Array,
    },
  },
  data(){
    return{
        isToggle: false,
        selected: '',
    }
  },
  methods: {
    handleOptionClick(label) {
      this.selected = label;
      this.isToggle = false;
      this.emitOptionSelected(label);
    },
    emitOptionSelected(label) {
      this.$emit('option-selected', label);
    }
  }

}
</script>
