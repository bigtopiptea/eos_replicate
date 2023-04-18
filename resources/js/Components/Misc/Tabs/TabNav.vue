<template>
    <div class="relative">
        <div class="flex whitespace-nowrap font-medium text-center text-gray-500 border-gray-200">
            <div v-for="tab in tabs" :key="tab" class="mr-1">
                <router-link @click="setTab(tab)"
                             to="" href="#" aria-current="page"
                             :class="[tabLength,setHover, [selected === tab ? setSelectedBg : '']]"
                             class="inline-block py-2 border border-gray-200 duration-300 my-1 uppercase
                              hover:text-white text-[11px] shadow-md tracking-widest font-rubik-light "
                             >
                            <!-- <div class=" text-lg">
                            {{tab.value}}
                            </div> -->
                            <div>
                             {{ tab }}
                            </div>

                </router-link>
            </div>

        </div>
        <div class="border-4 absolute -bottom-[0.16rem] w-full"
            :class="setBorder">
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
        },
        setBorder: {
            type: String,
            default: 'border-[#F9951E]'
        },
        setHover: {
            type: String,
            default: 'hover:bg-[#F9951E] '
        },
        setSelectedBg: {
            type: String,
            default: 'bg-[#F9951E] text-white'
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
