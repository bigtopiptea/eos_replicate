<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    props:{
        Supplier:{
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
            PaymentToSuppliers: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'CMT REFERENCE NO.'},
                {label:'DATE OF ENTRY'},
                {label:'SUPPLIER'},
                {label:'BANK'},
                {label:'AMOUNT'},
                {label:'REMARKS'},
            ],
        }
    },    
    methods: {
        async getPaymentToSuppliers() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.PaymentToSuppliers = response.data.data;
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
        <h2 class="text-[16px] text-center font-semibold">{{ Supplier }}</h2>
        <div class="text-center mt-[20px]">
            <h3 class="text-[13px] font-semibold">SUCCESSFUL PAYMENT TO SUPPLIERS</h3>
            <p class="text-[12px]">{{ StartDate }} -  {{ EndDate }}</p>
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
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                <a class="underline text-cyan-500" href="#">
                                    CMT-000000003
                                </a>
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                09/28/2022 10:55:09 aM
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                WE HAVE EVERYTHING DISTRIBUTOR
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                BANCO DE ORO
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                25,500.00
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                PAYMENT TO WE HAVE EVERYTHING SUPPLIER
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="text-[11px] font-semibold bg-[#D7D7D7]">
                        <tr>
                            <td colspan="4" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">TOTAL PAYMENT</td>
                            <td colspan="2" class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">91,450.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getPaymentToSuppliers()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>