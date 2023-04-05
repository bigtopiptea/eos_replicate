<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
</script>
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import DistributionSummary from "@/Components/Admin/CMT/DistributionSummary.vue";
import DistributionBreakEntry from "@/Components/Admin/CMT/DistributionBreak&Entry.vue";
import DistributionJournalEntry from "@/Components/Admin/CMT/DistributionJournalEntry.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";
import {Form} from "vform";
import Swal from "sweetalert2";
import { successMessage, errorMessage } from '@/utils/toast.js';


export default {
    components: {SmallHeading, DistributionSummary, DistributionBreakEntry, DistributionJournalEntry},
    data(){
        return {

            selected: "Pending",

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
    <div class="px-4 h-screen  m-2">
        <div class="border  bg-white border-white shadow-md">
            <TabNav :tabs="['Pending', 'Approval History']" :selected="selected" @selected="setSelected" >
                <Tab :isSelected="selected === 'Pending'" >
                    <div class="w-full h-full mt-10  ">
                        <SmallHeading :isOpen="isOpen" label="SUMMARY " class="bg-dark-orange mt-10" :icon="ChevRightIcon" @click.prevent="openSummary()" />
                            <Transition name="slide-fade" >
                                <div class="mt-6" v-if="!isOpen">
                                    <DistributionSummary/>
                                </div>
                            </Transition>
                        <SmallHeading :isOpen="isOpen" label="BREAKDOWN AND ENTRY " class="bg-dark-orange mt-10" :icon="ChevRightIcon" @click.prevent="openBreakAndEntry()" />
                            <Transition name="slide-fade" >
                                <div class="mt-6" v-if="!isOpen">
                                    <DistributionBreakEntry/>
                                </div>
                            </Transition>
                        <SmallHeading :isOpen="isOpen" label="JOURNAL ENTRY " class="bg-dark-orange mt-10" :icon="ChevRightIcon" @click.prevent="openBreakAndEntry()" />
                            <Transition name="slide-fade" >
                                <div class="mt-6" v-if="!isOpen">
                                    <DistributionJournalEntry/>
                                </div>
                            </Transition>
                        <div class="flex justify-center space-x-4 items-center w-full h-auto mb-3 mt-10 ">
                            <button class=" uppercase py-3 px-10 m-2 bg-#3E3E3E text-white  font-sans font-normal text-base">CANCEL</button>
                            <button class=" uppercase py-3 px-10 m-2 bg-dark-orange text-white font-sans font-normal text-base">SUBMIT</button>
                        </div>
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
