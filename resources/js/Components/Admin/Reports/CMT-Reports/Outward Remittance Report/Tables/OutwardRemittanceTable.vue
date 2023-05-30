<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    name: 'Revenue Report',
    components: {
        Pagination
    },
    props:{
        Remitter:{
            type: String,
            default: ''
        },
        Country:{
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
    data() {
        return {
            OutwardRemittance: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'TRANSACTION DATE'},
                {label:'REFERENCE NO.'},
                {label:'REMITTER BANK'},
                {label:'ACCOUNT NO.'},
                {label:'REMITTER NAME'},
                {label:'ACCOUNT'},
                {label:'RATE'},
                {label:'PHP'},
                {label:'BENEFICIARY BANK'},
                {label:'BENEFICIARY NAME'},
                {label:'ACCOUNT NAME'},
                {label:'COUNTRY'},
                {label:'PURPOSE'},
                {label:'NATURE OF BUSINESS/WORK'},
                {label:'DATE OF INCORPORATION'},
            ],

        }
    },
    methods: {
        async getOutwardRemittance() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.OutwardRemittance = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

    },
}
</script>
<template>
    <div class="flex flex-col h-auto">
        <div class="flex flex-col justify-between uppercase mb-[30px]">
            <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
            <div class="flex flex-col gap-[15px] text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">
                    OUTWARD REMITTANCE REPORT: <br>
                    <span class="font-normal uppercase">{{ Remitter }}</span>
                </h3>
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
                                    class="py-1 px-2 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    TRD-050622-5
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    banco de oro
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    002860255555
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    vertex entertainment and resorts corp.
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    114,583.34
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    52.58
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    6,024,792.017
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    CHINABANKING CORP.
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    PRIME ASSET VENTURES INC.
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    104052000157
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    philippines
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    Payment for loan amortization
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    General Services
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    06/26/2018
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getOutwardRemittance()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>