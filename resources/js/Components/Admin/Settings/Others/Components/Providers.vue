<script>
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import SettingsInput from "@/Components/Misc/Input/SettingsInput.vue";
import {Form} from "vform";

export default {
    components: {SettingsInput, InputLabel, Slideover, NormalButton, EditIcon},
    data(){
        return {
            providers: '',
            slideoverOpen: false,
            provider: new Form({
                account_officer: '',
                name: '',
                complete_address: '',
                fax_no: '',
                account_no: '',
                contact_no: '',
                transaction_cost: '',
                amount_range: [
                    {from: '', to: ''}
                ],
                designation: ''
            }),
        }
    },
    methods: {
       async getProviders(){
           await axios.get('/api/maintenance/provider/list')
            .then((response) => {
               this.providers = response.data
            })
        },
        closeSlider(){
           this.slideoverOpen = false;
        }
    },
    created() {
        this.getProviders();
    }
}
</script>
<template>
    <div class="my-4 float-right mx-2 ">
        <NormalButton @click="slideoverOpen = true" label="Add Provider"
                      class="border bg-[#F9951E] text-white                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       tracking-widest px-4 py-2 uppercase text-[11px] duration-300 bg-gradient-to-r hover:from-red-500" />
    </div>
    <Slideover title="Create Provider"  @close="closeSlider" :show="slideoverOpen">
        <div>
            <form>
                <div class="w-full relative">
                    <InputLabel label="Provider Name" />
<!--                    <label v-if="provid.meta_id"-->
<!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
<!--                        {{ bankErrors.meta_id[0] }}-->
<!--                    </label>-->
<!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.name"
                                   class="w-full uppercase" placeholder="Enter Provider Name" />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Account Officer" />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.account_officer"
                                   class="w-full uppercase" placeholder="Enter Account Officer" />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Complete Address" />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.complete_address"
                                   class="w-full uppercase" placeholder="Enter Complete Address" />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Fax No." />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.fax_no"
                                   class="w-full uppercase" placeholder="Enter Fax No." />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Account No." />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.account_no"
                                   class="w-full uppercase" placeholder="Enter Account No." />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Contact No." />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.contact_no"
                                   class="w-full uppercase" placeholder="Enter Contact No." />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Transaction Cost" />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.transaction_cost"
                                   class="w-full uppercase" placeholder="Enter Transaction Cost" />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Amount Range" />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.transaction_cost"
                                   class="w-full uppercase" placeholder="Enter Amount Range" />
                </div>
                <div class="w-full relative">
                    <InputLabel label="Designation" />
                    <!--                    <label v-if="provid.meta_id"-->
                    <!--                           class="text-[8px] absolute top-2 right-0 uppercase text-red-500 tracking-widest">-->
                    <!--                        {{ bankErrors.meta_id[0] }}-->
                    <!--                    </label>-->
                    <!--                    :class="bankErrors.meta_id ? 'border border-red-500' : ''"-->
                    <SettingsInput v-model="provider.transaction_cost"
                                   class="w-full uppercase" placeholder="Enter Designation" />
                </div>
                <div class="flex justify-center space-x-4 items-center absolute bottom-0 inset-x-0">
                    <a @click="closeSlider()" type="submit"
                       class="border-[3px] hover:cursor-pointer transition ease-in-out delay-150 hover:translate-y-1 duration-300 border-[#3E3E3E] bg-[#3E3E3E] py-2 px-14 text-sm font-medium text-white uppercase tracking-widest shadow-sm hover:bg-[#2e2d2d] hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Close
                    </a>
<!--                    :label="isBankEdit ? 'update' : 'save'"-->
                    <NormalButton type="submit" label="save"
                                  class="border-[3px] transition ease-in-out
                    delay-150 hover:translate-y-1 duration-300
                    hover:border-[#F26400] border-#F9951E bg-white
                    py-2 px-14 text-sm font-medium text-[#F9951E]
                    uppercase tracking-widest shadow-sm hover:bg-[#F26400]
                    hover:text-white focus:outline-none focus:ring-2
                    focus:ring-indigo-500 focus:ring-offset-2" />
                </div>
            </form>
        </div>
    </Slideover>
    <div class="bg-white p-2 shadow-md border border-gray-100 rounded-sm">
        <table class="min-w-full">
            <thead class="bg-gray-200">
            <tr>
                <th scope="col"
                    class="py-3.5 pl-4 whitespace-nowrap uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                    Id
                </th>
                <th scope="col"
                    class="py-3.5 pl-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                    Provider Name
                </th>
                <th scope="col"
                    class="py-3.5 pr-4 uppercase tracking-wider font-rubik-light text-center text-sm font-semibold text-gray-900">
                    Action
                </th>
            </tr>
            </thead>
            <tbody class="bg-white">
            <tr v-for="provider in providers" :key="provider.id">
                <td class="whitespace-nowrap uppercase pl-4 py-2 text-sm font-rubik-light tracking-wider">
                    {{provider.id}}
                </td>
                <td class="whitespace-nowrap uppercase pl-4 py-2 text-sm font-rubik-light tracking-wider">
                    {{provider.name}}
                </td>
                <td
                    class="whitespace-nowrap uppercase text-center py-2 pr-4 text-sm font-rubik-light tracking-wider">
                    <button>
                        <EditIcon class="text-[#3e3e3e] hover:text-#F9951E" />
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
<!--        <div v-if="banks.length < 0" class="text-center mt-5">-->
<!--            <h1 class="text-[#3e3e3e] font-rubik-light uppercase tracking-widest">-->
<!--                No Items in the Banks Table-->
<!--            </h1>-->
<!--        </div>-->
    </div>
</template>
