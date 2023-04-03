<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-[#1E1E1E] bg-opacity-75 transition-opacity" />
            </TransitionChild>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative transform my-4 overflow-hidden bg-white text-left shadow-xl transition-all w-[846px]">
                            <Title :title="state === 'show' ? 'View Transaction Details' : 'Edit Transaction Details'" />
                            <div class="flex items-center px-6 py-4 w-1/2">
                                <span
                                    class="uppercase  font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">Transaction
                                    Type</span>
                                <span
                                    class="uppercase whitespace-nowrap text-[12px] w-full border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                    {{transaction.transaction_type}}
                                </span>
                            </div>
                            <!-- Remitter Details Start-->
                            <div>
                                <SmallHeading class="whitespace-nowrap w-[250px] pl-10" label="Remitter Details" />
                                <div class="flex items-center px-6 py-4 w-1/2">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">REMITTER
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
<!--                                        DELA CRUZ, JUAN CRUZ-->
                                        {{ transaction.get_remitter.last_name }}, {{ transaction.get_remitter.first_name }}
                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter pb-4">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">MOBILE
                                        NUMBER
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.get_remitter.mobile_number ?? 'N/A' }}
                                    </span>
                                    <div class="mx-6"></div>
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">EMAIL
                                        ADDRESS
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.get_remitter.email ?? '-' }}
                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter pb-4 w-full">
                                    <span
                                        class="uppercase font-bold w-[30%] text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">ADDRESS
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] whitespace-nowrap border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.get_remitter.address ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                            <!-- Remitter Details End-->

                            <!-- Beneficiary Details Start-->
                            <div>
                                <SmallHeading class="w-[250px] whitespace-nowrap pl-10" label="BENEFICIARY DETAILS" />
                                <div class="flex items-center px-6 py-4 w-1/2">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">BENEFICIARY
                                        NAME
                                    </span>
                                    <span
                                        class="uppercase w-full whitespace-nowrap text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
<!--                                        CRUZ, ANNA PEREZ-->
                                        {{transaction.get_beneficiary.last_name}}, {{transaction.get_beneficiary.first_name}}

                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter pb-4">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">MOBILE
                                        NUMBER
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.get_beneficiary.mobile_number ?? 'N/A'}}
                                    </span>
                                    <div class="mx-6"></div>
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">EMAIL
                                        ADDRESS
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.get_beneficiary.email ?? '-'}}
                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter pb-4 w-full">
                                    <span
                                        class="uppercase font-bold w-[30%] text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">ADDRESS
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] whitespace-nowrap border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.get_beneficiary.address ?? 'N/A'}}
                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter pb-4">
                                    <span v-if="state === 'show'"
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">
                                        BANK
                                    </span>

                                    <span v-if="state === 'show'"
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.bank_name }}
                                    </span>

                                    <span v-else class="uppercase w-full text-[12px] py-2 ">
                                        <v-select class="border border-gray-200" :options="banks" label="name" v-model="form.bank"></v-select>
                                    </span>
                                    <div class="mx-6"></div>
                                    <span
                                        class="uppercase font-bold w-full text-[11px] border border-[#EAEAEA] px-2 py-1 bg-white">ACCOUNT
                                        NUMBER
                                    </span>
                                    <span
                                        class="uppercase w-full text-[11px] border border-[#EAEAEA] px-4 py-1 bg-[#ECECEC]">
                                        {{ transaction.account_number }}
                                    </span>
                                </div>
                            </div>
                            <!-- Beneficiary Details End-->

                            <!-- Remittance Details Start-->
                            <div>
                                <SmallHeading class="w-[250px] whitespace-nowrap pl-10" label="REMITTANCE DETAILS" />

                                <div class="flex items-center py-4 px-6 w-1/2">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">CURRENCY
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">USD
                                        - PHP
                                    </span>
                                </div>
                                <div class="flex items-center px-6">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">EQUIVALENT
                                        AMOUNT
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        USD 1,000.00
                                    </span>
                                    <div class="mx-6"></div>
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">LESS:
                                        SERVICE FEE
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        USD 5.00 (PHP 295.00)
                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter py-4">
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">EXCHANGE
                                        RATE
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                        {{ transaction.exchange_rate ? transaction.exchange_rate : 'N/A'}}
                                    </span>
                                    <div class="mx-6"></div>
                                    <span
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">
                                        Net Amount
                                    </span>
                                    <span
                                        class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#F9951E] text-white font-bold">
                                        PHP 58,335.00
                                    </span>
                                </div>
                                <div class="flex items-center px-6 first-letter">
                                    <div class="flex w-full">
                                        <span
                                            class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-white">TOTAL
                                            AMOUNT
                                        </span>
                                        <span
                                            class="uppercase w-full text-[12px] border border-[#EAEAEA] px-4 py-2 bg-[#ECECEC]">
                                            PHP 58,650.00
                                        </span>
                                    </div>

                                    <div v-if="state === 'edit'" class="mx-[1.6rem]"></div>

                                    <span v-if="state === 'edit'"
                                        class="uppercase font-bold w-full text-[12px] border border-[#EAEAEA] px-0 bg-white">
                                        <SelectMenuForModal v-model="form.remarks" placeholder="SELECT REMARKS"
                                            :icon="ChevronDownIconVue" :data="remarks" />
                                    </span>
                                </div>
                            </div>

                            <!-- Remittance Details End-->
                            <div class="text-center space-x-2">
                                <NormalButton label="close" @click="$emit('close')"
                                    class="hover:bg-gray-800 text-white bg-[#3E3E3E] hover:text-white transition ease-in-out delay-150 duration-300 uppercase text-[11px] py-1 px-6 font-semibold border-[3px] tracking-widest border-[#3E3E3E] my-4"
                                />
                                <NormalButton label="save changes" v-if="state === 'edit'" @click="$emit('close')"
                                    class="hover:bg-[#FA9135] text-white bg-[#F9951E] hover:text-white transition ease-in-out delay-150 duration-300 uppercase text-[11px] py-1 px-6 font-semibold border-[3px] tracking-widest border-[#F9951E] my-4"
                                />
                            </div>

                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import ChevronDownIconVue from '../Icons/ChevronDownIcon.vue';
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";

