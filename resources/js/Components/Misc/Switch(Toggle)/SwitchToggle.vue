<template>
    <label for="toggleB" class="flex items-center cursor-pointer">
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input :checked="isChecked" @input="$emit('update:modelValue', $event.target.value)"
                   v-bind="$attrs" :value="status === true ? 1 : 0" type="checkbox" id="toggleB" class="sr-only">
            <!-- line -->
            <div :class="!isChecked ? 'bg-gray-300 block w-8 h-5 rounded-full' : 'block  bg-blue-500 w-8 h-5 rounded-full'"></div>
            <!-- dot -->
            <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition"></div>
        </div>
    </label>
</template>

<script>
export default {
    name: "Switch Toggle",
    data() {
        return {
            currentState: false,
        };
    },
    props: {
        modelValue: {
            type: [String, Number, Boolean],
            default: "",
        },
        status: {
            type: Boolean,
        },
        isChecked: {
            type: Boolean,
        },
    },
};
</script>
<style>
/* Toggle A */
input:checked ~ .dot {
    transform: translateX(100%);
    background-color: white;
}

</style>
