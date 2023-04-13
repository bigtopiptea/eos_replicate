<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
</script>
<script>
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";

import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";
import MTDPending from "./MTDPending.vue";
import MTDApprovalHistory from "./MTDApprovalHistory.vue";

// import {Form} from "vform";
// // import Swal from "sweetalert2";
// // import { successMessage, errorMessage } from '@/utils/toast.js';


export default {
    components: {
        SmallHeading,
        MTDPending,
        MTDApprovalHistory,


    },
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
                <div class="w-full h-auto  ">
                    <MTDPending/>
                </div>
            </Tab>
            <Tab :isSelected="selected.name === 'Approval History'" >
                <div class="w-full h-screen ">
                    <MTDApprovalHistory/>
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
