<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import CheckIcon from "@/Components/Misc/Icons/CheckIcon.vue";

</script>
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import axios from "axios";
import {Form} from "vform";
import Swal from "sweetalert2";
import { successMessage, errorMessage } from '@/utils/toast.js';

export default {
    components: {SmallHeading},
    data(){
        return {
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
        openCommittedRate(){
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
        <div class="text-center">
            <h1 class="font-bold uppercase text-[11px] tracking-widest">Trading Summary</h1>
            <span class="text-[10px]">09/28/2022</span>
        </div>
        <div class="mt-6 px-10">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7]">
                            <tr class="divide-x divide-solid">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="px-2 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                        09/28/2022 05:59:26 PM
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                        LASCONIA, ELIOMAR DE ASIS
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-10">
            <SmallHeading :isOpen="isOpen" label="COMMITTED RATE" class="bg-dark-orange" :icon="ChevRightIcon" @clicked="openCommittedRate()" />
            <Transition name="slide-fade" >
                <div class="mt-6 px-10" v-if="!isOpen">
                        <div class="-my-2 -mx-4 overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                                <table class="min-w-full table-fixed divide-y divide-gray-300">
                                    <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-solid">
                                        <th v-for="label in rateLabels" :key="label.label" scope="col"
                                            class=" py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="rate in rates" class="divide-x divide-gray-200">
                                        <td class="whitespace-nowrap uppercase  px-2 py-2 text-[11px] text-[#3E3E3E]">
                                            {{rate.company.name}}
                                        </td>
                                        <td class="whitespace-nowrap uppercase w-[10%] text-right px-2 text-[11px] relative text-[#3E3E3E]">
                                            <input v-model="cmtRate.noon_rate" v-if="selected === rate.id" class=" border-2 text-right px-2 border-gray-300 w-full p-[0.10rem]" type="text" />
                                            <span v-else class="" >{{rate.noon_rate.toFixed(2)}}</span>
                                        </td>
                                        <td class="whitespace-nowrap uppercase w-[10%] text-right px-2  text-[11px] text-[#3E3E3E]">
                                            <input v-model="cmtRate.final_rate" v-if="selected === rate.id" class=" border-2 text-right px-2 border-gray-300 w-full p-[0.10rem]" type="text" />
                                            <span v-else class="" >{{rate.final_rate.toFixed(2)}}</span>
                                        </td>
                                        <td class="whitespace-nowrap uppercase w-[10%] px-2 text-center text-[11px] text-[#3E3E3E]">
                                            <span v-if="selected !== rate.id">{{ rate.activated_rate }}</span>
                                            <select v-model="cmtRate.activate_rate" v-else class="px-10 border-2 border-gray-300 py-1 bg-white  uppercase">
                                                <option :value="item.label" class="font-bold font-rubik-light" v-for="item in activateRate">{{ item.label.toUpperCase() }}</option>
                                            </select>
                                        </td>
                                        <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                            {{$moment(rate.updated_at).format("MM/DD/YYYY, h:mm:ss a")}}
                                        </td>
                                        <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] text-[#3E3E3E]">
                                            {{ rate.user.last_name }}, {{rate.user.first_name}} {{rate.user.middle_name}}
                                        </td>
                                        <td class="whitespace-nowrap uppercase text-center px-2 py-2 text-[11px] flex items-center text-[#3E3E3E]">
                                            <EditIcon v-if="selected !== rate.id" @click="editMode(rate)" class="text-[#F9951E] h-5 w-5 m-auto cursor-pointer hover:text-[#F36432]" />
                                            <CheckIcon v-else @click="updateCmtRate(rate.id)" class="h-5 w-5 m-auto text-green-500 cursor-pointer" />
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
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
