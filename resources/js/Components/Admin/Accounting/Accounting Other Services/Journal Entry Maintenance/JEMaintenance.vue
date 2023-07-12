<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import TextAreaGroupMenu from '@/Components/Misc/Input/TextAreaGroupMenu.vue';
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue';
import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import Tags from "@/Components/Misc/Tags/Tags.vue";
import JournalEntries from './Tabs/JournalEntries.vue';
import Maintenance from './Tabs/Maintenance.vue';
export default {

    name:'JE Maintenance',

    components:{
        NormalButton,
        SearchIcon,
        Tab,
        TabNav,
        BorderButton,
        TextAreaGroupMenu,
        InputGroupSelectMenu,
        CheckboxSelectMenu,
        Slideover,
        Tags,
        JournalEntries,
        Maintenance
    },

    data(){
        return {
            selected: "Journal Entry",
            addFormulaSelected: "Use Existing",
            sampleOption:[
                {label: 'OPTION 1'},
                {label: 'OPTION 2'},
                {label: 'OPTION 3'},
            ],
            remarksOption:[
                {label: 'remarks templates'},
                {label: 'create new template'},
            ],
            tagList:[
                {label: 'gross_amount', color: 'bg-[#3e3e3e]'},
                {label: 'amount', color: 'bg-[#3e3e3e]'},
                {label: 'process_date', color: 'bg-[#3e3e3e]'},
                {label: 'txn_date', color: 'bg-[#3e3e3e]'},
                {label: 'from_ccy', color: 'bg-[#3e3e3e]'},
                {label: 'to_ccy', color: 'bg-[#3e3e3e]'},
                {label: 'currency', color: 'bg-[#3e3e3e]'},
                {label: 'net_amount', color: 'bg-[#3e3e3e]'},
                {label: 'handling_fee', color: 'bg-[#3e3e3e]'},
                {label: 'value_date', color: 'bg-[#3e3e3e]'},
                {label: 'provider', color: 'bg-[#3e3e3e]'},
                {label: 'tieup_partner', color: 'bg-[#3e3e3e]'},
                {label: 'bank', color: 'bg-[#3e3e3e]'},
                {label: 'biller', color: 'bg-[#3e3e3e]'},
                {label: 'maker', color: 'bg-[#3e3e3e]'},
                {label: 'verifier', color: 'bg-[#3e3e3e]'},
                {label: 'approver', color: 'bg-[#3e3e3e]'},
                {label: 'item_count', color: 'bg-[#3e3e3e]'},
                {label: 'reference_no', color: 'bg-[#3e3e3e]'},
                {label: 'rate', color: 'bg-[#3e3e3e]'},
            ],
            useExistingLabels:[
                {label: 'ID'},
                {label: 'FORMULA'},
            ],
            createNewLabels:[
                {label: 'VALUE'},
                {label: 'OPERATOR'},
                {label: 'SOURCE'},
            ],
            operatorOptions:[
                {label: '('},
                {label: ')'},
                {label: '+'},
                {label: '-'},
                {label: '*'},
                {label: '/'},
            ],
            sourceOptions:[
                {label: 'GROSS AMOUNT'},
                {label: '0.12'},
                {label: '1.12'},
                {label: '2'},
            ],
            selectedRemarksOption: '',
            remarksTemplateOpen: false,
            createTemplateOpen: false,
            addFormulaOpen: false,
            newFormulaCount: 1,
            addedTags: [],
            remarks: "",
        }
    },
    methods: {
        remarksTemplateToggle() {
            this.remarksTemplateOpen = false;
            this.selectedRemarksOption = '';
        },
        createTemplateToggle() {
            this.createTemplateOpen = false;
            this.selectedRemarksOption = '';
        },
        addTag(tag) {
            const existingTag = this.addedTags.find(t => t.label === tag);
            if (!existingTag) {
                this.addedTags.push({ label: tag, color: this.getTagColor(tag) });
            }
        },
        getTagComponent(label, bgColor) {
            return `<Tags :label="'${label}'" :bgColor="'${bgColor}'"/>`;
        },
        getTagColor(label) {
            const tag = this.tagList.find(tag => tag.label === label);
            return tag ? tag.color : '';
        },
        addFormulaToggle() {
            this.addFormulaOpen = false;
        },
        setSelected(tab) {
            this.selected = tab;
        },
        addFormulaSetSelected(tab) {
            this.addFormulaSelected = tab;
        },
        handleOptionSelected(label) {
            console.log('Selected option:', label);
            this.selectedRemarksOption = label;
        },
        addNew(){
            this.newFormulaCount++;
        }
    }
}
</script>
<template>
    <div class="w-full h-auto bg-white">
        <div class="p-[20px]">
            <div class="flex flex-col gap-[20px] w-[37%]">
                <div class="flex flex-col gap-[10px] ">
                    <InputGroupSelectMenu :label="'department'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select department'" :isRequired="true" :options="sampleOption"/>
                    <InputGroupSelectMenu :label="'client name'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select client name'" :isRequired="true" :options="sampleOption"/>
                    <InputGroupSelectMenu :label="'module'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select module'" :isRequired="true" :options="sampleOption"/>
                    <InputGroupSelectMenu :label="'provider'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select/search provider'" :options="sampleOption"/>
                    <InputGroupSelectMenu :label="'account name'"  :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :placeholder="'select account name'" :isRequired="true" :options="accountOption"/>
                    <div class="flex justify-between text-[10px] w-full h-7 whitespace-nowrap">
                        <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA] text-[10px] w-[41.5%]">
                            entry type
                            <span class="ml-1 text-red-500">*</span>
                        </label>
                        <div class="flex justify-between w-[57%]">
                            <div class="flex items-center gap-[3px]">
                                <input type="radio" id="debit" name="entry-type">
                                <label class="uppercase" for="debit">debit</label>
                            </div>
                            <div class="flex items-center gap-[3px]">
                                <input type="radio" id="credit" name="entry-type">
                                <label class="uppercase" for="credit">credit</label>
                            </div>
                            <div>
                                <BorderButton @click="(addFormulaOpen = !addFormulaOpen)" :buttonLabel="'add formula'" :buttonPadding="'p-1'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <TextAreaGroupMenu @option-selected="handleOptionSelected" :inputLabel="'REMARKS'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :placeholder="'ENTER REMARKS'" :isRequired="true" :options="remarksOption"/> 
                    </div>
                </div>
                <div class="flex justify-between ">
                    <div>
                        <BorderButton :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[12px]'" :buttonSize="'h-auto w-[170px]'"/>
                    </div>
                    <div>
                        <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[12px]'" :buttonSize="'h-auto w-[170px]'"/>
                    </div>
                </div>
            </div>
        </div>
        <TabNav :tabs="['Journal Entry' , 'Maintenance']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Journal Entry'" >
                <div class="w-full h-auto">
                    <JournalEntries/>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Maintenance'" >
                <div class="w-full h-auto">
                    <Maintenance/>
                </div>
            </Tab>
        </TabNav>
    </div>
    <!-- REMARKS TEMPLATE -->
    <Slideover :show="(remarksTemplateOpen, selectedRemarksOption == 'remarks templates')" @close="remarksTemplateToggle" :title="'REMARKS TEMPLATE'">
        <div class="flex flex-col justify-between h-full px-[20px] py-[15px]">
            <div class="flex flex-col gap-[50px]">
                <div class="flex">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <SearchIcon />
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] font-light block w-full pl-10 p-2.5"
                        placeholder="Search keyword" required />
                    </div>
                    <NormalButton label="Go"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                </div>
                <div class="flex flex-col gap-[15px]">
                    <div class="bg-[#d7d7d7] p-2 text-justify text-[10px]">
                        <p>Representing incoming remittance transactions value dated 
                            <span class="text-cyan-600">[value_date]</span> for 
                            <span class="text-cyan-600">[item_count]</span> item(s) totalling peso value of 
                            <span class="text-cyan-600">[to_currency] [gross_amount]</span>
                        </p>
                    </div>
                    <div class="bg-[#d7d7d7] py-2 px-3 text-justify text-[10px]">
                        <p>
                            Representing uploaded transactions to 
                            <span class="text-cyan-600">[bank]</span> for the incoming remittance received from tie up with 
                            <span class="text-cyan-600">[item_count]</span> item(s) amounting to 
                            <span class="text-cyan-600">[currency] [gross_amount]</span> dtd 
                            <span class="text-cyan-600">[txn_date]</span> 
                        </p>
                    </div>
                    <div class="bg-[#d7d7d7] py-2 px-3 text-justify text-[10px]">
                        <p>
                            Representing processing fees for 
                            <span class="text-cyan-600">[item_count]</span> item(s) with the total handling cost of received from tie up with 
                            <span class="text-cyan-600">[total_hcost]</span> for transactions received from 
                            <span class="text-cyan-600">[tie_up]</span> 
                        </p>
                    </div>
                    <div class="bg-[#d7d7d7] py-2 px-3 text-justify text-[10px]">
                        <p>
                            To book request for Cash Management to fund advances to
                            <span class="text-cyan-600">[bank]</span> for settlement of our day transactions amounting to 
                            <span class="text-cyan-600">[from_currency] [gross_amount]</span> with
                            <span class="text-cyan-600"> [item_count]</span> item(s) dtd
                            <span class="text-cyan-600">[txn_date]</span>
                        </p>
                    </div>
                    <div class="bg-[#d7d7d7] py-2 px-3 text-justify text-[10px]">
                        <p>
                            Responding to the request of operation for funding of today's remittance transaction for
                            <span class="text-cyan-600">[bank]</span> amounting to
                            <span class="text-cyan-600">[currency] [gross_amount]</span> with
                            <span class="text-cyan-600">[item_count]</span> items
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-[50px]">
                <BorderButton @click="remarksTemplateToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                <BorderButton :buttonLabel="'USE TEMPLATE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[13px]'"/>
            </div>
        </div>
    </Slideover>

    <!-- CREATE REMARKRKS TEMPLATE -->
    <Slideover :show="(createTemplateOpen, selectedRemarksOption == 'create new template')" @close="createTemplateToggle" :title="'CREATE NEW TEMPLATE'">
        <div class="flex flex-col justify-between h-full px-[20px] py-[15px]">
            <div class="flex flex-col gap-[20px]">
                <div class="relative text-[12px]">
                    <label for="remarks" class="absolute -top-[7px] left-[15px] bg-white px-[5px] font-bold">REMARKS</label>
                    <textarea class="w-full border-2 rounded-md p-3 resize-none" name="remarks" cols="30" rows="10" v-model="remarks"></textarea>
                    <div class="tags-container">
                        <Tags v-for="tag in addedTags" :key="tag.label" :label="tag.label" :bgColor="tag.color" :withButton="true"/>
                    </div>
                </div>
                <div  class="flex justify-between flex-wrap gap-y-[15px] border-2 rounded-md p-3 relative">
                    <label for="remarks" class="absolute -top-[10px] left-[15px] bg-white text-[12px] px-[5px] font-bold">TAGS</label>
                    <Tags @click="addTag(tag.label)" v-for="tag in tagList" :key="tag.label" :label="tag.label" :bgColor="tag.color">
                        <span v-html="getTagComponent(tag.label, tag.color)"></span>
                    </Tags>
                </div>
            </div>
            <div class="flex justify-center gap-[50px]">
                <BorderButton @click="createTemplateToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                <BorderButton :buttonLabel="'USE TEMPLATE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[13px]'"/>
            </div>
        </div>
    </Slideover> 
    
    <Slideover :show="addFormulaOpen" @close="addFormulaToggle" :title="'ADD FORMULA'">
        <div class="flex flex-col justify-between h-full pb-[30px]">
            <div class="flex flex-col justify-center items-center h-auto w-full">
                <TabNav :tabs="['Use Existing' , 'Create New']" :selected="addFormulaSelected" @selected="addFormulaSetSelected">
                    <Tab :isSelected="addFormulaSelected === 'Use Existing'" class="w-full">
                        <div class="w-full h-auto p-[30px]">
                            <table class="w-full divide-y divide-gray-300 border">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0 border">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in useExistingLabels" :key="label.label" scope="col"
                                            class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                            <input type="radio" name="id" id="item1">
                                            <label for="item1">1</label>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            GROSS AMOUNT
                                        </td>                     
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </Tab>
                    <Tab :isSelected="addFormulaSelected === 'Create New'" class="w-full">
                        <div class="flex flex-col  w-full h-auto p-[30px]">
                            <div class="flex justify-end mb-[5px]">
                                <BorderButton @click="addNew()" :buttonLabel="'ADD MORE'" :buttonPadding="'p-1'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-auto'"/>
                            </div>
                            <!-- overflow-auto max-h-[250px] -->
                            <div class="mb-[30px]">
                                <table class="w-full divide-y divide-gray-300 border">
                                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0 border z-50">
                                        <tr class="divide-x divide-gray-200">
                                            <th v-for="label in createNewLabels" :key="label.label" scope="col"
                                                class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                                {{ label.label }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                        <tr v-for="(item, id) in newFormulaCount" :key="id" class="divide-x divide-gray-200">
                                            <td
                                                class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                                {{ item }}
                                            </td>
                                            <td
                                                class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                                <CheckboxSelectMenu :inputWidth="'w-12/12'"  :placeholder="'SELECT'" :options="operatorOptions" :showBorder="'border-0'"/>
                                            </td>                     
                                            <td
                                                class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                                <CheckboxSelectMenu :inputWidth="'w-12/12'"  :placeholder="'SELECT source'" :options="sourceOptions" :showBorder="'border-0'"/>
                                            </td>                     
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="relative p-3 border-2 border-dashed border-[#d7d7d7] rounded-md text-[12px]">
                                <p class="absolute -top-[10px] left-[8px] bg-white px-[5px] font-bold">FORMULA</p>
                                <div class="uppercase">
                                    <h1 class="text-[#ff0000]">((Gross amount/2)/1.12)*0.12</h1>
                                </div>
                            </div>
                        </div>
                    </Tab>
                </TabNav>
            </div>
            <div class="flex justify-between px-[30px]">
                <BorderButton @click="slideoverToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[13px]'"/>
            </div>
        </div>
    </Slideover>
</template>
<style>
.tags-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
  padding: 10px;
}

.tags-container > * {
  display: inline-block;
  margin-right: 5px;
}
</style>