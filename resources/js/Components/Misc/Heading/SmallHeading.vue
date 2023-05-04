<template>
    <div class="flex items-center w-full px-4 bg-[#3E3E3E] py-1.5" :class="justify">
        <h1 class="text-white font-bold uppercase text-[11px] tracking-widest ">
            {{ props.label }}
        </h1>
<!--        {{props.isOpen}}-->
        <component @click="emitClick" v-if="props.icon" :class="{'rotate-90' : !props.isOpen}"  class="text-white delay-400 h-4 w-4 cursor-pointer" :is="props.icon"></component>
    </div>

</template>
<script>
export default {
    methods: {
        emitClick(){
            this.$emit('clicked');
        }
    }
}
</script>
<script setup>
const props = defineProps({
    label: {
        type: String,
        default: "",
    },
    icon: {
        type: String
    },
    isOpen: {
        type: Boolean,
    },
    justify: {
        type: String,
        default: 'justify-between'
    }
});
</script>
