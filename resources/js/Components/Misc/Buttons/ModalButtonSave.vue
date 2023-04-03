<template>
    <button :type="type" 
        class="w-full font-rubik rounded-md border text-center border-solid border-2 border-[#F9951E] bg-white px-4 py-2 text-md font-medium transition ease-in-out duration-500
        text-[#F9951E] shadow-sm hover:bg-[#F26400] hover:text-white hover:border-[#F9951E] focus:outline-none focus:ring-2 focus:ring-[#F9951E] focus:ring-offset-2">
        {{label}}
    </button>
</template>

<script>

    export default{
        name: "ModalButtonSave",
        props:{
            label:{
                type: String,
                default:'SAVE CHANGES'
            },
            type:{
                type: String,
                default:'button'
            }
        }
    }
</script>