<template>
    <button type="button" 
        class="w-full font-rubik rounded-md border text-center border-solid border-2 border-gray-500 bg-gray-100 px-4 py-2 text-md font-medium transition ease-in-out duration-500
        text-gray-700 shadow-sm hover:bg-gray-700 hover:text-white hover:border-gray-900 focus:outline-none focus:ring-2 focus:ring-[#3E3E3E] focus:ring-offset-2">
        {{label}}
    </button>
</template>

<script>

    export default{
        name: "ModalButtonCancel",
        props:{
            label:{
                type: String,
                default:'CANCEL'
            }
        }
    }
</script>