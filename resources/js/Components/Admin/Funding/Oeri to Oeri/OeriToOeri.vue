<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>

<script>


import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import InputDropdown from '@/Components/Misc/Input/InputDropdown.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import axios from "axios";


export default{
  props: {
  },

    name:'Banks & Providers',

    components:{
    Tab, TabNav,
    EditIcon,
    NormalButton,
    SearchIcon,
    InputLabel,
    ListIcon,
    Pagination,
    InputGroup,
    InputDropdown,
    BorderButton
},

    data() {
        return {
            distributionRefund: [],
            pagination: {
                current_page: 1,
            },

            selected: "Pending",
            isOpen: true,
            // rates: [],
            // selected: '',

        }
    },
    methods: {
        async getDistributionRefund() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.distributionRefund = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },

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
    }
</script>

<template>

<div class="border m-3 bg-white border-white shadow-md ">
    <TabNav :tabs="['Pending',  'Approval History' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white'">
        <Tab :isSelected="selected === 'Pending'" >
            <div class=" h-full overflow-x-hidden border bordr-red-500">
                <!-- FORM -->
                <div class="flex flex-col min-w-full align-middle md:px-6 lg:px-8">
                    <div>
                        <InputGroup :inputLabel="'reference no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                    </div>
                    <div>
                        
                    </div>
                    <div></div>
                </div>
                <Pagination @paginate="getDistributionRefund()"  :pagination="pagination"
                        :offset="1" class="mt-8" />

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
