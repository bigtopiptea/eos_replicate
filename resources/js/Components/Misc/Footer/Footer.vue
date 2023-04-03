<script setup>
import moment from 'moment';

const currentDate = (value) => {
    return moment(value).format('LL');
}
</script>
<template>
    <footer class="bg-white ">
        <span class="bg-white float-right h-[48px] p-4 font-rubik-light uppercase text-[12px] tracking-wider font-[500px]">
            Date today:
            <span class="font-bold">
                {{ currentDate() }}
            </span>
        </span>
    </footer>
</template>
