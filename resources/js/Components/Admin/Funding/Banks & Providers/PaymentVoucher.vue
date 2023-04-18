<script>
import InputGroup from "@/Components/Misc/Input/InputGroup.vue"
export default{
    components:{
        InputGroup
    }
}
</script>
<template>
    <div class="3xl:container w-full h-auto bg-white py-4 px-5">
        <h1>Hello World</h1>
        <InputGroup :inputLabel="'Name'" :labelWidth="'w-4/12'" :inputWidth="'w-8/12'"/>
        <InputGroup :inputLabel="'Age'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"/>
    </div>
</template>