<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue"
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue"
import Accordion from "@/Components/Misc/Accordion.vue"
import DateInput from "@/Components/Misc/Input/DateInput.vue"
import InputGroupSelectMenu from '@/Components/Misc/Select Menu/InputGroupSelectMenu.vue'
import TabNav from '@/Components//Misc/Tabs/TabNav.vue'
import Tab from '@/Components/Misc/Tabs/Tab.vue'
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
import CollectionDetailedTable from "../Table/CollectionDetailedTable.vue"
import JournalEntryTable from '../Table/JournalEntryTable.vue'
import CollectionPaymentHistory from '../Table/CollectionPaymentHistory.vue'
export default{
    components:{
        InputGroup,
        InputTextarea,
        Accordion,
        BorderButton,
        DateInput,
        InputGroupSelectMenu,
        Tab, TabNav,
        LoadingIcon,
        XMarkIcon,
        ProgressIcon,
        CollectionDetailedTable,
        JournalEntryTable,
        CollectionPaymentHistory
    },

    data() {
        return {
            labels:[
                {label:'ACCOUNT TITLE'},
                {label:'BRANCH'},
                {label:'SERVICES'},
                {label:'DEBIT'},
                {label:'CREDIT'},
                {label:'VAT RATE'},
                {label:'INPUT TAX (DR.)'},
                {label:'ATC'},
                {label:'EWT RATE'},
                {label:'W/TAX -EXPANDED (CR)'},
            ],
            paymentOptions:[
                {name:'CREDIT TO BANK'},
                {name:'CASH'},
            ],
            bankOptions:[
                {name:'BDO'},
                {name:'BPI'},
                {name:'UNION BANK'},
                {name:'CHINA BANK'},
                {name:'LAND BANK'},
            ],
            attachmentOpen: false,
            paraIcon: 'FIND',
            selected: "Payment Details",
        }
    },
    methods:{
        attachmentToggle() {
            this.attachmentOpen = false;
        },
        setSelected(tab) {
            this.selected = tab;
        },
    }
}
</script>
<template>
    <div class="bg-white">
        <TabNav :tabs="['Payment Details' , 'Payment History']" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white border-[#EE3E2C]'">
            <Tab :isSelected="selected === 'Payment Details'" >
                <div class="container flex flex-col w-full h-auto bg-white py-4 ">
                    <div class="px-4">
                        <div>
                            <form class="flex flex-col gap-3 py-[20px]">
                                <div class="flex w-full gap-3 gap-y-3">
                                    <!-- Row 1 -->
                                    <div class="w-[24%] mb-3 flex flex-col gap-3">
                                        <div>
                                            <InputGroup :inputLabel="'settelement date'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputType="'date'"/>
                                        </div>
                                        <div>
                                            <InputGroup :inputLabel="'amount to pay'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                                        </div>
                                        <div>
                                            <InputGroupSelectMenu :label="'mode of payment'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :options="paymentOptions"/>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3 w-[30%]">
                                        <div class="w-full">
                                            <InputGroup inputLabel="client name" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                                        </div>                                   
                                        <div class="font-light text-[10px] text-black w-full h-7 p relative">
                                            <label for="name" class="absolute uppercase inline-flex items-center h-full  px-2 text-left">
                                                Remarks
                                            </label>
                                            <input type="text" class="uppercase bg-white h-full pl-[70px] py-1 pr-1 focus:z-10 border border-gray-300 text-[#3E3E3E] text-left disabled:bg-[#EAEAEA] focus:border-collapse w-full">
                                        </div>                            
                                        <div>
                                            <InputGroupSelectMenu :label="'bank name'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :options="bankOptions"/>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3 w-[23%]">
                                        <div>
                                            <InputGroup  :inputLabel="'total item count'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                                        </div>
                                        <div>
                                            <InputGroup :inputLabel="'total amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                                        </div>
                                        <div>
                                            <InputGroup :inputLabel="'penalty'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3 w-[23%]">
                                        <div>
                                            <InputGroup  :inputLabel="'soa no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                                        </div>
                                        <div>
                                            <InputGroup :inputLabel="'total payment'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                                        </div>
                                        <div>
                                            <InputGroup :inputLabel="'outstanding bal.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center  gap-[15px] w-[60%]">
                                    <div class="flex justify-between items-center border-2 border-[#EAEAEA] p-3 w-[60%]">
                                        <div>
                                            <p class="uppercase text-gray-500 text-[12px]">proof of payment</p>
                                        </div>
                                        <div class="flex flex-col items-center border-2 border-dotted border-[#7F7F7F] rounded-md py-2 px-[20px]">
                                            <div class="text-center text-[10px] mb-[5px]">
                                                <p>DRAG IMAGE HERE<br>OR</p>
                                                <div class="flex items-center justify-center cursor-pointer">
                                                    <BorderButton :buttonLabel="'browse'" :buttonSize="'h-auto w-[100px]'" :buttonTextColor="'text-[#EE3E2C]'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2c]'" :buttonPadding="'px-4 py-1'" :buttonTextSize="'text-[10px]'"/>
                                                    <input class="absolute w-[100px] opacity-0" type="file">
                                                </div>
                                            </div>
                                            <div class="text-center text-[10px]">
                                                <p>
                                                    MAX FILE SIZE:
                                                    <span class="font-bold">10MB</span><br>
                                                    SUPPORTED FILE TYPES:
                                                    <span class="font-bold">JPEG, JPG, PNG</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-[35%]">
                                        <div class="flex justify-between mb-1">
                                            <div class="flex items-center text-[10px]">
                                                <LoadingIcon></LoadingIcon>
                                                <span class="text-blue-700">deposit_slip.jpg</span>
                                            </div>
                                            <div class="cursor-pointer">
                                                <XMarkIcon></XMarkIcon>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <ProgressIcon :progressHeight="'h-[5px]'"></ProgressIcon>
                                        </div>
                                        <div class="flex justify-between text-[10px] mb-3">
                                            <div>
                                                <p>
                                                    <span>0.5 MB</span>
                                                    of
                                                    <span>1 MB</span>
                                                </p>
                                            </div>
                                            <div class="text-#194E72">
                                                <p>UPLOADING...
                                                    <span>50%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  
                    <!-- Accordion -->
                    <Accordion sectiontitle="Detailed" :setOpen=true>
                        <CollectionDetailedTable/>                   
                    </Accordion>
                    
                    <!-- Accordion -->
                    <Accordion sectiontitle="JOURNAL ENTRY" :setOpen=true>
                        <JournalEntryTable/>
                    </Accordion>
                </div>
            </Tab>
            <Tab :isSelected="selected === 'Payment History'">
                <CollectionPaymentHistory/>
            </Tab>
        </TabNav>
    </div>

</template>
