<template>
    <div class="relative mb-3">
        <input :type="type" :name="name" :id="name" :value="modelValue" @input="updateValue" :placeholder="placeholder" 
        class="block px-2.5 pb-2.5 pt-4 w-full text-md text-gray-900 bg-transparent rounded-lg border border-1 font-normal border-gray-300 
        appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" />

        <label for="floating_outlined" class="absolute font-rubik text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] 
            bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
            peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
            {{ label }}
        </label>
    </div>
</template>

<script>

    export default{
        name:"FloatingInput",
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