</script>

<script>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Title from '../Section/Title.vue';
import SmallHeading from '../Heading/SmallHeading.vue';
import SelectMenuForModal from '../Select Menu/SelectMenuForModal.vue';
import SelectMenuBanks from '../Select Menu/SelectMenuBanks.vue';
import { Form } from 'vform';
import axios from "axios";
export default {
    name: 'Modal',
    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        Title,
        SmallHeading,
        SelectMenuForModal,
        SelectMenuBanks
    },
    props: {
        state: String,
        transaction: Object,
    },
    data() {
        return {
            form: new Form({
                bank: '',
                remarks: '',
            }),
            open: true,
            remarks: [
                { name: 'ACCOUNT NAME DIFFER' },
                { name: 'ACCOUNT NOT FOUND' },
                { name: 'AMLA FOR APPROVAL, AWAITING FOR DOCUMENTS' },
                { name: 'AMOUNT IS LESS THAN THE EXPECTED AMOUNT' },
                { name: 'CLOSED ACCOUNT' },
                { name: 'CRITICAL AREA' },
                { name: 'DORMANT ACCOUNT' },
                { name: 'FOR VERIFICATION OF PAYMENT MODE' },
                { name: 'INCOMPLETE DETAILS - NO ACCOUNT NUMBER' },
                { name: 'INCOMPLETE DETAILS - NO ADDRESS GIVEN' },
                { name: 'INCOMPLETE DETAILS - NO BANKS DETAILS' },
                { name: 'INCOMPLETE DETAILS - NO BENEFICIARY NAME' },
                { name: 'INVALID ACCOUNT NUMBER' },
                { name: 'INVALID ACCOUNT NUMBER - EXCEEDS 10 DIGITS ACCOUNT NUMBER' },
                { name: 'NO GIVEN REMITTER NAME' },
                { name: 'OUT OF SERVICE AREA' },
                { name: 'RESTRICTED AREA' },
            ],
            banks: [
                { name: 'BANCO DE ORO' },
                { name: 'BANK OF THE PHILIPPINES' },
                { name: 'Union Bank' },

            ],
        }
    },
    methods: {
        editTransaction(){
            this.form.bank = this.transaction.bank_name;
        }
    },
    created() {
        this.editTransaction();
    }
}
</script>
