<script setup>
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>
<script>
import SwitchToggle from "@/Components/Misc/Switch(Toggle)/SwitchToggle.vue";
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue'
import Slideover from '@/Components/Misc/Slideover/Slideover.vue'
import DropdownNoLabel from '@/Components/Misc/Input/DropdownNoLabel.vue'
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import FloatingLabelDropdown from '@/Components/Misc/Input/FloatingLabelDropdown.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';


export default {
    components:{
        SearchIcon,
        NormalButton,
        BorderButton,
        ListIcon,
        SwitchToggle,
        Slideover,
        DropdownNoLabel,
        Pagination,
        FloatingLabelDropdown,
    },

    data() {
        return {
            SetUpFromTieUp: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'ID'},
                {label:'transaction option'},
                {label:'BANK NAME/BILLER NAME'},
                {label:'BANK ENROLLED'},
                {label:'DA'},
                {label:'WDRWL'},
                {label:'DATE updated'},
                {label:'updated BY'},
                {label:'ACTIONS'},
            ],

            allTieUpPartners:['All Tie Up Partners','Option1','Option2','Option3'],
            AddNewOpen: false,
            paraIcon:'CHECK', //Icon Parameter
        }
    },
    methods: {
        // Slider
        AddNewToggle(){
            this.AddNewOpen = false;
        },
        async getSetUpFromTieUp() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.SetUpFromTieUp = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="h-auto w-full bg-white">
        <div class="flex flex-col min-w-full pt-7 pb-5 px-[25px]">
            <div class="w-[35%] pb-3">
                <FloatingLabelDropdown :inputLabel="'Tie-up'" :inputWidth="'w-full'" :inputColor="'bg-white'" :options="allTieUpPartners" />
            </div>
            <div class="flex justify-between items-center">
                <div class="flex w-[40%]">
                    <div class="w-full">
                        <form class="flex items-start">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                                    placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                        </form>
                    </div>
                </div>
                <div>
                    <BorderButton :buttonLabel="'ADD NEW'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[120px]'" :buttonStyle="'border-2 border-#F9951E text-#F9951E text-[13px]'" @click="(AddNewOpen = !AddNewOpen)"/>
                </div>
            </div>
        </div>

        <!-- TABLE-->
        <div class="overflow-hidden px-[25px]">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    {{label.label}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    01
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    CBA - CREDIT TO BANK ACCOUNT
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    BANCO DE ORO
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <DropdownNoLabel/>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" value="">
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 09:17:18 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="py-6">
            <Pagination @paginate="getSetUpFromTieUp()" :pagination="pagination"
            :offset="1" class = ""/>
        </div>

    </div>

    <Slideover :show="AddNewOpen" @close="AddNewToggle" :title="'Add New'">
        <div class="flex flex-col justify-between h-full pb-[20px]">
            <div class="mx-10 h-auto">
                <div class="mt-[30px]">
                    <div>
                        <InputGroup :inputType="'text'" :inputLabel="'total count'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                    <div>
                        <InputGroup :inputType="'text'" :inputLabel="'total amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[100px]">
                <div class="flex flex-col gap-[25px] text-center text-[14px] uppercase whitespace-normal leading-3">
                    <p>CLICK <span class="font-bold">‘CONFIRM’</span>  TO PROCEED</p>
                    <p>AND <span class="font-bold">'CANCEL'</span> TO REVERT.</p>
                </div>
                <div class="flex justify-center gap-[100px] border-black">
                    <SolidButton @click="(endDayReportOpen = !endDayReportOpen)" :buttonLabel="'CANCEL'" :buttonTextSize="'text-[15px]'"/>
                    <SolidButton :buttonLabel="'CONFIRM'" :buttonTextSize="'text-[15px]'" :buttonStyle="'bg-[#F9951E]'"/>
                </div>
            </div>
        </div>
    </Slideover>
</template>
