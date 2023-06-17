<template>
 <div>
    <div class="relative">
      <p class="absolute -top-[8px] left-[10px] uppercase bg-white z-10 text-[11px]">
        {{ label }}
        <span v-if="isRequired == true" class="ml-1 text-red-500">*</span>
      </p>
      <button
        @click="isOpen = !isOpen"
        type="button"
        class="relative w-full h-7 py-2 pl-3 pr-[35px] text-left bg-white border border-gray-300 shadow-sm cursor-default text-[11px]"
      >
        <span class="flex items-center h-full z-5">
          <span class="absolute left-3 right-[35px] uppercase whitespace-nowrap overflow-x-auto">
            {{ selectedOptions.length > 0 ? getSelectedOptionsText() : placeholder }}
          </span>
          <span class="absolute z-10 inset-y-0 right-0 flex items-center pointer-events-none px-2">
              <ChevronDownIcon class="h-5 w-5 text-gray-400"/>
          </span>
        </span>
      </button>
      <div v-show="isOpen" @click.stop class="absolute z-10 w-full bg-white border border-gray-300 shadow-lg max-h-56 overflow-y-auto">
        <div v-for="(parent, parentIndex) in options"  :key="parentIndex">
          <div class="pl-4 pr-2 py-2 border-b">
            <label class="flex items-center">
              <input
                :value="parent.label"
                type="checkbox"
                :checked="isParentChecked(parent)"
                @change="toggleParent(parent)"
                class="form-checkbox h-[14px] w-[14px]"
              />
              <span class="ml-2 text-[11px] font-medium uppercase">{{ parent.label }}</span>
            </label>
            <div v-if="parent.children" class="pl-[10px]">
              <div class="mt-2">
                <label v-for="(child, childIndex) in parent.children" :key="childIndex" class="flex items-center py-2  border-t">
                  <input
                    :value="child.label"
                    type="checkbox"
                    :checked="selectedOptions.includes(child)"
                    @change="toggleChild(child)"
                    class="form-checkbox h-[14px] w-[14px]"
                  />
                  <span class="ml-2 text-[11px] uppercase whitespe">{{ child.label }}</span>
                </label>
              </div>
            </div>
          </div>
        </div>
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
    selectedValue:{
      type: Array,
    }
  },
  data() {
    return {
      isOpen: false,
      selectedOptions: []
    };
  },
  mounted() {
    // Add event listener to the document
    document.addEventListener('click', this.handleDocumentClick);
  },
  beforeUnmount() {
    // Remove event listener when the component is unmounted
    document.removeEventListener('click', this.handleDocumentClick);
  },


  methods: {

    handleDocumentClick(event) {
      const clickedElement = event.target;

      // Check if the clicked element is outside the component
      const isClickedOutside = !this.$el.contains(clickedElement);

      if (isClickedOutside) {
        this.isOpen = false; // Close the component
      }
    },
    toggleParent(parent) {
      if (this.isParentChecked(parent)) {
        // Uncheck parent and all children
        this.selectedOptions = this.selectedOptions.filter(option => option !== parent);
        this.selectedOptions = this.selectedOptions.filter(option => !parent.children.includes(option));
      } else {
        // Check parent and all children
        this.selectedOptions.push(parent);
        this.selectedOptions = this.selectedOptions.concat(parent.children);
      }
    },
    toggleChild(child) {
    if (this.selectedOptions.includes(child)) {
        // Uncheck child
        this.selectedOptions = this.selectedOptions.filter(option => option !== child);

        // Uncheck parent if not all children are selected
        const parent = this.options.find(parent => parent.children.includes(child));
        if (parent && !parent.children.every(child => this.selectedOptions.includes(child))) {
        this.selectedOptions = this.selectedOptions.filter(option => option !== parent);
        }
    } else {
        // Check child
        this.selectedOptions.push(child);

        // Check parent if all children are selected
        const parent = this.options.find(parent => parent.children.includes(child));
        if (parent && parent.children.every(child => this.selectedOptions.includes(child))) {
        this.selectedOptions.push(parent);
        }
    }
    },
    isParentChecked(parent) {
      return this.selectedOptions.includes(parent) && parent.children.every(child => this.selectedOptions.includes(child));
    },
    getSelectedOptionsText() {
      const parentSelected = this.selectedOptions.filter(option => !this.options.flatMap(parent => parent.children).includes(option));
      if (parentSelected.length > 0) {
        return parentSelected.map(option => option.label).join(' | ');
      } else {
        return this.selectedOptions.map(option => option.label).join(' | ');
      }
    },
  }
};
</script>

<!-- SAMPLE OPTIONS FORMAT

options: [
  {
    name: 'PARENT 1',
    children: [
      { name: 'CHILD 1' },
      { name: 'CHILD 2' },
      { name: 'CHILD 3' }
    ]
  },
  {
    name: 'PARENT 2',
    children: [
      { name: 'CHILD 1' },
      { name: 'CHILD 2' },
      { name: 'CHILD 3' }
    ]
  }
], -->
