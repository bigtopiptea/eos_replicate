<script>

import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import SearchIcon from '../../Misc/Icons/SearchIcon.vue';

export default{

    components:{
        NormalButton,
        SearchIcon,

    }
}
</script>
<template>
    <div class="h-auto w-full bg-white">
        <div class="px-8 py-3">
            <form class="flex items-start">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <SearchIcon />
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 font-light text-[10px] block w-full pl-10 p-2.5"
                        placeholder="Search" required />
                </div>
                <NormalButton label="Go"
                class="p-1.5 px-3  uppercase h-[34px] bg-[#F9951E] text-[10px]  text-white" />
            </form>
        </div>
    </div>
</template>
