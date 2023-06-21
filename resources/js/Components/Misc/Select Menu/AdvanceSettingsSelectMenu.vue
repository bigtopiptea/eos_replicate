<template>
  <div class="relative">
    <button
      @click="isOpen = !isOpen"
      class="flex items-center justify-center gap-[10px] bg-[#3E3E3E] text-white py-[7px] px-2 rounded-none focus:outline-none w-full"
    >
      <FilterIcon class="h-5 w-5 text-white" />
      <span class="mr-2 text-[12px] uppercase">Advanced Settings</span>
    </button>
    <div v-show="isOpen" class="absolute top-0 left-0 mt-[38px] w-full max-h-[200px] overflow-y-auto bg-white shadow-lg border z-[50]">
      <div class="py-1">
        <label class="flex items-center p-2 text-[11px] uppercase border-b">
          <input
            type="checkbox"
            v-model="selectAll"
            @change="toggleAllOptions"
            class="mr-2 text-white"
          />
          All
        </label>
        <label v-for="(option, index) in options" :key="index" class="flex items-center p-2 uppercase text-[11px] border-b">
          <input
            type="checkbox"
            v-model="option.checked"
            @change="toggleOption"
            class="mr-2 text-white"
          />
          {{ option.label }}
        </label>
      </div>
    </div>
  </div>
</template>

<script>
import FilterIcon from '../Icons/FilterIcon.vue'

export default {
  components: {
    FilterIcon,
  },
  props:{
    options:{
      type: Array,
      required: true,
    }
  },
  data() {
    return {
      isOpen: false,
      selectAll: false,
    };
  },
  methods: {
    toggleAllOptions() {
      const checked = this.selectAll;
      this.options.forEach((option) => {
        option.checked = checked;
      });
    },
    toggleOption() {
      const allChecked = this.options.every((option) => option.checked);
      this.selectAll = allChecked;
    },
  },
};
</script>

