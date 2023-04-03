<template>
    <div class="rel relative">

        <div v-show="isOpen" @click.away="isOpen = false" class="org origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg z-10">
            <div class="rounded-md bg-white shadow-xs">
                <select  class="py-2 px-4 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <option v-for="option in options" :key="option.value">{{option.text}}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedOption: 'Select an option',
            options: [
                { text: 'Option 1', value: 1 },
                { text: 'Option 2', value: 2 },
                { text: 'Option 3', value: 3 }
            ],
            isOpen: false
        };
    },
    methods: {
        selectOption(value) {
            const selected = this.options.find(option => option.value === value);
            this.selectedOption = selected.text;
            this.isOpen = false;
        }
    }
};
</script>
