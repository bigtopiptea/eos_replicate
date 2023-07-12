    <script>
    import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
    import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
    import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
    import TextAreaGroup from '@/Components/Misc/Input/TextAreaGroup.vue';
    import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
    import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
    import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
    import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
    import DateInput from "@/Components/Misc/Input/DateInput.vue";
    import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
    import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
    import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
    import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue';
    import FloatingLabelInput from '@/Components/Misc/Input/FloatingLabelInput.vue';
    import CheckboxSelectMenu from '../../../../../Misc/Select Menu/CheckboxSelectMenu.vue';
    import AdvanceSettingsSelectMenu from '../../../../../Misc/Select Menu/AdvanceSettingsSelectMenu.vue';
    import EditIcon from '../../../../../Misc/Icons/EditIcon.vue';



    export default {

        name:'Recon History',

        components:{
            ChevRightIcon,
            DropDown,
            NormalButton,
            BorderButton,
            InputGroup,
            SearchIcon,
            InputLabel,
            DateInput,
            Pagination,
            TextAreaGroup,
            InputGroupSelectMenu,
            Slideover,
            ModalTwo,
            FloatingLabelInput,
            CheckboxSelectMenu,
            AdvanceSettingsSelectMenu,
            EditIcon
        },

        data() {
            return {
                reconHistory: [
                {
                    statementDate: "09/27/2022",
                    txnDate: "09/27/2022",
                    description: "TO BOOK FUND TRANSFER TO ALLBANK SF FROM ALLBANK Padadadada",
                    voucherNo: "-",
                    chequeNo: "-",
                    department: "CMT",
                    debitUSD: "0.00",
                    creditUSD: "0.00",
                    debitPHP: "1,800,000.00",
                    creditPHP: "0.00",
                },
                {
                    statementDate: "09/28/2022",
                    txnDate: "09/28/2022",
                    description: "Some other transaction",
                    voucherNo: "-",
                    chequeNo: "-",
                    department: "CMT",
                    debitUSD: "0.00",
                    creditUSD: "0.00",
                    debitPHP: "2,000,000.00",
                    creditPHP: "0.00",
                },
                // ...
                ],
                    pagination: {
                        current_page: 1,
                    },
                options:[
                    {label:'Hello'},
                    {label:'OPTIMUMBANK WCC SF PHP'},

                ],
                selectedRowIndex: -1,
                openModal:false,

                advanceSettings: [
                    { checked: true, label: "RECON DATE" , value: "RECONCILIATION DATE" },
                    { checked: false, label: "RECONCILED BY" , value: "RECONCILED BY" },
                    { checked: true, label: "STATEMENT DATE" , value: "STATEMENT DATE"  },
                    { checked: true, label: "TXN. DATE" , value: "TRANSACTION DATE"  },
                    { checked: false, label: "VOUCHER NO." , value: "VOUCHER NO." },
                    { checked: false, label: "CHEQUE NO." , value: "CHEQUE NO." },
                    { checked: true, label: "DEPARTMENT" , value: "DEPARTMENT" },
                    { checked: true, label: "DEBIT (USD)" , value: "DEBIT (USD)"  },
                    { checked: true, label: "CREDIT (USD)" , value: "CREDIT (USD)" },
                    { checked: true, label: "DEBIT (PHP)" , value: "DEBIT (PHP)" },
                    { checked: true, label: "CREDIT (PHP)" , value: "CREDIT (PHP)" },
                    { checked: true, label: "ACTIONS" , value: "ACTIONS" },

                ],

            }
        },
        methods: {
                async getreconHistory() {
                    await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                        .then((response) => {
                            console.log(response.data);
                            this.reconHistory = response.data.data;
                            this.pagination = response.data;
                        })
                        .catch((errors) => {

                        })
                    },

                openModalToggle(){
                    this.openModal=false;
                },
                openModaltest(rowIndex) {
                    this.selectedRowIndex = rowIndex;
                    this.test = rowIndex;
                    this.openModal = true;
                },
                removeRow() {
                    if (this.selectedRowIndex !== -1) {
                        this.reconHistory.splice(this.selectedRowIndex, 1);
                        this.selectedRowIndex = -1;
                        this.openModal = false;
                    }
                },
            },
            computed: {
                filteredHeaders() {
      return this.advanceSettings.filter((header) => header.checked);
    },
    filteredReconHistory() {
      return this.reconHistory.map((row) => {
        const filteredRow = {};
        this.filteredHeaders.forEach((header) => {
          if (header.checked) {
            filteredRow[header.value] = row[header.value];
          }
        });
        return filteredRow;
      });
    },
    filteredData() {
      return this.reconHistory.map((row) => {
        const filteredRow = {};
        this.filteredHeaders.forEach((header) => {
          filteredRow[header.value] = row[header.value];
        });
        return filteredRow;
      });
    },
  },

    }
    </script>
    <template>
        <div class="bg-white w-full h-auto px-3 py-5">
            <div class="flex justify-between">
                <div class="flex gap-3">
                    <div class="w-[200px]">
                        <CheckboxSelectMenu :options="options" :buttonHeight="'h-[34px]'" :label="'Account Name'" :placeholder="'Select Account Name'" />
                    </div>
                </div>
                <form class="flex items-start gap-3">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <SearchIcon />
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] font-light block w-full pl-10 p-2.5"
                            placeholder="Search" required />
                        </div>
                        <NormalButton label="Go"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                    </div>
                    <NormalButton label="Export"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E]   tracking-wider text-[10px] font-medium text-white" />
                </form>
            </div>
            <div class="flex items-end gap-3 py-3 w-full">
                <div>
                    <DateInput label="Start Date" />
                </div>
                <div>
                    <DateInput label="End Date" />
                </div>
                <div>
                    <NormalButton label="Filter"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                </div>
                <div class="w-[200px]">
                    <AdvanceSettingsSelectMenu :options="advanceSettings"/>
                </div>
            </div>
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[285px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                <th v-for="(header, index) in filteredHeaders" :key="index" scope="col"
                                    class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                    {{ header.label }}
                                </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr v-for="(row, rowIndex) in reconHistory" :key="rowIndex" class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.statementDate }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.txnDate }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider truncate max-w-[300px]">
                                        {{ row.description }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.voucherNo }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.chequeNo }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.department }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.debitUSD }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.creditUSD }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.debitPHP }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        {{ row.creditPHP }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        <div class="flex justify-center items-center">
                                        <div class="relative">
                                            <button @click="openModaltest(rowIndex)" class="border-2 h-[24px] text-[12px] z-30 w-auto border-[#FB9E30] text-center text-[#FB9E30] hover:text-white hover:bg-[#FB9E30] pr-1 pl-[20px] uppercase whitespace-nowrap">
                                            <EditIcon class="bg-inherit absolute h-4 w-4 top-1 left-1"/>
                                            EDIT
                                            </button>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr v-for="(row, rowIndex) in reconHistory" :key="rowIndex" class="divide-x divide-gray-200">
                                <td v-for="(header, index) in filteredHeaders" :key="index"
                                    v-if="header.checked"
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row[header.value] }}
                                </td>
                                </tr>
                            </tbody> -->
                            <!-- <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr v-for="(row, rowIndex) in filteredReconHistory" :key="rowIndex" class="divide-x divide-gray-200">
                                    <td v-for="(header, index) in filteredHeaders" :key="index"
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row[header.value] }}
                                    </td>
                                </tr>
                            </tbody> -->
                        </table>
                    </div>
                </div>
            </div>
            <Pagination @paginate="getreconHistory()" :pagination="pagination"
        :offset="1" class="mt-8" />
        </div>

        <ModalTwo :show="openModal" @close="openModalToggle" :modalTitle="'EDIT'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'" :iconShow="'EDIT'">
            <div class="flex flex-col justify-center">
                <p class="text-center px-[100px] py-5">
                    Transaction will be tagged as unreconciled item, do you want to proceed?
                </p>
                <div class="flex gap-5 justify-center py-5">
                    <BorderButton @click="openModalToggle" :buttonBorderColor="'border-[#3e3e3e]'"  :buttonTextColor="'text-[#3e3e3e]'" :buttonHover="'hover:bg-[#3e3e3e]'" :buttonLabel="'Cancel'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[100px]'" />
                    <BorderButton @click="removeRow" :buttonLabel="'Proceed'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[100px]'" />
                </div>
            </div>
        </ModalTwo>

    </template>



