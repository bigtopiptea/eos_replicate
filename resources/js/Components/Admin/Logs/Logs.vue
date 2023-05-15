<script>
import FloatingLabelDropdown from '../../Misc/Input/FloatingLabelDropdown.vue';
import BorderButton from '../../Misc/Buttons/BorderButton.vue';
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import DropdownCheckbox from '../../Misc/Dropdown/DropdownCheckbox.vue';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    components:{
        FloatingLabelDropdown, BorderButton, DateInput, NormalButton,
        DropdownCheckbox, Pagination
    },
    data(){
        return{
            RevenueReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'TIME'},
                {label:'USER'},
                {label:'ROLE'},
                {label:'ACTIVITY'},
            ],
            application:[
                'EOS',
                'SOPHIA',
            ],
            userType:[
                'ALL USERS',
                'ALFARO, LECEL PEREZ',
                'ASIS, GINALYN IBARRA',
                'BANARIA, JEFFRET CLEDORIO',
                'CUENTA, ARNIE LAMBOJO',
                'DIAZ, NELLA MARIE TINIO',
                'DUPAYA, JOEREN TITO VIERNES',
                'LEMITA, ANGELOU CRUZ',
                'RANOLA, SHEILA MARIE'
            ],
            logType:[
                'ALL LOG TYPES',
                'LOGIN',
                'PROCESS',
                'VERIFY',
                'APPROVE',
                'AMMENDMENT',
                'CHANGE / UPDATE',
                'TRADING: BUY',
                'TRADING: SELL',
            ],
        }
    },

    methods: {
        async getLogs() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.Logs = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

        // async getRate(){
        //     await axios.get('/api/rates/cmt/list')
        //         .then((response) => {
        //           this.rates = response.data;
        //         })
        //         .catch((errors) => [
        //         ])
        // },
    },
}
</script>
<template>
    <div class="h-screen bg-white w-full px-3 py-5">
        <div class="flex flex-col gap-[15px] ">
            <div class="flex justify-between w-full">
                <div class="flex items-end gap-[10px] w-[60%]">
                    <div class="w-[25%]">
                        <FloatingLabelDropdown :inputLabel="'application'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :options="application" :placeholder="'SELECT APPLICATION'"/>
                    </div>
                    <div class="w-[40%]">
                        <DropdownCheckbox :label="'USER'" :placeholder="'SELECT USER(S)'" :options="userType"/>
                    </div>
                    <div class="w-[35%]">
                        <DropdownCheckbox :label="'LOG TYPE'" :placeholder="'SELECT TYPE OF LOGS'" :options="logType"/>
                    </div>
                </div>
                <div>
                    <BorderButton :buttonLabel="'EXPORT'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[120px]'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextSize="'text-[13px]'" :buttonTextColor="'text-#3E3E3E'" :buttonHover="'hover:bg-[#3E3E3E]'"/>
                </div>
            </div>
            <div class="flex gap-3 items-end">
                <div>
                    <DateInput label="Start Date" />
                </div>
                <div>
                    <DateInput label="End Date" />
                </div>
                <div>
                    <NormalButton label="Filter"
                    class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                </div>
            </div>
        </div>
        <!-- TABLE -->
        <div class="min-w-full py-5 align-middle ">
            <div class="relative h-[360px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    08:01:39 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    08:01:39 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    operations - maker
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LOGGED IN USING IP ADDRESS:  192.168.68.101
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getLogs()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>
