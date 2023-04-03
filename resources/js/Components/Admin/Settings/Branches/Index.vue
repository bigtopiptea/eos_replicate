<script>
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from '@/Components/Misc/Tabs/Tab.vue';
import Branch from "@/Components/Admin/Settings/Branches/Branch.vue";
import Dashboard from "@/Components/Admin/Dashboard/Dashboard.vue";
import CompanyIndex from "@/Components/Admin/Settings/Branches/CompanyIndex.vue";

export default {
    name: 'Company',
    components: {
        CompanyIndex,
        Dashboard,
        Branch,
        TabNav,
        Tab,

    },
    data(){
        return {
           tabs: [
               {name: 'company'},
               {name: 'branch'},
           ],
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
    }
}
</script>
<template>
    <div class="relative">
        <ul class="flex flex-wrap font-medium text-center text-gray-500 border-gray-200">
            <li v-for="tab in tabs" :key="tab" class="mr-1">
                <router-link :to="{name: tab.name}" href="#" aria-current="page"
                             active-class="bg-mid-red text-white"
                             class="inline-block px-4 py-2 border duration-300 my-1 uppercase hover:bg-mid-red hover:text-white text-[10px] shadow-md tracking-widest font-rubik-light">
                    {{ tab.name }}
                </router-link>
            </li>
        </ul>
        <div class="border-4 border-mid-red absolute -bottom-[0.16rem] w-full"></div>
    </div>
    <router-view></router-view>

</template>
