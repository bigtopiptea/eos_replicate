<script>
import axios from 'axios';
import EditIcon from '../../../Misc/Icons/EditIcon.vue';
import SettingsInput from '../../../Misc/Input/SettingsInput.vue';

export default {
    components: {
        SettingsInput,
        EditIcon
    },
    data() {
        return {
            rates: [],
            isEditRate: false,
        }
    },
    methods: {
        async getRates() {
            await axios.get('/api/rates')
                .then((response) => {
                    this.rates = response.data
                })
                .catch((errors) => {

                })
        },
    },
    created() {
        this.getRates();
    }
}
</script>
<template>
    <div class="w-full border shadow-md bg-white border-white">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-8 flex flex-col">
                <div class="mb-8 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="p-4 space-x-3 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                            Branch
                                        </th>
                                        <th scope="col"
                                            class="p-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                            From Currency
                                        </th>
                                        <th scope="col"
                                            class="p-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                            To Currency
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-center uppercase tracking-wider font-rubik-light text-sm font-semibold text-gray-900">
                                            Exchange Rate
                                        </th>
                                        <th scope="col"
                                            class="p-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                            Last Updated
                                        </th>
                                        <th scope="col"
                                            class="p-4 uppercase tracking-wider font-rubik-light text-left text-sm font-semibold text-gray-900">
                                            Last Updated By
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="rate in rates.data" :key="rate" class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap space-x-3 uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ rate.branch_name.name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ rate.from_currency.currency }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ rate.to_currency.currency }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            <span>{{ rate.rate }}</span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ rate.updated_at }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase p-4 text-sm font-rubik-light tracking-wider">
                                            {{ rate.fullname.first_name }} {{ rate.fullname.last_name }}
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
