<template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full h-7  whitespace-nowrap">
        <select name="payment-type"  class=" uppercase h-full p-1 focus:z-10  text-[#3E3E3E] text-left border border-grey-200 focus:border-collapse" :class=[inputWidth,inputColor] >
                <option  value="" hidden>{{ placeholder }}</option>
                <option  v-for="(choice,index) in choices" :key="index" value=index >{{choice}}</option>
        </select>
    </div>
</template>

<script>
export default{
  props: {
    inputColor:{
        type: String,
        default: 'bg-white'
    },
    inputWidth:{
        type: String,
        default: 'w-full',
        required: true
    },
    choices:{
        type: Array,
        required: true
    },
    placeholder:{
        type: String,
        required: false
    }
  },
}
</script>
