<template>

    <router-view></router-view>

    <div class="relative">
        <ul class="flex justify-center font-medium text-center text-gray-500 border-gray-200">
            <li v-for="tab in branchTab" :key="tab" class="mr-1">
                <router-link
                    active-class="inline-block  px-14 py-1 duration-300 my-1 uppercase bg-[#F9951E] border border-[#eaeaea] shadow-sm hover:text-white shadow-md"
                    class="inline-block px-14 py-1 duration-300 my-1 uppercase bg-[#C6C6C6] hover:bg-[#F9951E] border shadow-sm hover:text-white shadow-md" :to="{name: tab.name}"  aria-current="page">
                </router-link>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data(){
        return {
            branchTab: [
                {name: 'branch'},
                {name: 'create-branch'},
            ],
        }
    }
}
</script>
