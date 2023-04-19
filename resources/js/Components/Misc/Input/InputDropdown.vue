<template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full h-7 mb-4 whitespace-nowrap">
        <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA]"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <select name="payment-type" class="uppercase h-full bg-#ECECEC p-1 focus:z-10  text-[#3E3E3E] text-left border-none focus:border-collapse" :class="inputWidth" >
            <option value="1">CASH TO BANK ACCOUNT</option>
            <option value="2">CASH TO BANK ACCOUNT</option>
            <option value="3">CASH TO BANK ACCOUNT</option>
        </select>
    </div>
</template>

<script>
export default{
  props: {
    inputLabel:{
        type: String,
        default: 'Label'
    },
    inputWidth:{
        type: String,
        default: '5/12',
        required: true
    },
    labelWidth:{
        type: String,
        default: '7/12',
        required: true
    }
  },
}
</script>
