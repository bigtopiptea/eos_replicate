<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import CheckIcon from "@/Components/Misc/Icons/CheckIcon.vue";

import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";


</script>
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import DropDown from '../../Misc/Dropdown/Dropdown.vue';
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";
import {Form} from "vform";
import Swal from "sweetalert2";
import { successMessage, errorMessage } from '@/utils/toast.js';


export default {
    components: {SmallHeading},
    data(){
        return {

            selected: "1 Processing",

            labels: [
                {label: 'OPEN'},
                {label: 'HIGH'},
                {label: 'LOW'},
                {label: 'CLOSE'},
                {label: 'DATE UPDATED'},
                {label: 'UPDATED BY'}
            ],
            rateLabels: [
                {label: 'TIE-UP PARTNER'},
                {label: 'NOON'},
                {label: 'FINAL'},
                {label: 'ACTIVATE RATE'},
                {label: 'DATE UPDATED'},
                {label: 'UPDATED BY'},
                {label: 'ACTIONS'},
            ],
            activateRate: [
                {label: 'noon'},
                {label: 'final'}
            ],
            isOpen: true,
            rates: [],
            selected: '',
            cmtRate: new Form({
                noon_rate: '',
                activate_rate: '',
                final_rate: '',
            }),
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
        openSummary(){
            this.isOpen = !this.isOpen;
        },
        openBreakAndEntry(){
            this.isOpen = !this.isOpen;
        },
        openJournalEntry(){
            this.isOpen = !this.isOpen;
        },
        async getRate(){
            await axios.get('/api/rates/cmt/list')
                .then((response) => {
                    this.rates = response.data;
                })
                .catch((errors) => [
                ])
        },
        editMode(rate){
            this.selected = rate.id;
            this.cmtRate.noon_rate = rate.noon_rate;
            this.cmtRate.final_rate = rate.final_rate;
            this.cmtRate.activate_rate = rate.activated_rate;
            // this.cmtRate.reset();
        },
        async updateCmtRate(id){
            Swal.fire({
                title: "Are you sure you want to update?",
                icon: "warning",
                iconColor: "rgba(238, 62, 44, 1)",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Apply!",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.cmtRate.put(`/api/rates/cmt/${id}`)
                        .then((response) => {
                            successMessage('Success!', response.data.message);
                            this.getRate();
                            this.selected = '';
                            this.cmtRate.reset();
                        })
                        .catch((errors) => {
                            errorMessage('Oops!', 'Error');
                        })
                }else{
                    this.selected = '';
                }
            });
        },
    },
    created() {
        this.getRate();
    }
}

