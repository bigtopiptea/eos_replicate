<template>
  <div class="relative">
    <p class="absolute -top-[8px] left-[10px] uppercase bg-white z-10 text-[10px]">
      {{ label }}
      <span v-if="isRequired == true" class="ml-1 text-red-500">*</span>
    </p>
    <button
      @click="isOpen = !isOpen"
      type="button"
      class="relative w-full h-7 py-2 pl-3 pr-10 text-left bg-white border border-[#EAEAEA] shadow-sm cursor-default text-[10px]"
    >
      <span class="flex items-center h-full">
        <span class="flex-grow uppercase whitespace-nowrap overflow-x-auto">
          {{ selectedOptionsLabel || placeholder }}
        </span>
        <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <ChevronDownIcon class="h-5 w-5 text-gray-400"/>
        </span>
       
      </span>
    </button>
    <div
      v-show="isOpen"
      class="absolute z-[5] w-full mt-[px] bg-white shadow-lg max-h-56 rounded-md overflow-y-auto focus:outline-none transition-all"
    >
      <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
        <label v-for="option in options" :key="option.id" class="flex items-center px-4 py-2 border-b">
          <input
            type="checkbox"
            :value="option.name"
            v-model="selectedOptions"
            :checked="isSelected(option)"
            @change="selectAllHandler(option)"
            class="mr-2 form-checkbox text-blue-500"
          />
          <span class="text-[10px] uppercase">{{ option.name }}</span>
        </label>
      </div>
    </div>
  </div>
</template>

<script>
import ChevronDownIcon from '../Icons/ChevronDownIcon.vue';
export default {
  components:{
    ChevronDownIcon
  },
  props: {
    label:{
      type: String,
      default: 'LABEL',
    },
    options: {
      type: Array,
      default: []
    },
    placeholder: {
      type: String,
      default: 'Select options'
    },
    isRequired:{
        type: Boolean,
        default: false
    },
  },
  data() {
    return {
      isOpen: false,
      selectedOptions: []
    };
  },
  computed: {
    selectAll() {
      return (
        this.selectedOptions.length > 0 &&
        this.selectedOptions.length === this.options.length - 1
      );
    },
    selectedOptionsLabel() {
      if (this.selectedOptions.length === this.options.length - 1) {
        return 'All options';
      } else if (this.selectedOptions.length > 0) {
        return this.selectedOptions.map(option => option.name).join(', ');
      } else {
        return '';
      }
    }
  },
  methods: {
    isSelected(option) {
      return this.selectedOptions.includes(option);
    },
    selectAllHandler(option) {
      if (option.id === 0) {
        if (this.selectAll) {
          this.selectedOptions = [];
        } else {
          this.selectedOptions = this.options.slice();
        }
      } else {
        const index = this.selectedOptions.findIndex(item => item.id === 0);
        if (index !== -1) {
          this.selectedOptions.splice(index, 1);
        }
      }
    }
  }
};
</script>
