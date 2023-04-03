<template lang="">
    <div class="mb-3">
        <label :for="name" class="block text-sm font-normal text-gray-700 font-rubik">{{label}}</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input :type="type" :name="name" :id="name" :value="modelValue" @input="updateValue" :placeholder="placeholder"
            class="block w-full rounded-md pr-10 px-2 py-2 focus:outline-none border font-normal"
            :class="[isInvalid ? 'border-red-300 text-red-900  placeholder-red-300 focus:border-red-500 focus:ring-red-500' : 'border-gray-300 text-gray-900 focus:border-gray-500']">
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <!-- Heroicon name: mini/exclamation-circle -->
            <svg v-show="isInvalid" class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        name:"InputWithLabel",
        props:{
            value: {
                type: [String, Number],
            },
            label:{
                type:String,
                default:'Input Label'
            },
            type:{
                type:String,
                default: 'text'
            },
            name:{
                type:String,
                default: 'input'
            },
            isInvalid:{
                type:Boolean,
                default: false
            },
            placeholder: {
                type: String,
                default: '',
            },
        },
        emits:["update:value"],
        methods: {
            updateValue(event) {
            return this.$emit("update:value", this.$props.type == 'text' ? event.target.value.toUpperCase() : event.target.value);
            },
        },
    }

</script>

