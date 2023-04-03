<template>
    <div>
        <div class="bg-gray-100 py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">SOPHIA API Access</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the API token for API integration and authencation in SOPHIA.</p>
                    </div>
                    <!-- <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <AddBtn label="ADD TOKEN" @click.prevent="openModal"></AddBtn>
                    </div> -->
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">SYSTEM</th>
                                    <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">PURPOSE</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">API Token</th>
                                    <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 w-5">Action</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <tr class="divide-x divide-gray-200" v-for="item in api_access" :key="item.id">
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">SOPHIA</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">{{item.name}}</td>
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{item.plaintoken}}</td>
                                    <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                                        <EditIcon class="bg-#F9951E rounded-full text-white" />
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
        <Slideover :show="slideoverOpen" @close="slideoverOpen = false" title="SOPHIA API TOKEN">
            <form>
                <div class="space-y-8 divide-y divide-gray-200">
                    <InputWithLabel type="text" name="purpose" label="Description"></InputWithLabel>
                </div>
                <div class="flex ">
                    <ModalButtonCancel label="CANCEL" @click="closeModal"></ModalButtonCancel>
                    <ModalButtonSave type="submit" label="SAVE CHANGES"></ModalButtonSave>
                </div>
            </form>
            
        </Slideover>
    </div>
</template>

<script>
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import AddBtn from "@/Components/Misc/Buttons/AddButton.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import ModalButtonSave from '@/Components/Misc/Buttons/ModalButtonSave.vue';
import ModalButtonCancel from '@/Components/Misc/Buttons/ModalButtonCancel.vue';
import InputWithLabel from '@/Components/Misc/Input/InputWithLabel.vue';

export default{
    name:'APIAccess',
    props:{
        api_access:{
            type:Array,
            default:[],
        }
    },
    components:{
        Slideover,
        EditIcon,AddBtn,ModalButtonSave, ModalButtonCancel, InputWithLabel
    },
    data() {
        return {
            slideoverOpen: false,
        }
    },
    methods:{
        openModal(){
            this.slideoverOpen = true
        },
        closeModal(){
            this.slideoverOpen = false
        }
    }

}

</script>