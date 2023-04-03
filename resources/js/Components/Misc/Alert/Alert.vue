<script>
export default {
    name: "Alert",
    props: {
        alert: []
    }
}

</script>
<template>
    <h1 class="text-red-500">
        {{ alert }}
    </h1>
</template>
