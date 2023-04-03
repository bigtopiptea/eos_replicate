<template>
    <div class="relative">
        <ul class="flex justify-center font-medium text-center text-gray-500 border-gray-200">
            <li v-for="tab in tabs" :key="tab" class="mr-1">
                <router-link @click="setTab(tab)"
                             to="" href="#" aria-current="page"
                             :class="tab === selected ?
                             'inline-block  px-14 py-1 duration-300 my-1 uppercase bg-[#F9951E] border border-[#eaeaea] shadow-sm hover:text-white  shadow-md'
                             :'inline-block px-14 py-1 duration-300 my-1 uppercase bg-[#C6C6C6] hover:bg-[#F9951E] border shadow-sm hover:text-white shadow-md'">
                </router-link>
<!--                :class="{'bg-[#F9951E] text-white ' : tab === selected }"-->
            </li>
        </ul>
    </div>
    <slot></slot>
</template>
<script>
export default {
    name: 'TabNav',
    props: {
        tabs: {
            type: Array,
            required: true,
        },
        selected: {
            type: String,
            required: true,
        }
    },
    methods: {
        setTab(tab) {
            this.$emit('selected', tab);
        }
    }
}
</script>
