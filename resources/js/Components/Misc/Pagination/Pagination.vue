<template>
    <div class="flex items-center justify-between px-10">
        <div class="flex flex-1 justify-between sm:hidden">
            <a
                href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Previous</a
            >
            <a
                href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Next</a
            >
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between ">
            <div class="mt-1 flex text-[10px] items-center">
                Show
                <v-select
                    v-model="perPageOptions.value"
                    selected="active"
                    class="uppercase border border-gray-300 shadow-sm ml-5 mr-5"
                    :options="perPageOptions"
                    @option:selected="perPageValue()"
                >
                </v-select>
                Entries
            </div>
            <div>
                <p class="text-[10px] text-gray-700">
                    Showing
                    <!-- {{ " " }}
                    <span class="font-medium">1</span>
                    {{ " " }}
                    to
                    {{ " " }} -->
                    <span class="font-medium">{{
                        totalResults(pagination)
                    }}</span>
                    {{ " " }}
                    of
                    {{ " " }}
                    <span class="font-medium">{{ pagination.total }}</span>
                    {{ " " }}
                    results
                </p>
            </div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm " aria-label="Pagination" >
                <!-- <a @click.prevent="changePage(1)"  class="relative hover:cursor-pointer inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium uppercase text-gray-500 hover:bg-gray-50 focus:z-20 text-[10px]">
                    <span class="sr-only">First Page</span>
                    <DoubleChevronLeft class="h-4" />
                </a> -->

                <a @click.prevent="changePage(pagination.current_page - 1)"  class="relative hover:cursor-pointer inline-flex items-center border border-gray-300 bg-[#E1E1E1] px-2 py-2 text-sm font-medium uppercase text-[#000000] hover:bg-gray-50 focus:z-20 text-[10px]  ">
                    <span class="sr-only">Prev</span>
                    <DoubleChevronLeft class="h-4" />
                    <!-- <ChevLeftIcon class="h-4" /> -->
                    Prev
                </a>
                <a v-for="page in pages" :key="page" @click.prevent="changePage(page)" :class="isCurrentPage(page) ? 'active border border-blue-500 text-blue-500' : ''"
                    class="relative hover:cursor-pointer inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-[#000000] hover:bg-gray-50 focus:z-20 text-[10px]">
                    {{ page }}
                </a>
                <a @click.prevent="changePage(pagination.current_page + 1)"
                    class="relative uppercase font-rubik-light hover:cursor-pointer inline-flex items-center border border-gray-300 bg-[#E1E1E1] px-2 py-2 text-sm font-medium text-[#000000] hover:bg-gray-50 focus:z-20 text-[10px]">
                    <span class="sr-only">Next</span>
                    Next
                    <!-- <ChevRightIcon class="h-4" /> -->
                    <DoubleChevronRight class="h-4" />
                </a>

                <!-- <a :class=" pagination.current_page <= 1 ? '' : 'text-red-500'" @click.prevent="changePage(pagination.last_page)"  class="relative hover:cursor-pointer inline-flex items-center border border-gray-300 bg-white px-2 py-2 text-sm font-medium uppercase text-gray-500 hover:bg-gray-50 focus:z-20 text-[10px]">
                    <span class="sr-only">Last Page</span>
                    <DoubleChevronRight class="h-4" />
                </a> -->
            </nav>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
// import ChevLeftIcon from "../Icons/ChevLeftIcon.vue";
// import ChevRightIcon from "../Icons/ChevRightIcon.vue";
import DoubleChevronLeft from "@/Components/Misc/Icons/DoubleChevronLeft.vue";
import DoubleChevronRight from "@/Components/Misc/Icons/DoubleChevronRight.vue";
export default defineComponent({
    components: {
        DoubleChevronRight,
        DoubleChevronLeft,
        // ChevLeftIcon,
        // ChevRightIcon,
    },
    props: ["pagination", "offset"],
    data() {
        return {
            per_page: 2,
            perPageOptions: [
                { value: 1, label: "1" },
                { value: 2, label: "2" },
                { value: 3, label: "3" },
                { value: 5, label: "5" },
                { value: 10, label: "10" },
                { value: 15, label: "15" },
                { value: 20, label: "20" },
                { value: 25, label: "25" },
                { value: 50, label: "50" },
            ],
        };
    },
    computed: {
        pages() {
            let pages = [];
            let from =
                this.pagination.current_page - Math.floor(this.offset / 2);
            if (from < 1) {
                from = 1;
            }
            let to = from + this.offset - 1;
            if (to > this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            while (from <= to) {
                pages.push(from);
                from++;
            }

            return pages;
        },
    },
    methods: {
        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.$emit("paginate");
        },
        perPageValue() {
            this.$emit("numberOfPage", this.perPageOptions.value);
        },
        totalResults(pagination) {
            return pagination.current_page * pagination.per_page >
                pagination.total
                ? pagination.total
                : pagination.current_page * pagination.per_page;
        },
    },
});
</script>
