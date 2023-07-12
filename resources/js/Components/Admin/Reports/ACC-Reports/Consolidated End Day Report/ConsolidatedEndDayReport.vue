<template>
    <div class="w-full h-screen bg-white py-[20px] px-[70px]">
        <div class="flex flex-col items-center gap-[30px]">
            <div class="flex justify-center gap-[10px]">
                <button v-for="(label, id) in buttonLabels" :key="id" 
                :value="label.label"
                class="w-[180px] uppercase text-[10px] text-center px-2 py-3"
                :class="!selected.includes(id) ? 'bg-[#d7d7d7]' : 'bg-[#f9951e] text-white'"
                @click="toggleSelection(id)">
                {{ label.label }}
                </button>
            </div>
            <div class="flex gap-3">
                <DateInput label="Start Date" />
                <DateInput label="End Date" />     
            </div>
            <div class="flex gap-3">
                <BorderButton :buttonLabel="'view proofsheet'" :buttonPadding="'p-1'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-auto'"/>
                <BorderButton :buttonLabel="'export proofsheet'"  :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3e3e3e]'" :buttonPadding="'p-1'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-auto'"/>
            </div>
        </div>
    </div>
</template>
<script>
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
export default{
    components:{
        BorderButton, DateInput
    },
    data(){
        return{
            buttonLabels:[
                {label: 'operations'},
                {label: 'cash management treasury'},
                {label: 'billing & collection'},
                {label: 'allcash'},
                {label: 'accounting'},
            ],
            selected: []
        }
    },
    methods: {
        toggleSelection(id) {
            if (this.selected.includes(id)) {
                this.selected = this.selected.filter((item) => item !== id);
            } else {
                this.selected.push(id);
            }
        },
    },
}
</script>