<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
</script>
<script>
import Accordion from "@/Components/Misc/Accordion.vue"
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import DistributionSummary from "@/Components/Admin/CMT/Processing/DistributionSummary.vue";
import DistributionBreakEntry from "@/Components/Admin/CMT/Processing/DistributionBreak&Entry.vue";
import DistributionJournalEntry from "@/Components/Admin/CMT/Processing/DistributionJournalEntry.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";
// import {Form} from "vform";
// // import Swal from "sweetalert2";
// // import { successMessage, errorMessage } from '@/utils/toast.js';


export default {
    components: {SmallHeading, DistributionSummary, DistributionBreakEntry, DistributionJournalEntry},
    data(){
        return {

            selected: "Pending",
            isOpen: true,
            rates: [],
            selected: '',

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

    },
    created() {
        this.getRate();
    }
}

</script>
<template>
    <div class="border m-3 bg-white border-white shadow-md">
        <TabNav :tabs="[{name: 'Pending' }, {name: 'Approval History' }]" :selected="selected.name" @selected="setSelected" >
            <Tab :isSelected="selected.name === 'Pending'" >
                <div class="w-full h-full ">
                        <Accordion sectiontitle="SUMMARY">
                            <DistributionSummary/>
                        </Accordion>
                        <Accordion sectiontitle="BREAKDOWN AND ENTRY ">
                            <DistributionBreakEntry/>
                        </Accordion>
                        <Accordion sectiontitle="JOURNAL ENTRY ">
                            <DistributionJournalEntry/>
                        </Accordion>
                </div>
            </Tab>
        </TabNav>
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
