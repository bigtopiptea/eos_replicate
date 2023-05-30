<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default {
    components: {
        Pagination,
        CheckboxSelectMenu,
    },
    props:{
        TieUpPartner:{
            type: String,
            default: ''
        },
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
    data() {
        return {
            StatusReport: [],
            pagination: {
                current_page: 1,
            },
            labels: [
                { label: "TIE UP" },
                { label: "NO. OF ITEMS" },
                { label: "DOLLAR AMOUNT" },
                { label: "PESO AMOUNT" },
                { label: "HANDLING FEE" },
                { label: "COST" },
                { label: "INCOME" },
            ],
        };
    },
    methods: {
        async getStatusReport() {
            await axios
                .get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.StatusReport = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {});
        },
    },
};
</script>
<template>
    <div class="px-3 py-5 h-auto w-full">
        <div class="flex flex-col h-auto pb-10">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <h2 class="text-[16px] text-center font-semibold">
                    {{ TieUpPartner }}
                </h2>
                <div class="text-center mt-[20px]">
                    <h3 class="text-[13px] font-semibold">{{ ReportType }}</h3>
                    <p class="text-[12px]">{{ StartDate }} - {{ EndDate }}</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="overflow-hidden w-full">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table
                            class="min-w-full divide-y divide-gray-300 overflow-x-scroll"
                        >
                            <thead
                                class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap"
                            >
                                <tr class="divide-x divide-gray-200">
                                    <th
                                        v-for="label in labels"
                                        :key="label.label"
                                        scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900"
                                    >
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white font-light text-[10px]">
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        REDHA AL ANSARI
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        7370
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        REDHA AL ANSARI
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        7370
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                            </tbody>
                            <tbody
                                class="divide-y divide-gray-500 bg-white font-bold text-[10px]"
                            >
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center pr-16 uppercase py-2 px-1 tracking-wider"
                                    >
                                        TOTAL
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        20,827
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="bg-white font-light text-[10px]">
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        REDHA AL ANSARI
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        7370
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        REDHA AL ANSARI
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        7370
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                            </tbody>
                            <tbody
                                class="divide-y divide-gray-500 bg-white font-bold text-[10px]"
                            >
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center pr-16 uppercase py-2 px-1 tracking-wider"
                                    >
                                        TOTAL
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        20,827
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot
                                class="divide-y divide-gray-500 bg-white font-bold text-[10px]"
                            >
                                <tr class="">
                                    <td
                                        class="whitespace-nowrap text-center pr-[23px] uppercase py-2 px-1 tracking-wider"
                                    >
                                        GRAND TOTAL
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        20,827
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,205,170.78
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        184,670,983.49
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        849,551.95
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        412,194.54
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider"
                                    >
                                        3,874.48
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-end w-full gap-3 mb-10">
            <div class="w-[20%]">
                <div class="flex justify-between gap-5 text-[10px] uppercase">
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            Revenue
                        </h1>
                    </div>
                    <div>
                        <p class="font-light whitesp ace-nowrap tracking-wider">
                            2,541,944.60
                        </p>
                    </div>
                </div>
                <div class="flex justify-between gap-5 text-[10px] uppercase">
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            GP
                        </h1>
                    </div>
                    <div>
                        <p class="font-bold whitespace-nowrap tracking-wider">
                            1,216,564.49
                        </p>
                    </div>
                </div>
                <div
                    class="flex justify-between gap-5 text-[10px] uppercase bg-#EAEAEA"
                >
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            TARGET REV
                        </h1>
                    </div>
                    <div>
                        <p class="font-light whitespace-nowrap tracking-wider">
                            2,541,944.60
                        </p>
                    </div>
                </div>
                <div class="flex justify-between gap-5 text-[10px] uppercase">
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            HIT RATE
                        </h1>
                    </div>
                    <div>
                        <p class="font-light whitespace-nowrap tracking-wider">
                            67%
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-[20%] text-left">
                <div class="flex justify-between gap-5 text-[10px] uppercase">
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            YTD REV. TARGET
                        </h1>
                    </div>
                    <div>
                        <p class="font-light whitespace-nowrap tracking-wider">
                            2,541,944.60
                        </p>
                    </div>
                </div>
                <div class="flex justify-between gap-5 text-[10px] uppercase">
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            YTD REVENUE
                        </h1>
                    </div>
                    <div>
                        <p class="font-light whitespace-nowrap tracking-wider">
                            2,541,944.60
                        </p>
                    </div>
                </div>
                <div class="flex justify-between gap-5 text-[10px] uppercase">
                    <div>
                        <h1 class="font-bold whitespace-nowrap tracking-wider">
                            YTD HIT RATE
                        </h1>
                    </div>
                    <div>
                        <p class="font-light whitespace-nowrap tracking-wider">
                            2,541,944.60
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-end px-16">
            <div class="flex flex-col">
                <div class="">
                    <h1 class="text-[11px] text-center uppercase whitespace-nowrap">
                        gerahcel de castro-seneta
                    </h1>
                </div>
                <div class="flex flex-col items-center border-t border-gray-300 w-[200px]">
                    <h1 class="text-[11px] font-bold uppercase tracking-wider whitespace-nowrap">Prepared By</h1>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="">
                    <h1 class="text-[11px] text-center">

                    </h1>
                </div>
                <div class="flex flex-col items-center border-t border-gray-300 w-[200px]">
                    <h1 class="text-[11px] font-bold uppercase tracking-wider whitespace-nowrap">Checked By</h1>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="">
                    <h1 class="text-[11px] text-center">

                    </h1>
                </div>
                <div class="flex flex-col items-center border-t border-gray-300 w-[200px]">
                    <h1 class="text-[11px] font-bold uppercase tracking-wider whitespace-nowrap">Approved By</h1>
                </div>
            </div>

        </div>
    </div>
</template>
