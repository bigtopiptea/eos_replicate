<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";

export default {
    components:{
        Pagination,
    },
    props:{
        ReportType:{
            type: String,
            default: ''
        },
        StartDate:{
            type: Date,
            default: 'MM/DD/YYYY'
        },
        EndDate:{
            type: Date,
            default: 'MM/DD/YYYY'
        },
    },
    data(){
        return{
            CtrStrReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REPORT TYPE'},
                {label:'REFERENCE NO.'},
                {label:'TRANSACTION'},
                {label:'VOLUME'},
                {label:'RATE'},
                {label:'PHP'},
                {label:'TYPE'},
                {label:'SETTLEMENT'},
                {label:'ACCOUNT NO.'},
                {label:'ADDRESS'},
                {label:'MODE'},
                {label:'REG. DATE'},
                {label:'DEAL SLIP NO.'},
            ],
        }
    },
    methods: {
        async getCtrStrReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CtrStrReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}

</script>
<template>
    <div class="flex flex-col h-auto pb-10">
        <div class="flex flex-col justify-between uppercase mb-[30px]">
            <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
            <div class="text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">{{ ReportType }} REPORT</h3>
                <p class="text-[12px]">{{ StartDate }} -  {{ EndDate }}</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="min-w-full py-2 align-middle ">
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
                                    09/28/2022 12:54:26 PM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CTR
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    TRD-042222-2
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    Petnet
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    90,000.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    52.38
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    4,715,100.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    sell
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    banco de oro
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    ft
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    East office building 114 Aguirre St. Legaspi Village Makati City
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    ft
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01/01/2001
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0001-002950
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getCtrStrReport()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>