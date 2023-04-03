<script>
import NormalButton from '../../../Misc/Buttons/NormalButton.vue';
import SearchIcon from '../../../Misc/Icons/SearchIcon.vue';
import InputLabel from '../../../Misc/Input/InputLabel.vue';
import SettingsInput from '../../../Misc/Input/SettingsInput.vue';
import TabNav from '../../../Misc/Tabs/TabNav.vue';
import Tab from '../../../Misc/Tabs/Tab.vue';
import Slideover from '../../../Misc/Slideover/Slideover.vue';
import ServiceFee from './Service Fee/ServiceFee.vue';
import AmendmentFee from './Amendment/AmendmentFee.vue';
export default {
    components: {
        TabNav,
        Tab,
        NormalButton,
        InputLabel,
        SettingsInput,
        SearchIcon,
        ServiceFee,
        AmendmentFee,
        Slideover
    },
    data() {
        return {
            selected: 'Service Fee',
        }
    },
    methods: {
        setSelected(tab) {
            this.selected = tab;
        },
    }
}
</script>
<template>
    <div class="bg-white shadow-md">
        <TabNav class="relative pt-6" :tabs="['Service Fee', 'Amendment Fee', 'Refund Fee']" :selected="selected"
            @selected="setSelected">
            <Tab :isSelected="selected === 'Service Fee'">
                <ServiceFee />
            </Tab>
            <Tab :isSelected="selected === 'Amendment Fee'">
                <AmendmentFee />
            </Tab>
        </TabNav>
    </div>
</template>
