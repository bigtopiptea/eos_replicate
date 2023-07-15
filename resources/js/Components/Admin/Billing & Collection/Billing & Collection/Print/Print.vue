<script>
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import ProgressIcon from '@/Components/Misc/Icons/ProgressIcon.vue';
import LoadingIcon from '@/Components/Misc/Icons/LoadingIcon.vue';
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';

export default {
    components:{
        DateInput,
        NormalButton,
        BorderButton,
        ModalTwo,
        Slideover,
        XMarkIcon,
        SearchIcon,
        ProgressIcon,
        LoadingIcon,
        InputGroup
    },

    data() {
        return {
            isSaved: false,
            isSelected:'',
            isSelectedModal:'',
            viewModalOpen: false,
            slideoverOpen: false,
            labels:[
                {label:'DATE'},
                {label:'CLIENT NAME'},
                {label:'ACCOUNT'},
                {label:'SOA NO.'},
                {label:'COUNT'},
                {label:'AMOUNT'},
                {label:'AR PRINT/UPLOAD DATE'},
                {label:'AR NO.'},
                {label:'OR PRINT/UPLOAD DATE'},
                {label:'OR NO.'},
            ],
        }
    },

    methods: {
        viewModalToggle() {
            this.viewModalOpen = false;
            isSelected='';
        },
        slideOverToggle() {
            this.slideoverOpen = false;
        },
    },
}
</script>
<template>
    <div class="min-h-screen max-h-auto w-full bg-white">
        <div class="px-3 py-5">
            <div class="flex justify-between h-full min-w-full">
                <div class="flex justify-start flex-col">
                    <div class="flex items-end gap-3">
                        <div>
                            <DateInput label="Start Date" />
                        </div>
                        <div>
                            <DateInput label="End Date" />
                        </div>
                    </div>
                </div>
                <div class="right-side mt-[5px]">
                    <form class="flex items-start">
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
                    </form>
                </div>
            </div>
            <div class="min-w-full py-3 align-middle">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-normal text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200 ">
                                    <th v-for="label in labels" :key="label.label" scope="col" class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center ">
                                        {{  label.label }}
                                    </th>
                                    <th scope="col" class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-[300px]" >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        09/01/2022 04:31:45 PM
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        COMMUNITIES DAVAO
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        AR - COMMUNITIES DAVAO
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        SOA000000003
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        1
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        PHP 9,566.64
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        -
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        -
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        -
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        -
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center py-1 px-2 tracking-wider ]">
                                        <div class="flex justify-center">
                                            <div class="flex justify-center items-center w-fit gap-2">
                                                <BorderButton :button-label="'View Soa'" :buttonPadding="'px-2 py-1'" :buttonTextColor="'text-[#3E3E3E]'" :buttonSize="'h-auto w-auto'" :buttonBorderColor="'border-[#3E3E3E]'" :buttonHover="'hover:bg-[#3E3E3E]'"/>
                                                <BorderButton @click="(viewModalOpen = !viewModalOpen), isSelected='ACKNOWLEDGEMENT RECEIPT'" :button-label="'Print AR'" :buttonPadding="'px-2 py-1'" :buttonTextColor="'text-[#EE3E2C]'" :buttonSize="'h-auto w-auto'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2C]'"/>
                                                <BorderButton @click="(viewModalOpen = !viewModalOpen), isSelected='OFFICIAL RECEIPT'" :button-label="'Print OR'" :buttonPadding="'px-2 py-1'" :buttonSize="'h-auto w-auto'" />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ isSelectedModal }}
    <ModalTwo :show="viewModalOpen" @close="viewModalToggle()" :modalTitle="isSelected" :heightModal="'h-[250px]'" :modalTitlePosition="'text-center'">
        <div class="flex flex-col items-center justify-center h-full">
            <div class="flex flex-col text-center gap-3">
                <h1 class="text-[15px]">{{ isSelected }}</h1>
                <p class="text-[15px] uppercase">Already Existing?</p>
            </div>
            <div class="flex justify-center gap-7 mt-14">
                <BorderButton @click="(slideoverOpen = !slideoverOpen),(viewModalOpen = !viewModalOpen), isSelectedModal = 'YES'" :buttonLabel="'Yes,Upload'" :buttonPadding="'px-2 py-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[12px]'"/>
                <BorderButton @click="(slideoverOpen = !slideoverOpen),(viewModalOpen = !viewModalOpen), isSelectedModal = 'NO'"  :buttonLabel="'No,Print'" :buttonPadding="'px-2 py-1'" :buttonTextSize="'text-[12px]'"/>
            </div>
            <button class="absolute top-2 right-2 text-white text-[11px] tooltip tooltip-left"  data-tip="Close" @click="(viewModalOpen = !viewModalOpen)">
                X
            </button>
        </div>
    </ModalTwo>
    <Slideover :show="slideoverOpen" @close="slideOverToggle()" :title="isSelected" >
        <div v-show="isSelectedModal == 'YES'" class="flex flex-col justify-between h-full py-5 mx-10">
            <div class="flex flex-col gap-[20px] h-full ">
                <div>
                    <div>
                        <div class="flex flex-col items-center border-dashed border-2 border-[#7F7F7F] rounded-md p-5">
                            <div class="text-center mb-5">
                                <p class="text-sm">DRAG FILE HERE<br>OR</p>
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
                        <div class="pt-5 ">
                            <div class="flex justify-between mb-3">
                                <div class="flex items-center text-sm">
                                    <LoadingIcon></LoadingIcon>
                                    <span>payment_request.pdf</span>
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
                                        <span>10 MB</span>
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
                    <div class="relative flex flex-col gap-5 h-auto border-dashed border-2 border-[#7F7F7F] rounded-md p-5">
                        <h1 class="absolute -top-[10px] px-[5px] text-[13px] font-semibold text-[#3E3E3E] bg-white">UPLOADED DOCUMENTS</h1>
                        <div v-if="isSubmit" class="flex flex-col gap-[20px]">
                            <div>
                                <div class="flex gap-3">
                                    <PaperClipIcon/>
                                    <div class="text-[12px]">
                                        <div class="flex items-center gap-3">
                                            <p class="text-[#1F4583] underline"><a href="#">payment_request.pdf</a></p>
                                            <XMarkIcon class="stroke-red-500 cursor-pointer"></XMarkIcon>
                                        </div>
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
                            </div>
                            <div class="flex justify-center text-[#1F4583] text-[14px] hover:underline cursor-pointer">
                                <p class="capitalize">See more</p>
                                <ChevronDownIcon class="w-5 h-6"/>
                            </div>
                        </div>
                        <div v-else class="flex flex-col items-center justify-center">
                            <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[100px] w-[120px]">
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 w-full ">
                    <div>
                        <InputGroup :inputLabel="(isSelected=='ACKNOWLEDGEMENT RECEIPT' ? 'ACKNOWLEDGEMENT RECEIPT' : 'OFFICIAL RECEIPT') + ' NO.' " :placeholder="'ENTER' + (isSelected=='ACKNOWLEDGEMENT RECEIPT' ? ' AR' : ' OR') +' NO.'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :labelColor="'bg-[#D9D9D9]'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'ISSUED DATE OF' + (isSelected=='ACKNOWLEDGEMENT RECEIPT' ? ' AR' : ' OR')" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputType="'date'" :labelColor="'bg-[#D9D9D9]'"/>
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-7">
                <BorderButton @click.prevent="slideOverToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton @click="(slideoverOpen = !slideoverOpen)"  :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
        <div v-show="isSelectedModal == 'NO'" class="flex flex-col justify-between h-full py-5 mx-10">
            <div class="flex flex-col gap-3 w-full ">
                <div>
                    <InputGroup :inputLabel="(isSelected=='ACKNOWLEDGEMENT RECEIPT' ? 'ACKNOWLEDGEMENT RECEIPT' : 'OFFICIAL RECEIPT') + ' NO.' " :placeholder="'ENTER' + (isSelected=='ACKNOWLEDGEMENT RECEIPT' ? ' AR' : ' OR') +' NO.'" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :labelColor="'bg-[#D9D9D9]'" />
                </div>
                <div>
                    <InputGroup :inputLabel="'ISSUED DATE OF' + (isSelected=='ACKNOWLEDGEMENT RECEIPT' ? ' AR' : ' OR')" :isDisabled="true" :inputWidth="'w-6/12'" :labelWidth="'w-6/12'" :inputType="'date'" :labelColor="'bg-[#D9D9D9]'"/>
                </div>
            </div>
            <div class="flex justify-center gap-7">
                <BorderButton @click.prevent="slideOverToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton @click="(slideoverOpen = !slideoverOpen)"  :buttonLabel="'PRINT & SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

</template>
