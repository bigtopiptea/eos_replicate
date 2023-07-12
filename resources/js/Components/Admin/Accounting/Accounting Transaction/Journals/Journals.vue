<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import ChevUpIcon from "@/Components/Misc/Icons/ChevUpIcon.vue";
import ChevronDownIcon from '../../../../Misc/Icons/ChevronDownIcon.vue';
</script>

<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';


export default {

    name:'Journals',

    components:{
        DropDown,
        EditIcon,
        NormalButton,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
    },

    data() {
        return {
            Journals: [],
            pagination: {
                current_page: 1,
            },

                labels: [
                { label: 'Series' },
                { label: 'Account Type'},
                { label: 'Debit' },
                { label: 'Credit'},
            ],
            SetSelectedParentRow:'',
            JournalsParent: [
                {
                    id: 1,
                    series: '210',
                    account_type: 'Accounts Payable',
                    value: 'AP',
                    debit: 100,
                    credit: 100,
                    isAccordionOpen: false,
                },
                {
                    id: 2,
                    series: '110',
                    value: 'AR',
                    account_type: 'Accounts Receivable',
                    debit: 200,
                    credit: 200,
                    isAccordionOpen: false,
                },
                // Add more journal entries as needed
            ],
            JournalsChild: [
            {
                id: 1,
                parentId: 1,
                series: 'Series 1',
                account_type: 'Account Type 1',
                debit: 100,
                credit: 100,
            },
            // Add more child journal entries as needed
            ],
        }
    },
    methods: {
        async getJournals() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.Journals = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
            toggleAccordion(SetSelectedParentRow) {
            const parentJournal = this.JournalsParent.find(journal => journal.id === SetSelectedParentRow);
            if (parentJournal) {
                parentJournal.isAccordionOpen = !parentJournal.isAccordionOpen;
            }

            // Toggle accordion for child entries associated with the parent
            const childJournals = this.JournalsChild.filter(journal => journal.parentId === SetSelectedParentRow);
            childJournals.forEach(childJournal => {
                childJournal.isAccordionOpen = parentJournal.isAccordionOpen;
            });
            },
        },
        computed: {
            filteredJournalsChild() {
                return function (SetSelectedParentRow) {
                return this.JournalsChild.filter(child => child.parentId === SetSelectedParentRow);
                };
            },
        },

    }
</script>

<template>
 <div class="w-full h-auto bg-white px-3 py-5  ">
    <div class="inline-block min-w-full align-middle">
        <div class="flex justify-between h-full min-w-full ">
            <div class="flex justify-start flex-col space-x-3">
                <div class="flex items-end gap-3 left-side-col-1">
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
                </div>
            </div>
            <div class="right-side mt-[5px]">
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
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                </form>
            </div>
        </div>
    </div>
    {{ SetSelectedParentRow }}
    <div class="min-w-full py-3  align-middle ">
        <div class="relative h-[360px]">
            <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                        <tr class="divide-x divide-gray-200">
                            <th v-for="label in labels" :key="label.label" scope="col"
                            class="py-1 px-2 uppercase tracking-wider text-center text-gray-900 ">
                            {{ label.label }}
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] ">
                        <tr v-for="journal in JournalsParent" :key="journal.id" class="divide-x divide-gray-200">
  <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
    {{ journal.series }}
  </td>
  <td class="whitespace-nowrap text-left uppercase py-1 px-2 tracking-wider w-3/4">
    {{ journal.account_type }}
  </td>
  <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
    {{ journal.debit }}
  </td>
  <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
    {{ journal.credit }}
  </td>
  <td>
    <button @click="toggleAccordion(journal.id)">
      <ChevUpIcon v-if="!journal.isAccordionOpen" />
      <ChevronDownIcon v-if="journal.isAccordionOpen" />
    </button>
  </td>
</tr>
<tr v-for="child in filteredJournalsChild(SetSelectedParentRow)" :key="child.id" class="accordion-row">
  <td colspan="5" class="py-4">
    <!-- Accordion content for child entries -->
    <div>
      {{ child.series }}
    </div>
    <div>
      {{ child.account_type }}
    </div>
    <div>
      {{ child.debit }}
    </div>
    <div>
      {{ child.credit }}
    </div>
  </td>
</tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getJournals()" :pagination="pagination"
        :offset="1" class="mt-8" />
</div>
</template>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(20px);
    opacity: 0;
}
</style>
