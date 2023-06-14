<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue'
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
import PaperClipIcon from '../../../../../Misc/Icons/PaperClipIcon.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
export default{
    components:{
        Pagination, CheckboxSelectMenu, NormalButton, SearchIcon, 
        BorderButton, LoadingIcon, XMarkIcon, ProgressIcon, Slideover,
        PaperClipIcon
    },
    data() {
        return {
            CollectionDetailedTable: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REF NO.'},
                {label:'SERVICES'},
                {label:'DESCRIPTION'},
                {label:'PRINCIPAL AMT.'},
                {label:'SERVICE FEE'},
                {label:'COST'},
                {label:'TAX'},
                {label:'PENALTY'},
                {label:'AMT. TO PAY'},
                {label:'AMT. ALLOCATED'},
                {label:'OUTSTANDING BALANCE'},
                {label:'NET OF EWT'},
                {label:'STATUS'},
            ],
            attachDocsOpen: false, 
            isSubmit: false,
        }
    },
    methods: {
        attachDocsOpenToggle() {
            this.attachDocsOpen = false;
        },
        async getCollectionDetailedTable() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CollectionDetailedTable = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

    },

}
</script>
<template>
    <div class="flex flex-col h-auto p-5">
        <!-- TABLE -->
        <div class="flex justify-between items-center px-[20px]  mb-[20px]">
            <div class="flex flex-col gap-[10px] uppercase text-[11px] w-[45%]">
                <div class="flex gap-[100px]">
                    <div class="flex flex-col gap-[10px]">
                        <div class="flex gap-[5px]">
                            <input type="checkbox" name="" id="">
                            <p>less ewt</p>
                        </div>
                        <div>
                            <p class="pl-[17px]">total ewt: -</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <div class="flex gap-[10px]">
                            <p>total items selected:</p>
                            <p>7 items</p>
                        </div>
                        <div class="flex gap-[10px]">
                            <p>total amount selected:</p>
                            <p>PHP 1,058.40</p>
                        </div>
                    </div>
                </div>
                <div class="relative cursor-pointer pl-[17px]">
                    <BorderButton @click="(attachDocsOpen = !attachDocsOpen)" :buttonLabel="isSubmit == false ? 'attach 2307' : 'view 2307'" :buttonSize="'h-auto w-auto'" :buttonTextColor="'text-[#EE3E2C]'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2c]'" :buttonPadding="'px-4 py-1'" :buttonTextSize="'text-[10px]'"/>
                    <!-- <input class="absolute inset-0 w-[130px] pl-[17px] opacity-0" type="file">                 -->
                </div>
            </div>
            <form class="flex gap-3 mb-[30px]">
                <div class="flex">
                    <div class="relative w-full">
                        <div class="absolute left-0 top-[7px] flex items-center pl-3 pointer-events-none">
                            <SearchIcon />
                        </div>
                        <input type="text" id="simple-search"
                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                        placeholder="Search" required />
                    </div>
                    <NormalButton label="Go"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                </div>
                <NormalButton label="Export"
                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
            </form>
        </div>
        <div class="min-w-full py-2 align-middle">
            <div class="relative h-[360px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#EAEAEA] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th class="flex items-center gap-[5px] py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    <input type="checkbox" name="" id="">
                                    <a href="">ID</a>
                                </th>
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class="flex justify-center gap-[5px] hitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" name="" id=""> 
                                    <a href="">1</a> 
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">                            
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LBC120626689PH
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LBC
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                     COURIER CHARGES
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    135.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    67.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    84.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   16.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   0.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   151.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   0.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   151.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   0.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   UNPAID
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getCollectionDetailedTable()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>

    <Slideover :show="attachDocsOpen" @close="attachDocsOpenToggle" :title="'UPLOAD 2307'">
        <div class="flex flex-col justify-between items-center h-full pb-5">
            <div class="py-5 mx-5 w-4/5">
                <div class="flex flex-col items-center border-dotted border-2 border-#7F7F7F rounded-md p-5">
                    <div class="text-center mb-5">
                        <p class="text-sm">DRAG IMAGE HERE<br>OR</p>
                        <div class="flex items-center justify-center cursor-pointer">
                            <BorderButton :buttonLabel="'browse'" :buttonSize="'h-auto w-[100px]'" :buttonTextColor="'text-[#EE3E2C]'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2c]'" :buttonPadding="'px-4 py-1'" :buttonTextSize="'text-[12px]'"/>
                            <input class="absolute w-[100px] opacity-0" type="file">
                        </div>
                    </div>
                    <div class="text-center text-[10px]">
                        <p>MAX FILE SIZE: <span class="font-bold">10MB</span><br>
                        SUPPORTED FILE TYPES: <span class="font-bold">JPEG, JPG, PNG, PDF</span>
                        </p>
                    </div>
                </div>
                <div v-show="isSubmit == true" class="flex justify-center gap-3 pt-5">
                    <PaperClipIcon/>
                    <div class="text-[14px]">
                        <p class="text-[#1F4583] underline"><a href="#">BIR_FORM_2307.jpg</a></p>
                        <p class="font-bold">
                            Date uploaded:
                            <span class="font-normal">09/28/2022 10:55:09 AM</span>
                        </p>
                        <p class="font-bold">
                            Uploaded by:
                            <span class="font-normal">SOLTES, CAROL</span>
                        </p>
                    </div>
                </div>
                <div v-show="isSubmit == false" class="pt-5">
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center text-sm">
                            <LoadingIcon></LoadingIcon>
                            <span>BIR_FORM_2307.jpg</span>
                        </div>
                        <div class="cursor-pointer">
                            <XMarkIcon></XMarkIcon>
                        </div>
                    </div>
                    <div class="mb-3">
                        <ProgressIcon :progressWidth="'w-96'"></ProgressIcon>
                    </div>
                    <div class="flex justify-between text-[10px] mb-3">
                        <div>
                            <p>
                                <span>0.5 MB</span>
                                of
                                <span>1 MB</span>
                            </p>
                        </div>
                        <div class="text-#194E72">
                            <p>UPLOADING...
                                <span>50%</span>
                            </p>
                        </div>
                    </div>
                </div>
   
            </div>
            <div class="flex justify-between w-4/5">
                <BorderButton @click.prevent="attachDocsOpenToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton @click="isSubmit = true"  :buttonLabel="'SUBMIT'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>


</template>