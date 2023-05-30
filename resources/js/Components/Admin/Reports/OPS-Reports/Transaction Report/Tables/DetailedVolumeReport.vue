<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    data() {
        return {
            WaivedReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'PROCESSED DATE'},
                {label:'TIE UP'},
                {label:'ITEM COUNT'},
                {label:'currency'},
                {label:'AMOUNT'},
                {label:'rate'},
                {label:'php AMOUNT'},
                {label:'HANDLING FEE'},
                {label:'COST'},
                {label:'bank'},
                {label:'transaction type'},
                {label:'batch no.'},
            ],

        }
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
        TieUpPartners:{
            type: Array,
            required:false
        }
    },
    methods: {
        async getWaivedReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.WaivedReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="flex flex-col h-auto pb-10 px-3">
        <div class="flex flex-col justify-between uppercase mb-[30px]">
            <h2 class="text-[16px] text-center font-semibold">{{ TieUpPartners }}</h2>
            <div class="text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">{{ ReportType }}</h3>
                <p class="text-[12px]">{{ StartDate }} - {{ EndDate }}</p>
            </div>
        </div>
        <!-- TABLE -->
        <div v-for="items in TieUpPartners" :key="items.TieUpPartners">
            <div class="my-3 uppercase whitespace-nowrap px-3">
                <p class="text-[12px] font-bold">{{ items.name }}</p>
            </div>
            <div class="overflow-hidden w-full">
                <div class="inline-block min-w-full  align-middle ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                        <table class="min-w-full  overflow-x-scroll">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                <tr class="">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" bg-white font-light text-[10px]">
                                <tr>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        09/28/2022 10:55:09 aM
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        <a class="underline text-cyan-500" href="#">
                                            ekte-0001
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        al ektasad united exchange
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        ALFARO, LECEL PEREZ
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        1234567
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        16,114.55
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        16,114.55
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        100.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        100.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        100.00
                                    </td>
                                    <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    100.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        100.00
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class=" bg-white font-bold text-[10px] border-double border-t-4 border-gray-300">
                                <tr>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        REDHA AL ANSARI
                                    </td>
                                    <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    70
                                </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        USD
                                    </td>
                                    <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    30,321.17
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        553.70
                                    </td>
                                    <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    16,114.55
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        100.00
                                    </td>
                                    <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    100.00
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="text-[11px] font-semibold bg-[#D7D7D7]">
                                <tr>
                                    <td colspan="100%" class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        INCOME: 3,874.48
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
