<template>
    <div class="flex flex-col justify-between h-full w-auto px-5 py-8">
        <div>
            <div class="inline-block min-w-full align-middle ">
                <div class="flex justify-between h-full min-w-full ">
                    <div class="left-side-col-2 space-y-3 text-[10px] mb-4">
                        <DropDown label="bulk action" :options="bulkOptions"/>
                        <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] p-1.5 text-[10px] text-white px-3 uppercase" />
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
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="flex justify-center gap-[5px] items-center py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        <input type="checkbox" name="">
                                        cust. id
                                    </th>
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="flex justify-around items-center whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <input type="checkbox" name="">
                                        <a class="underline text-cyan-500" href="#">
                                            0007
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        corporation
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        affiliate 1
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        KM. 18 South Superhighway West Service Road 
Brgy. Marcelo Barangay Marcelo
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        pavi group
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        active
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
                                        <div class="flex justify-center">
                                            <button @click="addToGroupOpen = !addToGroupOpen" class="tooltip tooltip-left" data-tip="edit">
                                                <img src="../../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Pagination @paginate="getClientsRecord()" :pagination="pagination"
            :offset="1" class = "py-10"/>
    </div>
    <Slideover :show="addToGroupOpen" @close="addToGroupToggle" :title="'ADD TO GROUP'">
        <div class="flex flex-col justify-between h-full pb-5 mx-10">
            <div class="flex flex-col gap-3 mt-5">
                <InputGroup :inputType="'text'" :inputLabel="'customer id'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup :inputType="'text'" :inputLabel="'customer type'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup :inputType="'text'" :inputLabel="'group name'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroupSelectMenu label="'group name'" :labelWidth="'w-5/12'" :placeholder="'select group name'" :inputWidth="'w-7/12'" :options="groupNameOptions"/>
            </div>
            <div class="flex justify-between">
                <BorderButton @click.prevent="addToGroupToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

</template>
<script>
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue'
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import InputGroup from '../../../../../Misc/Input/InputGroup.vue';
import InputGroupSelectMenu from '@/Components/Misc/Select Menu/InputGroupSelectMenu.vue'
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
export default {
    components:{
        CheckboxSelectMenu, DateInput, NormalButton,
        BorderButton, SearchIcon, DropDown, InputGroup,
        InputGroupSelectMenu, Pagination, Slideover
    },
    data(){
        return{
            ClientsRecord: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'CUSTOMER TYPE'},
                {label:'NAME'},
                {label:'ADDRESS'},
                {label:'DATE REGISTERED'},
                {label:'GROUP'},
                {label:'STATUS'},
                {label:'ACTION'},
            ],
            groupNameOptions:[
                {name: 'communities'},
                {name: 'pavi group'},
                {name: 'vista group'},
            ],
            bulkOptions:[
                {label: 'add to communities'},
                {label: 'add to pavi group'},
                {label: 'add to vista group'},
            ],
            addToGroupOpen: false
        }
    },
    methods: {
        addToGroupToggle() {
            this.addToGroupOpen = false;
        },
        async getClientsRecord() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.ClientsRecord = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
