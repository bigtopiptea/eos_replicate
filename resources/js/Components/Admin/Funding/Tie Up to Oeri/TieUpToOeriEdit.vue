<script>
import InputGroup from '@/Components/Misc/Input/InputGroup.vue';
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import SolidButton from '../../../Misc/Buttons/SolidButton.vue';
import Accordion from "@/Components/Misc/Accordion.vue"
import JournalEntry from "@/Components/Admin/Funding/Tie Up to Oeri/JournalEntry.vue"
export default{
  components:{
    InputGroup, BorderButton, Accordion, JournalEntry, SolidButton
  },
  props: {
    isOpen:{
        type: Boolean,
    }
  },
  methods: {
    updateMainValue(newValue){
      this.$emit('updateMainValue', newValue);
    }
  }
}
</script>
<template>
    <div v-show="!isOpen">
      <div class="3xl:container m-3">
        <!-- Main Content -->
        <div>
          <!-- Form -->
          <div class="flex justify-between items-end h-[225px]">
            <div class="w-[35%]">
                <InputGroup :inputLabel="'total txn. amt'" :labelWidth="'w-4/12'" :inputWidth="'w-4/12'" :isDisabled="true"/>
                <InputGroup :inputLabel="'outstanding amt.'" :labelWidth="'w-4/12'" :inputWidth="'w-4/12'" :isDisabled="true"/>
              <div>
                <InputGroup :inputLabel="'tieup partner'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'" :isDisabled="true"/>
              </div>
              <div>
                <InputGroup :inputLabel="'filename'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'" :isDisabled="true"/>
              </div>
            </div>
            <div class="w-[28%]">
              <InputGroup :inputLabel="'commited rate'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
              <InputGroup :inputLabel="'amount to debit'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
              <InputGroup :inputLabel="'peso transactions'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12 '" :isDisabled="true"/>
              <InputGroup :inputLabel="'dollar transactions'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
            </div>
            <div class="flex flex-col justify-between w-[28%] h-full">
              <div>
                <InputGroup :inputLabel="'reference number'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
              </div>
              <div>
                <InputGroup :inputLabel="'peso value'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                <InputGroup :inputLabel="'peso value'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                <InputGroup :inputLabel="'peso value'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
              </div>
            </div>
          </div>
          <!-- Buttons -->
          <div class="flex gap-[15px] justify-center mt-3">
              <BorderButton :buttonLabel="'Reset'" :buttonStyle="'border-2 border-black text-black text-[11px]'" :buttonPadding="'px-2 py-2'"/>
              <BorderButton :buttonLabel="'Pass Entry'" :buttonStyle="'border-2 border-red-500 text-red-500 text-[11px]'" :buttonPadding="'px-2 py-2'"/>
          </div>
        </div>
        <!-- Accordion -->
        <div>
            <Accordion sectiontitle="JOURNAL ENTRY" :setOpen=true>
                <JournalEntry>
                  <div class="flex justify-center space-x-4 items-center w-full h-auto mt-5">
                    <SolidButton  @click="updateMainValue(!isOpen)"  :buttonLabel="'CANCEL'" :buttonTextSize="'text-[15px]'"/>
                    <SolidButton :buttonLabel="'SUBMIT'" :buttonTextSize="'text-[15px]'" :buttonStyle="'bg-[#F9951E]'"/>
                </div>
                </JournalEntry>
            </Accordion>
        </div>
      </div>
    </div>
</template>
