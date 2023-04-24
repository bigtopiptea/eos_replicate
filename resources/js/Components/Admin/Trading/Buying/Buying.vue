<script>
import InputGroup from "@/components/Misc/Input/InputGroup.vue"
export default{

    components:{
        InputGroup,


    },


}

</script>
<template>
    <div>
        <div class="h-auto w-full border border-red-500 bg-white">
            <div class="flex justify-between  border border-black w-full p-5 px-8">
                <div class="flex flex-col">
                    <h1>Hello</h1>
                    <h1>Hello</h1>
                    <h1>Hello</h1>
                </div>
                <div class="flex align-end">
                    <InputGroup :inputLabel="'Reference Number'" />
                </div >
            </div>

        </div>
    </div>
</template>
