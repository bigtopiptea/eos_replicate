    <template>
    <!-- OJT -->
    <div class="flex items-center font-light text-[10px] w-full h-7 mb-4 whitespace-nowrap">
        <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA]"  :class="labelWidth">
            {{ inputLabel }}
        </label>
        <select name="payment-type"  class="uppercase h-full p-1 focus:z-10  text-[#3E3E3E] text-left border border-grey-200 focus:border-collapse" :class=[inputWidth,inputColor] >
                <option value="" class="hidden">{{ placeholder }}</option>
                <option v-for="(choice,index) in choices" :key="index" value=index >{{choice}}</option>
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
    inputColor:{
        type: String,
        default: 'bg-white'
    },
    inputWidth:{
        type: String,
        default: 'w-5/12',
        required: true
    },
    labelWidth:{
        type: String,
        default: 'w-7/12',
        required: true
    },
    placeholder:{
        type: String,
        required: false
    },
    choices:{
        type: Array,
        required: true
    },
  },
}
</script>
