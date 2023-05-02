<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
</script>
<script>
import Accordion from "@/Components/Misc/Accordion.vue"
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import DistributionSummary from "@/Components/Admin/Distribution/Processing/DistributionSummary.vue";
import DistributionBreakEntry from "@/Components/Admin/Distribution/Processing/DistributionBreak&Entry.vue";
import JournalEntry from "@/Components/Admin/Distribution/Processing/JournalEntry.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";
// import {Form} from "vform";
// // import Swal from "sweetalert2";
// // import { successMessage, errorMessage } from '@/utils/toast.js';


export default {
    components: {SmallHeading, DistributionSummary, DistributionBreakEntry, JournalEntry},
    data(){
        return {

            selected: "Pending",
            // isOpen: true,
            // rates: [],
            // selected: '',

        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
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
        <TabNav :tabs="['Pending' , 'Approval History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C]'" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Pending'" >
                <div class="w-full h-full ">
                        <Accordion sectiontitle="SUMMARY" :setOpen=true>
                            <DistributionSummary />
                        </Accordion>
                        <Accordion sectiontitle="BREAKDOWN AND ENTRY " :setOpen=false>
                            <DistributionBreakEntry/>
                        </Accordion>
                        <Accordion sectiontitle="JOURNAL ENTRY " :setOpen=false>
                            <JournalEntry/>
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
