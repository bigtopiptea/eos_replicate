<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    data() {
        return {
            StatusReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'TRANSACTION DATE'},
                {label:'REFERENCE NO.'},
                {label:'TRANSACTION TYPE'},
                {label:'REMITTER LASTNAME'},
                {label:'REMITTER FIRSTNAME'},
                {label:'BENEFICIARY LASTNAME'},
                {label:'BENEFICIARY FIRSTNAME'},
                {label:'BANK BILLER'},
                {label:'NET AMOUNT'},
            ],

        }
    },
    props:{
        TieUp:{
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
    methods: {
        async getMasterlistReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.Masterlist = response.data.data;
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
            <h2 class="text-[16px] text-center font-semibold">{{ TieUp }}</h2>
            <div class="text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">Masterlist Report</h3>
                <p class="text-[12px]">{{ StartDate }} - {{ EndDate }}</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="overflow-hidden w-full px-3">
            <div class="inline-block min-w-full  align-middle ">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                    <table class="min-w-full divide-y divide-gray-300 overflow-x-scroll">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01/01/2022 12:00:05 PM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">                            
                                    <a class="underline text-cyan-500" href="#">
                                        OERI-0001
                                    </a>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BP - BILLS PAYMENT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    DELA CRUZ
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    JUAN 
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    DELA ROSA
                                </td>
                                <td 
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    PEDRO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    SOCIAL SECURITY SYSTEM (SSS)
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    3,500.00
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="text-[11px] font-semibold bg-[#D7D7D7]">
                            <tr>
                                <td colspan="100%" class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                    <div class="flex flex-col items-end">
                                        <div>
                                            <p>
                                                <span class="font-bold">total count: </span>
                                                6 
                                            </p>
                                            <p>
                                                <span class="font-bold">total amount: </span>
                                                12,880.00                                   
                                            </p> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getMasterlistReport()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>

</template>