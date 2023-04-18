<template>
    <div class="relative">
        <div class="flex whitespace-nowrap font-medium text-center text-gray-500 border-gray-200">
            <div v-for="tab in tabs" :key="tab" class="mr-1">
                <router-link @click="setTab(tab)"
                             to="" href="#" aria-current="page"
                             :class="[tabLength, {'bg-[#F9951E] text-white' : selected === tab.name}]"
                             class="inline-block py-2 border border-gray-200 duration-300 my-1 uppercase
                             hover:bg-[#F9951E] hover:text-white text-[11px] shadow-md tracking-widest font-rubik-light "
                             >
                            <div class=" text-lg">
                            {{tab.value}}
                            </div>
                            <div>
                            {{tab.name}}
                            </div>

                </router-link>
            </div>

        </div>
        <div class="border-4 border-[#F9951E] absolute -bottom-[0.16rem] w-full">
        </div>
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
    },
    computed: {
        tabLength(){
            return this.tabs.length > 5 ? 'px-4' : 'px-6';
        },
    }
}
</script>
