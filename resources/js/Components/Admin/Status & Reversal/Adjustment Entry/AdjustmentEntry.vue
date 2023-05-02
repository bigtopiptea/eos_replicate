<script>
import BorderButton from '../../../Misc/Buttons/BorderButton.vue'
import NormalButton from '../../../Misc/Buttons/NormalButton.vue';
import SearchIcon from '../../../Misc/Icons/SearchIcon.vue';
import InputGroup from '../../../Misc/Input/InputGroup.vue';
import Accordion from '../../../Misc/Accordion.vue';
import JournalEntry from '@/Components/Admin/Status & Reversal/JournalEntry.vue';
export default{
    components:{

        BorderButton,
        NormalButton,
        SearchIcon,
        InputGroup,
        Accordion,
        JournalEntry,


    },

}
</script>
<template>
    <div class="h-auto w-full bg-white ">
        <div class="px-8 pt-5">
            <!-- Possible Table Solution
            <div class=" w-full overflow-auto ">
                <div class="2xl:container w-[1030px]">
                    <h1 class="whitespace-nowrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ad alias fugit? Explicabo corporis accusantium cum temporibus ipsum, corrupti sunt rem quis voluptatem velit eum aliquid similique repellendus, nulla ipsam!</h1>

                </div>
            </div> -->
            <!-- 1st Content -->
            <div class="inline-block min-w-full align-end ">
                <div class="flex items-end justify-between h-auto min-w-full ">
                    <div class="flex">
                        <form class="flex items-start">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 font-light text-[10px] block w-full pl-10 p-2.5"
                                    placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3  uppercase h-[34px] bg-[#F9951E] text-[10px]  text-white" />
                        </form>
                    </div>
                    <div>
                        <router-link to="/app/status-reversal/adjustment-entry/all-entries">
                        <BorderButton  :buttonLabel="'View All Entries'" :buttonSize="'h-auto w-[140px] '"/>
                        </router-link>
                    </div>
                </div>
            </div>
            <!-- Break -->
            <div class="border-3 border-[#EAEAEA] h-[3px] bg-[#EAEAEA] my-3"/>
            <!-- 2nd Content -->
            <div class="flex justify-between">
                <div class="w-1/3 ">
                    <InputGroup :inputLabel="'Reference No.'" :labelWidth="'w-1/2'"  :inputWidth="'w-1/2'" :isDisabled="true"/>
                </div>
                <div class="w-1/3 ">
                    <InputGroup :inputLabel="'Adjustment Reference No.'" :labelWidth="'w-1/2'"  :inputWidth="'w-1/2'" :isDisabled="true"/>
                </div>
            </div>
        </div>
        <Accordion sectiontitle="Journal Entry" :setOpen=true>
            <JournalEntry/>
        </Accordion>
    </div>
</template>