</script>
<template>
    <div class="pt-8 px-4 bg-white h-screen">
        <div class="py-4 px-4">
            <TabNav :tabs="['Pending', 'Approval History']" :selected="selected" @selected="setSelected">
                <Tab :isSelected="selected === 'Pending'">
                    <div class="w-full mt-10">
                    <SmallHeading :isOpen="isOpen" label="SUMMARY " class="bg-dark-orange" :icon="ChevRightIcon" @click.prevent="openSummary()" />
                        <Transition name="slide-fade" >
                            <div class="mt-6 px-10" v-if="!isOpen">
                                <div class="-my-2 -mx-20 overflow-x-hidden">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="flex items-end justify-between p-4 border border-red-600 overflow-auto z-10 h-auto">
                                            <div class="flex justify-start flex-col space-x-3 ">
                                                <div class="flex left-side-col-1 ">
                                                    <div>
                                                        <InputLabel label="Start Date" />
                                                        <br/>
                                                        <input class="text-[11px] border border-gray-300 p-2" type="date" />
                                                    </div>
                                                    <div>
                                                        <InputLabel label="End Date" />
                                                        <br/>
                                                        <input class="text-[11px] border border-gray-300 p-2" type="date" />
                                                    </div>
                                                    <div>
                                                        <br/>
                                                        <NormalButton label="Format"
                                                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                                                    </div>
                                                </div>
                                                <div class="left-side-col-2 space-y-3">
                                                    <DropDown label="bulk action" class="-m-3" />
                                                    <NormalButton label="Apply" class="bg-[#F9951E] h-[34px]  p-1.5 text-sm text-white px-3 uppercase" />
                                                </div>
                                            </div>
                                                <div class="right-side flex justify-items-start h-20">
                                                <form class="flex items-start">
                                                    <div class="relative w-full">
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                            <SearchIcon />
                                                        </div>
                                                        <input type="text" id="simple-search"
                                                            class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                                            placeholder="Search" required />
                                                    </div>
                                                    <NormalButton label="Go"
                                                    class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                                                    <NormalButton label="Export"
                                                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-sm font-medium text-white" />
                                                </form>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="mb-8 -mx-4 overflow-hidden sm:-mx-6 lg:-mx-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 border border-red-900 mt-10">
                                        <table class="w-full divide-y divide-gray-300">
                                            <thead class="bg-[#D7D7D7]">
                                            <tr class="divide-x divide-gray-200">
                                                <th scope="col" class="px-6 whitespace-nowrap ">
                                                    <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        <div class="space-x-7 flex items-center">
                                                            <input type="checkbox" />
                                                                <span>BATCH ID</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6  w-[24%]">
                                                    <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        FILENAME
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 ">
                                                    <div class="flex items-center whitespace-nowrap justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        ITEM COUNT
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 w-[10%]">
                                                    <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        TOTAL AMOUNT
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6  w-[10%]">
                                                    <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        EXCHANGE RATE
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 w-[10%]">
                                                    <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        PROCESSED DATE
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 w-[10%]">
                                                    <div class="flex items-center justify-between uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        VALUE DATE                                                        </div>
                                                </th>
                                                <th scope="col" class="px-6  w-[10%]">
                                                    <div class="uppercase text-[13px] font-rubik-normal tracking-wider">
                                                        ACTION
                                                    </div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 ">
                                            <tr v-for="company in companies" :key="company.id" class="divide-x divide-gray-200">
                                                <td class="px-6 py-2 text-[14px] space-x-8 font-rubik-normal">
                                                    <input type="checkbox" />
                                                    <span>
                                                    {{company.id}}                                                        </span>
                                                </td>
                                                <td class="px-6 py-2 text-[14px] whitespace-nowrap font-rubik-normal">
                                                    {{company.name}}
                                                </td>
                                                <td class="px-6 py-2 text-[14px] font-rubik-normal">
                                                    {{company.partner_code}}
                                                </td>
                                                <td class="px-6 py-2 text-[14px] whitespace-nowrap font-rubik-normal uppercase">
                                                    {{company.created_at}}
                                                    {{company.created_at ? $moment(company.created_at).format('MM/DD/YYYY, h:mm:ss a') : ''}}
                                                </td>
                                                <td class="px-6 py-2 text-[14px] uppercase whitespace-nowrap font-rubik-normal">
                                                    {{company.added_by.last_name}}, {{company.added_by.middle_name}} {{company.added_by.first_name}}
                                                </td>
                                                <td class="px-6 py-2">
                                                    <div class="flex items-center justify-center space-x-4">
                                                        <EditIcon @click="
                                                            (slideoverOpen =
                                                                !slideoverOpen),
                                                                getState('edit'),
                                                                getCompany(company.id)"
                                                                class="text-[#F9951E] h-5 hover:cursor-pointer"
                                                        />
                                                        <SwitchToggle
                                                            :status="company.isActive"
                                                            :isChecked="company.isActive"
                                                            @click.prevent="
                                                            toggleStatus(),
                                                            updateCompanyStatus(company.id,company.isActive,company.label)"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </Transition>
                    </div>
                </Tab>
            </TabNav>
        </div>
    </div>
</template>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(20px);
    opacity: 0;
}
</style>
