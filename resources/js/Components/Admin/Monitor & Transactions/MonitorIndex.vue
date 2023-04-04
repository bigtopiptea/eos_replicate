<script>
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import axios from "axios";
import { HalfCircleSpinner  } from 'epic-spinners'
import ViewIcon from "@/Components/Misc/Icons/ViewIcon.vue";
import XmarkIcon from "@/Components/Misc/Icons/XmarkIcon.vue";
import CheckIcon from "@/Components/Misc/Icons/CheckIcon.vue";
import auth from "@/store/auth";

export default {
    components: {
        CheckIcon,
        XmarkIcon,
        ViewIcon,
        TabNav,
        HalfCircleSpinner
    },
    data(){
        return{
            selected: 'Pending',
            monitoring: [],
            isLoading: false,
            user: this.$store.state.auth.user,

        }
    },
    methods: {
        auth() {
            return auth
        },
        async monitoringData(){
            this.isLoading = false;
            await axios.get('/api/transactions/monitoring')
                .then((response) => {
                    this.isLoading = true;
                    this.monitoring = response.data;
                })
                .catch((errors) => {
                    this.isLoading = false;
                });
        },
        async changeStatus(id){
          await axios.put(`/api/transactions/monitoring/change-status/${id}`)
              .then((response) => {

              })
              .catch((errors) => {

              })
        },
        setSelected(tab) {
            this.selected = tab;
        },
    },
    created() {
        this.monitoringData();
    }
}
</script>
<template>
    <div class="py-4 px-4">
    <TabNav :tabs="['Pending', 'Approval History']" :selected="selected" @selected="setSelected">
        <div class="bg-white border border-gray-300 shadow-sm h-screen p-4 m-4">
            <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-6 mb-10">
                <div class="min-w-full align-middle md:px-6 lg:px-8">
                    <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                        <table v-if="isLoading"
                               class="min-w-full table-fixed divide-y divide-gray-300 border-b border-gray-300 ">
                            <thead class="bg-[#D7D7D7]">
                                <tr class="divide-x divide-solid">
                                <th scope="col"
                                    class="px-3 py-2 text-center uppercase text-[11px] text-gray-900">
                                    Batch Id.
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Item Count
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Total Takeup
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Total Distribution
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    GP Net
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Total Hold
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Total Distributed
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Process Date
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Value Date
                                </th>
                                <th scope="col"
                                    class="px-3 py-2 uppercase text-center text-[11px] text-gray-900">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="item in monitoring" class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap px-3 text-center py-2 text-[11px] text-[#3E3E3E]">
                                        {{ item.id }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase  text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ item.item_count }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        48.25
                                    </td>
                                    <td class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        500.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        Redha Al-Ansari Exchange
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ item.status }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        0
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        0
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ $moment(item.created_at).format('MM/DD/YYYY, h:mm:ss a') }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        0
                                    </td>
                                    <td
                                        class="whitespace-nowrap flex uppercase items-center justify-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        <router-link v-if='user.role === "maker"' :to="{name: 'monitoringOutfile', params: {id: item.id}}" target="_blank" class="rounded-full bg-[#F9951E] px-1 py-1">
                                           <ViewIcon />
                                        </router-link>
                                        <div v-else-if="user.role === 'checker'" class="space-x-2">
                                            <button class="rounded-full bg-mid-red px-1 py-1 text-white duration-300 hover:bg-red-600">
                                                <XmarkIcon />
                                            </button>
                                            <button @click="changeStatus(item.id)" class="rounded-full bg-[#F9951E] px-1 py-1 text-white duration-300 hover:bg-[#F77B35]">
                                                <CheckIcon />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-else class="flex items-center justify-center my-10">
                            <half-circle-spinner
                                :size="30"
                                color="#F9951E"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </TabNav>
    </div>
</template>
