<template>
    <div class="relative pt-[20px] shadow-gray-300 shadow-md">
        <div class="flex whitespace-nowrap font-medium text-center text-[#6E6E6E] ">
            <div v-for="tab in tabs" :key="tab" class="mr-1">
                <router-link @click="setTab(tab)"
                             to="" href="#" aria-current="page"
                             :class="[tabLength,setHover, [selected === tab ? setSelectedBg : ''] , [selected !== tab ? 'bg-[#EAEAEA]' : '']  ]"
                             class="inline-block py-2 border duration-300 my-1 uppercase
                              hover:text-white text-[11px]  shadow-md tracking-widest font-rubik-light rounded-t-lg"
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
        <div class="border-4 absolute -bottom-[0.16rem] w-full "
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
            default: 'hover:bg-[#F9951E] hover:border-[#F9951E] '
        },
        setSelectedBg: {
            type: String,
            default: 'bg-[#F9951E] text-white border border-[#F9951E]'
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
