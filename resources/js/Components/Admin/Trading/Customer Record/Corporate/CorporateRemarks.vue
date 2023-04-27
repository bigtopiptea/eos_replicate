<script>
import InputGroup from '../../../../Misc/Input/InputGroup.vue';
import SmallHeading from '../../../../Misc/Heading/SmallHeading.vue';
import BorderButton from '../../../../Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';
import Accordion from '../../../../Misc/Accordion.vue';
import SwitchToggle from '../../../../Misc/Switch(Toggle)/SwitchToggle.vue';
import FloatingTextArea from '../../../../Misc/Input/FloatingTextArea.vue';
import ModalTwo from '../../../../Misc/Modal/ModalTwo.vue';
export default{
    components:{
        SmallHeading, BorderButton, Accordion,
        InputGroup, SolidButton, SwitchToggle,
        FloatingTextArea, ModalTwo
    },
    data(){
        return{
            viewModalOpen: false,
        }
    },
    methods:{
        // Modal
        viewModalToggle() {
          this.viewModalOpen = false;
        },
    }
}
</script>
<template>
    <div class="my-[30px]">
        <!-- Table -->
        <div class="mb-5">
            <SmallHeading label="REMARKS" class="pl-6 w-[20%]" />
            <div class="mx-10 mt-5">
                <table class="min-w-full text-xs overflow-x-scroll border border-[#D7D7D7]">
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                remarks
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                date added
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                date updated
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                added/updated by
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 w-[80px]">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <tr class="divide-x divide-gray-200">
                            <td class="flex items-center gap-[10px] whitespace-normal text-justify uppercase py-2 pl-3 pr-1 tracking-wider">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat, inventore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, quos!
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                09/28/2022 08:30:29 AM
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-2 pl-1 pr-3 tracking-wider">
                                09/28/2022 08:30:29 AM
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-2 pl-1 pr-3 tracking-wider">
                                LASCONIA, ELIOMAR DE ASIS
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-2 pl-1 pr-3 tracking-wider w-[80px]">
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
        <!-- Accordion -->
        <div class="mx-5 shadow-md">
            <Accordion :sectiontitle="'add/update remarks'" :accordionColor="'bg-#3E3E3E'" :titleAlign="'text-right'" :setOpen="true">
                <div class="mx-5">
                    <FloatingTextArea :label="'remarks'" :inputHeight="'h-[135px]'"/>
                    <div class="flex justify-end">
                        <BorderButton :buttonLabel="'ADD/UPDATE REMARKS'" :buttonSize="'h-auto w-[180px]'" :buttonPadding="'px-[5px] py-1'"/>
                    </div>
                </div>
            </Accordion>
        </div>
        <!-- Buttons -->
        <div class="flex justify-center gap-x-[30px] mt-[30px]">
            <BorderButton :buttonLabel="'save as draft'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C text-[11px]'"/>
            <BorderButton :buttonLabel="'cancel'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E text-[11px]'"/>
            <SolidButton :buttonLabel="'NEXT'" :isDisabled="true"/>
        </div>
    </div>
</template>
