<script>
import NormalBtn from "../../Misc/Buttons/NormalButton.vue";
import SearchIcon from "../../Misc/Icons/SearchIcon.vue";

export default {
    components: {
        NormalBtn,
        SearchIcon,
    },
    data() {
        return { searchBarValue: "" };
    },
    methods: {
        searchValue() {
            this.$emit("filterValue", this.searchBarValue);
        },
    },
};
</script>
<template>
    <form class="flex items-center">
        <div class="relative w-full">
            <div
                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
            >
                <SearchIcon />
            </div>
            <input
                type="text"
                id="simple-search"
                class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                placeholder="Search"
                v-model="searchBarValue"
            />
        </div>
        <NormalBtn
            @click.prevent="searchValue()"
            label="Go"
            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white"
        />
    </form>
</template>
