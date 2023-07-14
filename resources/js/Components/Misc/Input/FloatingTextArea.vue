<template>
<div class="flex flex-col relative text-xs w-full  ">
    <label for="Remarks" class="absolute mx-2 text-left text-[10px] px-1 uppercase -top-[7px] bg-white">{{ label }}</label>
    <textarea rows="4" class="resize-none block p-2.5  text-[10px] text-gray-900 bg-white border border-[#EAEAEA] focus:outline-none" :placeholder="placeholder" :class="[inputHeight,inputWidth]"/>

</div>
</template>

<script>

export default{
    props:{
        label:{
            type: String,
            default:''
        },
        inputWidth:{
            type: String,
            default:'w-full'
        },
        inputHeight:{
            type: String,
            default:'h-24'
        },
        placeholder:{
            type: String,
            required:false

        }
    }
}
</script>
