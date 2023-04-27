<script>
import InputGroup from '@/Components/Misc/Input/InputGroup.vue';
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import Accordion from "@/Components/Misc/Accordion.vue"
import JournalEntry from "@/Components/Admin/Funding/JournalEntry.vue"
export default{
  components:{
    InputGroup, BorderButton, Accordion, JournalEntry
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
                <InputGroup :inputLabel="'total txn. amt'" :labelWidth="'w-4/12'" :inputWidth="'w-4/12'"/>
                <InputGroup :inputLabel="'outstanding amt.'" :labelWidth="'w-4/12'" :inputWidth="'w-4/12'"/>
              <div>
                <InputGroup :inputLabel="'tieup partner'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
              </div>
              <div>
                <InputGroup :inputLabel="'filename'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
              </div>
            </div>
            <div class="w-[28%]">
              <InputGroup :inputLabel="'commited rate'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
              <InputGroup :inputLabel="'amount to debit'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :inputColor="'bg-white'"/>
              <InputGroup :inputLabel="'peso transactions'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
              <InputGroup :inputLabel="'dollar transactions'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
            </div>
            <div class="flex flex-col justify-between w-[28%] h-full">
              <div>
                <InputGroup :inputLabel="'reference number'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
              </div>
              <div>
                <InputGroup :inputLabel="'peso value'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                <InputGroup :inputLabel="'peso value'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
                <InputGroup :inputLabel="'peso value'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
              </div>
            </div>
          </div>
          <!-- Buttons -->
          <div class="flex justify-center gap-x-[15px] mt-5">
              <BorderButton :buttonLabel="'RESET'" :buttonStyle="'border-2 border-#3E3E3E text-#3E3E3E'"/>
              <BorderButton :buttonLabel="'PASS ENTRY'" :buttonStyle="'border-2 border-#EE3E2C text-#EE3E2C'"/>
          </div>
        </div>
        <!-- Accordion -->
        <div>
            <Accordion sectiontitle="JOURNAL ENTRY" :setOpen=true>
                <JournalEntry>
                  <button @click="updateMainValue(!isOpen)" class="uppercase py-2 px-10 m-2 bg-#3E3E3E text-white  font-sans font-normal text-[17px]">CANCEL</button>
                  <button class=" uppercase py-2 px-10 m-2 bg-dark-orange text-white font-sans font-normal text-[17px]">SUBMIT</button>
                </JournalEntry>
            </Accordion>
        </div>
      </div>
    </div>
</template>
