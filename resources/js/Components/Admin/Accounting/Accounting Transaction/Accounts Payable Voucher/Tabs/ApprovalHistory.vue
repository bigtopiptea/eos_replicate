<script>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import TextAreaGroup from '@/Components/Misc/Input/TextAreaGroup.vue';
import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
export default {

    name:'AT Pending',

    components:{
        ChevRightIcon,
        DropDown,
        EditIcon,
        NormalButton,
        BorderButton,
        InputGroup,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
        TextAreaGroup,
        InputGroupSelectMenu,
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            ATPending: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'PAYEE'},
                {label:'INVOICE NO.'},
                {label:'ACCOUNTS PAYABLE'},
                {label:'CREATED BY'},
                {label:'STATUS'},
                {label:'APPROVED BY'},
                {label:'DATE APPROVED'},
            ],
            isFiltered: false
        }
    },
    methods: {
        async getATPending() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.ATPending = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {


                })
        },
    },
}
</script>

<template>
    <div class="flex flex-col justify-between h-full w-auto my-5 px-3">
        <div>
            <div class="inline-block min-w-full align-middle ">
                <div class="flex justify-between h-full min-w-full ">
                    <div class="flex justify-start flex-col gap-3">
                        <div class="flex items-end gap-3 left-side-col-1">
                            <div>
                                <DateInput label="Start Date" />
                            </div>
                            <div>
                                <DateInput label="End Date" />
                            </div>
                            <div>
                                <NormalButton @click="isFiltered = !isFiltered" label="Filter"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                            </div>
                        </div>
                    </div>
                    <div class="right-side mt-[5px]">
                        <form class="flex items-start gap-3">
                            <div class="flex">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] font-light block w-full pl-10 p-2.5"
                                    placeholder="Search" required />
                                </div>
                                <NormalButton label="Go"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                            </div>
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E]   tracking-wider text-[10px] font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>
            <div v-if="isFiltered" class="mt-[30px]">
                <div class="min-w-full py-2 align-middle ">
                    <div class="relative h-[360px]">
                        <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="flex items-center gap-[10px] py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                            <input type="checkbox">
                                            apv no.
                                        </th>
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                            <input type="checkbox">
                                            <p class="text-black">    
                                                001
                                            </p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            09/28/2022 10:55:09 aM
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            metrobank
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            inv000001
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            9,955.36
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            sabado, christian peralta
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            for verification
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            asis, ginalyn ibarra
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            09/29/2022 10:55:09 aM
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Pagination @paginate="getATPending()" :pagination="pagination"
                    :offset="1" class = "py-10"/>
            </div>
            <div v-else class="flex flex-col items-center justify-center py-20">
                <img src="../../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
                <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
            </div>
        </div>
    </div>

</template>