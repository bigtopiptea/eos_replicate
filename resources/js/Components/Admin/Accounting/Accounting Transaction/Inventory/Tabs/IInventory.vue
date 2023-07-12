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
import BoxIconDrop from '@/Components/Misc/Icons/BoxIconDrop.vue';
import BoxIconX from '@/Components/Misc/Icons/BoxIconX.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue';
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
        BoxIconDrop,
        BoxIconX,
        Slideover,
        ModalTwo
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            IInventory: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'Count'},
                {label:'Supplier Name'},
                {label:'Item Name'},
                {label:'QUANTITY'},
                {label:'Unit'},
                {label:'Actions'},
            ],
            LogsLabels:[
                {label:'DATE'},
                {label:'Cost Center'},
                {label:'Department'},
                {label:'Name'},
                {label:'In(Qty)'},
                {label:'OUT(QTY)'},
                {label:'UNIT'},
                {label:'RUNNING BALANCE(QTY)'},
            ],
            AvailableInventoryLabels:[

                {label:'Cost Center'},
                {label:'Quantity'},
                {label:'UNIT'},

            ],
            isFiltered: false,
            slideoverOpen: false,
            openModal: false,
            isSelected:'',
        }
    },
    methods: {

        gotoPage(){
            this.$router.push({name: "Accounting Purchase Order", params: {isOpen: true}});
        },
        modalToggle(){
            this.openModal=false;
        },
        slideoverToggle(){

            this.slideoverOpen = false;
        },
        async getIInventory() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.IInventory = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {


                })
        },
    },
}
</script>

<template>
    <!-- Main Content -->
    <div class="flex flex-col justify-between h-full w-auto my-5 px-3">
        <div>
            <div class="inline-block min-w-full align-middle ">
                <div class="flex justify-end h-full min-w-full ">
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
                            <NormalButton @click="(isFiltered = !isFiltered)" label="Export"
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
                                <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center w-[15%] text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                            1
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            Supplier 1
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            <p @click="(openModal = !openModal),isSelected = 'Available Inventory'" class="underline text-cyan-600 cursor-pointer">
                                                Long Bond Paper
                                            </p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            <p @click="(openModal = !openModal),isSelected = 'Inventory Logs' " class="underline text-cyan-600 cursor-pointer">
                                                10
                                            </p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            REAMS
                                        </td>
                                        <td
                                            class=" whitespace-nowrap uppercase py-1 px-2 tracking-wider border border-red-500">
                                            <div class="flex justify-center items-center gap-3 ">
                                                <div class="relative">
                                                    <button @click="(slideoverOpen = !slideoverOpen)" class="border-2 h-[24px] text-[12px] z-30 w-auto border-[#3e3e3e] text-center text-[#3e3e3e] hover:text-white hover:bg-[#3e3e3e] pr-1 pl-[19px] uppercase whitespace-nowrap"><BoxIconX class=" bg-inherit absolute h-4 w-4 top-1 left-1"/>STOCK OUT</button>
                                                </div>
                                                <div class="relative">
                                                    <button @click="gotoPage"  class=" border-2 h-[24px] text-[12px] z-30 w-auto border-[#FB9E30] text-center text-[#FB9E30] hover:text-white hover:bg-[#FB9E30] pr-1 pl-[19px] uppercase whitespace-nowrap"><BoxIconDrop class="bg-inherit absolute h-4 w-4 top-1 left-1"/>RE-ORDER</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Pagination @paginate="getIInventory()" :pagination="pagination"
                    :offset="1" class = "py-10"/>
            </div>
            <div v-else class="flex flex-col items-center justify-center py-20">
                <img src="../../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
                <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
            </div>
        </div>
    </div>
    <!-- SLIDEOVER INVENTORY STOCK OUT -->
    <Slideover :show="slideoverOpen" @close="slideoverToggle" :title="'ADD NEW'">
        <div class="flex flex-col justify-between h-full px-[40px] py-[15px]">
            <div class="flex flex-col gap-[10px]">
                <InputGroup  :inputLabel="'ITEM'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup  :inputLabel="'AVAILABLE STOCKS'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroupSelectMenu :label="'Branch'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select Branch'" :options="sampleOption"/>
                <InputGroup  :inputLabel="'DATE'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :inputType="'date'"/>
                <InputGroup  :inputLabel="'Quantity'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :inputType="'number'"/>
                <InputGroupSelectMenu :label="'Department'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isRequired="true" :placeholder="'select Department'" :options="sampleOption"/>
                <InputGroupSelectMenu :label="'Received By'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isRequired="true" :placeholder="'select Employee'" :options="sampleOption"/>
                <TextAreaGroup :inputLabel="'Notes'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" />
            </div>
            <div class="flex justify-between">
                <BorderButton @click="slideoverToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[13px]'"/>
            </div>
        </div>
    </Slideover>
    <!-- MODAL FOR INVENTORY LOGS FOR SPECIFIC ITEM -->
    <ModalTwo :show="openModal" @close="modalToggle" :modalTitle="isSelected == 'Inventory Logs' ? 'Inventory Logs for Specific Item' : 'Available Inventory Per Branch'" :widthModal="'w-[90%]'" :heightModal="'h-[500px]'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'">
        <div v-show="isSelected == 'Available Inventory'" class="w-full flex flex-col gap-[20px] p-5">
            <div class="flex justify-between">
                <div class="w-[25%]">
                    <InputGroup  :inputLabel="'ITEM NAME'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true" :placeholder="'[SYSTEM GENERATED]'"/>
                </div>
                <div class="w-[25%]">
                    <InputGroup  :inputLabel="'ON STOCK'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true" :placeholder="'[SYSTEM GENERATED]'"/>
                </div>
            </div>
            <div>
                <div class="min-w-full py-2 align-middle ">
                    <div class="relative h-[360px]">
                        <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in AvailableInventoryLabels" :key="label.label" scope="col"
                                            class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider w-[60%]">
                                            Main Office
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider w-[20%]">
                                            6
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider w-[20%]">
                                            Reams
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-center gap-[20px] ">
                        <BorderButton @click.prevent="modalToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                        <BorderButton :buttonLabel="'Export'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="isSelected == 'Inventory Logs'" class="w-full flex flex-col gap-[20px] p-5">
            <div class="w-[25%]">
                <InputGroup  :inputLabel="'ITEM NAME'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true" :placeholder="'[SYSTEM GENERATED]'"/>
            </div>
            <div>
                <div class="min-w-full py-2 align-middle ">
                    <div class="relative h-[360px]">
                        <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in LogsLabels" :key="label.label" scope="col"
                                            class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            <p class="text-cyan-600 underline cursor-pointer">
                                                09/28/2022
                                            </p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            Main Office
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            IT
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            LEMITA, ANGELOU C.
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            0
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            1
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            Reams
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            10
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-center gap-[20px] ">
                        <BorderButton @click.prevent="modalToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                        <BorderButton :buttonLabel="'Export'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
                    </div>
                </div>
            </div>
        </div>
    </ModalTwo>
</template>

<style scoped>
    /* Remove background color */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        background-color: transparent;
    }

    /* Remove hover effect */
    input[type=number]::-webkit-inner-spin-button:hover,
    input[type=number]::-webkit-outer-spin-button:hover {
        background-color: transparent;
    }

    /* Adjust size */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        height: 24px; /* Adjust the height as needed */
        width: 24px; /* Adjust the width as needed */
        opacity: 1;
    }
</style>

