<template>
    <div class="flex flex-col justify-between h-full w-auto px-5 py-5">
        <div>
            <div class="inline-block min-w-full align-middle mb-[15px]">
                <div class="flex justify-between items-end h-full min-w-full">
                    <div class="left-side-col-2 space-y-3 text-[10px]">
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
                    </div>            
                    <div class="right-side mt-[5px]">
                        <BorderButton  @click="addEditGroupOpen = !addEditGroupOpen"  :buttonLabel="'ADD NEW'" :buttonPadding="'p-2'" :buttonTextSize="'text-[12px]'"/>
                    </div>
                </div>
            </div>
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="flex justify-around items-center whitespace-nowrap uppercase py-2 px-2 tracking-wider ">
                                            01
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        communities
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        ALFARO, LECEL PEREZ
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        active
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
                                        <div class="flex justify-center gap-[10px]">
                                            <SwitchToggle
                                                :status="true"
                                                :isChecked="true"
                                            />
                                            <button class="tooltip tooltip-left" data-tip="edit">
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
        <Pagination @paginate="getGroupsRecord()" :pagination="pagination"
            :offset="1" class = "py-10"/>
    </div>
    <Slideover :show="addEditGroupOpen" @close="addEditGroupToggle" :title="'ADD/EDIT TO GROUP'">
        <div class="flex flex-col justify-between h-full pb-5 mx-10">
            <div class="flex flex-col gap-3 mt-5">
                <InputGroup :inputType="'text'" :inputLabel="'group id'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup :inputType="'text'" :inputLabel="'group name'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
            </div>
            <div class="flex justify-between">
                <BorderButton @click.prevent="addEditGroupToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
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
import SwitchToggle from "@/Components/Misc/Switch(Toggle)/SwitchToggle.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
export default {
    components:{
        CheckboxSelectMenu, DateInput, NormalButton,
        BorderButton, SearchIcon, DropDown, InputGroup,
        InputGroupSelectMenu, Pagination, Slideover,
        SwitchToggle
    },
    data(){
        return{
            GroupsRecord: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'GROUP ID'},
                {label:'GROUP NAME'},
                {label:'ADDED BY'},
                {label:'DATE ADDED'},
                {label:'STATUS'},
                {label:'ACTION'},
            ],
            addEditGroupOpen: false
        }
    },
    methods: {
        addEditGroupToggle() {
            this.addEditGroupOpen = false;
        },
        async getGroupsRecord() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.GroupsRecord = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
