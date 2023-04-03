<!--<script>-->
<!--import Title from '../../Misc/Section/Title.vue';-->
<!--import {Form} from "vform";-->
<!--import SettingsInput from "@/Components/Misc/Input/SettingsInput.vue";-->
<!--import VueTagsInput from "@sipec/vue3-tags-input";-->
<!--import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";-->

<!--export default {-->
<!--   components: {-->
<!--       NormalButton,-->
<!--       SettingsInput,-->
<!--       Title,-->
<!--       VueTagsInput-->
<!--   },-->
<!--    data() {-->
<!--       return {-->
<!--           bankValidation: new Form({-->
<!--               bank: '',-->
<!--               validations: '',-->
<!--               tags: []-->
<!--           }),-->
<!--           cbaBiller: [],-->
<!--       }-->
<!--    },-->
<!--    methods: {-->
<!--        async storeValidation(){-->
<!--            await this.bankValidation.post('/api/transactions/storeValidation')-->
<!--                .then((response) => {-->

<!--                })-->
<!--                .catch((errors) => {-->

<!--                })-->
<!--        },-->
<!--        async getBillers(){-->
<!--            await axios.get('/api/biller-cba')-->
<!--                .then((response) => {-->
<!--                    this.cbaBiller = response.data;-->
<!--                })-->
<!--                .catch((errors) => {-->

<!--                })-->
<!--        }-->
<!--    },-->
<!--    created() {-->
<!--       this.getBillers();-->
<!--    }-->
<!--}-->

<!--</script>-->
<!--<template>-->

<!--   <div class="w-full border bg-white h-screen border-white">-->
<!--        <form @submit.prevent="storeValidation()">-->
<!--            <v-select v-model="bankValidation.bank" class="border border-gray-300" :options="cbaBiller" label="name"></v-select>-->
<!--            <vue-tags-input placeholder="where is me?" v-model="bankValidation.validations"-->
<!--                            :tags="bankValidation.tags"-->
<!--                            @tags-changed="newTags => bankValidation.tags = newTags"-->
<!--                            class="mt-5 tracking-wider w-full uppercase font-rubik-light placeholder:text-[#3e3e3e]"-->
<!--            />-->
<!--            <NormalButton label="Save" class="py-1.5 px-3 bg-mid-red text-white uppercase text-[11px]" />-->
<!--        </form>-->
<!--   </div>-->
<!--</template>-->
<script>
import {defineComponent} from "vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import MonitorIndex from "@/Components/Admin/Monitor & Transactions/MonitorIndex.vue";

export default{
    components: {
        MonitorIndex,
        Tab,
        TabNav,
    },
    data(){
        return {
            selected: 'Processing',
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
    }
}
</script>
<template>
       <div class="w-full border bg-white border-white">
           <TabNav :tabs="['Processing', 'Cancellation', 'Additional', 'Refund', 'Adjustment']" :selected="selected" @selected="setSelected">
               <Tab :isSelected="selected === 'Processing'">
                   <MonitorIndex />
               </Tab>
               <Tab :isSelected="selected === 'Cancellation'">
                   <h1>Cancellation</h1>
               </Tab>
               <Tab :isSelected="selected === 'Additional'">
                   <h1>Additional</h1>
               </Tab>
               <Tab :isSelected="selected === 'Refund'">
                   <h1>Refund</h1>
               </Tab>
               <Tab :isSelected="selected === 'Adjustment'">
                   <h1>Adjustment</h1>
               </Tab>
           </TabNav>
       </div>
</template>
