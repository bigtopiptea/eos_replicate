<script>
import Title from "@/Components/Misc/Section/Title.vue";
import HomeIcon from "@/Components/Misc/Icons/HomeIcon.vue";
import ProcessIcon from "@/Components/Misc/Icons/ProcessIcon.vue";
import MonitoringIcon from "@/Components/Misc/Icons/MonitoringIcon.vue";
import InquiryIcon from "@/Components/Misc/Icons/InquiryIcon.vue";
import AmendmentIcon from "@/Components/Misc/Icons/AmendmentIcon.vue";
import StatusReversalIcon from "@/Components/Misc/Icons/StatusReversalIcon.vue";
import ReportIcon from "@/Components/Misc/Icons/ReportIcon.vue";
import CircleCheckIcon from "@/Components/Misc/Icons/CircleCheckIcon.vue";
import SettingsIcon from "@/Components/Misc/Icons/SettingsIcon.vue";
import ChevronLeftIcon from "@/Components/Misc/Icons/ChevronLeftIcon.vue";
import {mapActions} from "vuex";
import Swal from "sweetalert2";
import Footer from "@/Components/Misc/Footer/Footer.vue";
import moment from "moment/moment";
import SelectedRadioButton from "@/Components/Misc/Icons/SelectedRadioButton.vue";
import RadioIcon from "@/Components/Misc/Icons/RadioIcon.vue";
import ChevLeftIcon from "@/Components/Misc/Icons/ChevLeftIcon.vue";
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import LogoutIcon from "@/Components/Misc/Icons/LogoutIcon.vue";
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
import RangeSlider from "@/Components/Misc/Range Slider/RangeSlider.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import FundIcon from "../Misc/Icons/FundIcon.vue";
import DistributionIcon from "../Misc/Icons/DistributionIcon.vue";
import BorderButton from "../Misc/Buttons/BorderButton.vue";
import HelpIcon from '../Misc/Icons/HelpIcon.vue';
import LogsIcon  from "../Misc/Icons/LogsIcon.vue";

export default {
    components: {
        CircleCheckIcon, ChevLeftIcon, RadioIcon,
        SelectedRadioButton, ChevronLeftIcon,
        Footer, Title, Slideover, LoadingIcon,
        XMarkIcon, ProgressIcon,RangeSlider,FundIcon,
        DistributionIcon, ChevRightIcon, InputGroup,
        BorderButton, HelpIcon, LogsIcon

    },
    data(){
        return {
            user: this.$store.state.auth.user,

            navItems: [
                {
                    to: "/app/dashboard",
                    label: "Home",
                    children: [],
                    icon: HomeIcon,
                },
                {
                    to: "/app/process",
                    label: "Processing",
                    children: [],
                    icon: ProcessIcon,
                },
                // VDQ (4/3/2023)
                {
                    to: "/app/home",
                    label: "Home",
                    children: [],
                    icon: HomeIcon,
                },
                {
                    to: "/app/billing-collection/home",
                    label: "Billing & Collection",
                    toggleOffIcon: ChevLeftIcon,
                    icon: AmendmentIcon,
                    children: [
                        {
                            to: "/app/billing-collection/home",
                            label: "Home",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/billing-collection/billing",
                            label: "Billing",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/billing-collection/collection",
                            label: "Collection",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/billing-collection/print",
                            label: "Print",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/billing-collection/monitoring",
                            label: "Monitoring",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                    ],
                },
                {
                    to: "/app/accounting/home",
                    label: "Accounting",
                    toggleOffIcon: ChevLeftIcon,
                    icon: ReportIcon,
                    children: [
                        {
                            to: "/app/accounting/home",
                            label: "Home",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/monitoring",
                            label: "Monitoring",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                    ],
                },
                {
                    to: "/app/accounting/transactions/purchase-order",
                    label: "Accounting Transaction",
                    toggleOffIcon: ChevLeftIcon,
                    icon: ReportIcon,
                    children: [
                        {
                            to: "/app/accounting/transactions/purchase-order",
                            label: "Purchase Order",
                            children: [
                            ],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/transactions/accounts-payable-voucher",
                            label: "Acc. Payable Voucher",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/transactions/accounts-journal-entry",
                            label: "Acc. Journal Entry",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/transactions/inventory",
                            label: "Acc. Inventory",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/transactions/journals",
                            label: "Acc. Journals",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/transactions/reconciliation-of-accounts",
                            label: "Acc. Recon Account",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/accounting/transactions/view-sl",
                            label: "Acc. View SL",
                            children: [],
                            icon: CircleCheckIcon,
                        },

                    ],
                },
                {
                    to: "/app/distribution",
                    label: "Distribution",
                    children: [],
                    icon: AmendmentIcon,
                },
                {
                    to: "/app/monitor-transaction",
                    label: "Monitoring",
                    children: [],
                    icon: MonitoringIcon,
                },
                // CM
                {
                    to: "/app/monitor-transactions",
                    label: "Monitoring Transactions",
                    children: [],
                    icon: MonitoringIcon,
                },
                {
                    to: "/app/funding",
                    label: "Funding",
                    children: [],
                    icon: FundIcon,
                },
                {
                    to: "/app/trading/buying",
                    label: "Trading",
                    icon: MonitoringIcon,
                    toggleOffIcon: ChevLeftIcon,
                    children: [
                        {
                            to: "/app/trading/buying",
                            label: "Buying",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/trading/selling",
                            label: "Selling",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/trading/customer-record",
                            label: "Customer Record",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/trading/inventory",
                            label: "Available Inventory",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/trading/str",
                            label: "STR",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                    ]
                },
                // CM
                {
                    to: "/app/inquiry",
                    label: "Inquiry",
                    children: [],
                    icon: InquiryIcon,
                },
                {
                    to: "/app/amendments",
                    label: "Amendment",
                    children: [],
                    icon: AmendmentIcon,
                },
                {
                    to: "/app/status-reversal/adjustment-entry",
                    label: "Adjustment",
                    children: [],
                    icon: StatusReversalIcon,
                },
                {
                    to: "/app/reports/transaction-report",
                    label: "Reports",
                    icon: ReportIcon,
                    toggleOffIcon: ChevLeftIcon,
                    children: [
                        {
                            to: "/app/reports/transaction-report",
                            label: "CMT - Transaction",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/cash-position-report",
                            label: "CMT - Cash Position",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/trading-summary-report",
                            label: "CMT - Trading Summary",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/payment-to-suppliers",
                            label: "CMT - Pymnt to Suppliers",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ctr-str-report",
                            label: "CMT - CTR & STR",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/daily-inventory-report",
                            label: "CMT - Daily Inventory",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/revenue-report",
                            label: "CMT - Revenue",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/outward-remittance-report",
                            label: "CMT - Outward Remittance",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/end-day-report",
                            label: "CMT - End Day",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-status-report",
                            label: "OPS - Status",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-disposition-report",
                            label: "OPS - Disposition",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-long-outstanding-report",
                            label: "OPS - Long Outstanding",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-amla-report",
                            label: "OPS - AMLA",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-masterlist-report",
                            label: "OPS - Masterlist",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-transaction-report",
                            label: "OPS - Transaction",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/ops-end-day-report",
                            label: "OPS - End Day",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/b&c/collection-report",
                            label: "B&C - Collection Report",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/b&c/end-day-report",
                            label: "B&C - End Day",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/accounts-payable-report",
                            label: "ACC - Accounts Payable",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/bir-alphalist-report",
                            label: "ACC - BIR Alphalist",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/end-day-report",
                            label: "ACC - End Day",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/consolidated-end-day-report",
                            label: "ACC - Cnsldtd End Day",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/trial-balance-report",
                            label: "ACC - Trial Balance",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/balance-sheet-report",
                            label: "ACC - Balance Sheet",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/income-statement-report",
                            label: "ACC - Income Statement",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/consolidated-income-report",
                            label: "ACC - Cnsldtd Income",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/reports/accounting/domestic-revenue-report",
                            label: "ACC - Domestic Revenue",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                    ]
                },
                //CM 5-3
                {
                    to: '/app/other-services/pushback',
                    label: 'Other Services',
                    children: [
                        {
                            to: "/app/other-services/pushback",
                            label: "Pushback",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/other-services/upload-usf",
                            label: "Upload USF",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/other-services/consolidated-proofsheet",
                            label: "Proofsheet",
                            children: [],
                            icon: CircleCheckIcon,
                        },


                    ],
                    icon: ReportIcon,
                    toggleOffIcon: ChevLeftIcon,
                },
                {
                    to: '/app/new-settings/cmt/change-password',
                    label: 'New Settings',
                    children: [
                        {
                            to: "/app/new-settings/cmt/change-password",
                            label: "CMT Change Password",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/cmt/chart-of-accounts",
                            label: "CMT Account Charts",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/cmt/distribution-setup",
                            label: "CMT Distribution Setup",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/cmt/funding-setup",
                            label: "CMT Funding Setup",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/cmt/maintenance",
                            label: "CMT Maintenance",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/cmt/rate-management",
                            label: "CMT Rate Management",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/cmt/signatories",
                            label: "CMT Signatories",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/ops/distribution-setup",
                            label: "OPS Distribution Setup",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/ops/cost-management",
                            label: "OPS Cost Management",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/b&c/clients-grouping",
                            label: "B&C Clients Grouping",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/b&c/collection-target",
                            label: "B&C Collection Target",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/new-settings/b&c/maintenance",
                            label: "B&C Maintenance",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/other-services/je-maintenance",
                            label: "ACC JE Maintenance",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                    ],
                    icon: SettingsIcon,
                    toggleOffIcon: ChevLeftIcon,
                },
                {
                    to: "/app/settings/data-entry",
                    label: "Settings",
                    children: [
                        {
                            to: "/app/settings/data-entry",
                            label: "Data Entry",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/email-contents",
                            label: "Email Contents",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/fees-management",
                            label: "Fees Management",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/rate-management",
                            label: "Rate Management",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/waive-charges",
                            label: "Waive Charges",
                            children: [{ to: "", label: "A" }],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/handling-fee",
                            label: "Handling Fees",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/company",
                            label: "Company",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/users",
                            label: "Users",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/billers",
                            label: "Billers",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/others",
                            label: "Others",
                            children: [],
                            icon: CircleCheckIcon,
                        },
                        {
                            to: "/app/settings/rate",
                            label: "Rate",
                            children: [],
                            icon: CircleCheckIcon,
                        }

                    ],
                    icon: SettingsIcon,
                    toggleOffIcon: ChevLeftIcon,
                },
                {
                    to: "/app/help",
                    label: "Help",
                    children: [],
                    icon: HelpIcon,
                },
                {
                    to: "/app/logs",
                    label: "logs",
                    children: [],
                    icon: LogsIcon,
                },
                {
                    to: "#",
                    label: 'Logout',
                    children: [],
                    icon: LogoutIcon,
                    // logout: ,
                }
            ],
            isOpen: false,
            isLogout: false,
            isToggled: true,     // set to true
            openDropdown: false,
            activeItem: null,
            slideoverOpen: false, //Slideover 1 (Profile)
            profileSlideoverOpen: false, //Slideover 2 (Profile Image Upload)
            adjustProfileSlideoverOpen: false, //Slideover 3 (Profile Image Setup)
            paraIcon:'USER', //Icon Parameter
        }
    },
    methods: {

        slideOverToggle() {
            this.slideoverOpen = false;
        },
        profileSlideOverToggle() {
            this.profileSlideoverOpen = false;
        },
        adjustProfileSlideoverToggle(){
            this.adjustProfileSlideoverOpen = false;
        },
        ...mapActions({
            signOut: "auth/logout",
        }),
        async logout() {
            Swal.fire({
                title: "Are you sure you want to logout?",
                icon: "warning",
                iconColor: "rgba(238, 62, 44, 1)",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Logout!",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("/logout").then(({ data }) => {
                        this.signOut();
                        this.$router.push({ name: "login" });
                    });
                    setTimeout(() => {
                        Swal.fire("Success!", "Logout Succesfully!", "success");
                    }, 500);
                }
            });
        },
        toggleMenu(menuItem){
            if(menuItem.children){
                if(menuItem === this.activeItem){
                    this.activeItem = null
                } else {
                    this.activeItem = menuItem
                }
            }
        },
        currentDate(value) {
            return moment(value).format('LL');
        }
    },
    mounted() {
        this.currentDate();
        document.addEventListener('click', this.handleDocumentClick);
        // console.log(this.activeItem.children);
    },
    beforeUnmount() {
        // Remove event listener when the component is unmounted
        document.removeEventListener('click', this.handleDocumentClick);
    },
}
</script>

<template>
    <!-- Sidebar -->
    <div class="border-gradient-top border-t-[3px] z-10 fixed inset-x-0 w-full  "></div>
    <div class="flex bg-gray-100 ">
        <div class="flex flex-col inset-y-0 fixed z-10 flex-shrink-0 border-r-[2px] my-[0.15rem] nav w-64 bg-white" :class="!isToggled ? 'w-32': '64'">
            <ChevronLeftIcon @click="isToggled = !isToggled" class="h-6 absolute cursor-pointer -right-[0.80rem] top-[140px] transition-all" :class="isToggled ? 'rotate-0' : 'rotate-180'"/>
            <div class="flex items-center justify-center z-10 py-6 text-white">
                <img src="../../../assets/images/EosMaker.png"
                     class="h-12  m-auto duration-300" alt="" />
            </div>
            <div>
                <img class="m-auto h-[100px] w-[100px] my-5 rounded-full"
                     :src="user.avatar" alt=""/>
                <div v-if="isToggled" class="text-center">
                    <div class="text-[11px] font-rubik tracking-widest  uppercase mt-2 text-[#3E3E3E]">
                        {{ user.first_name + " "  + user.middle_name + " " + user.last_name }}
                    </div>
                    <div class="text-[11px] font-rubik tracking-widest font-bold uppercase text-[#3E3E3E]">
                        {{ user.role }}
                    </div>
                </div>
            </div>
            <nav v-if="isToggled" class="flex-grow border-r border-gray-200 py-2 overflow-y-scroll">
                <ul class="space-y-1">
                    <li v-for="menuItem in navItems" :key="menuItem.name" class="w-full" >
                        <router-link @click="menuItem.label === 'Logout' ? logout() : toggleMenu(menuItem)"
                         :active-class="menuItem.label === 'Logout' ? '' : 'bg-[#3E3E3E] text-white'"
                          class="uppercase text-gray-900 group flex items-center justify-between pl-5 py-2 text-[11px]
                          tracking-widest  font-medium hover:bg-[#3e3e3e] hover:text-white duration-300"
                         :to="menuItem.to">
                            <div class="flex">
                               <component :is="menuItem.icon" class="h-5 w-5 mr-3"></component>
                               <span>{{ menuItem.label }}</span>
                            </div>
<!--                            :class=" ? '-rotate-90' : '-rotate-180'"-->
                            <component
                                       class="h-4 w-6 duration-300 mr-4 -rotate-180" :is="menuItem.toggleOffIcon">
                            </component>
                        </router-link>
                        <ul v-if="menuItem.children && menuItem === activeItem">
                            <li v-for="subItem in menuItem.children" :key="subItem.label">
                                <!-- ojt px-14 to px-10 -->
                                <router-link
                                    @click="reroute(subItem)"
                                    :class="{'active text-[#F1721A]': $route.path === subItem.to}"
                                    class="px-[25px] text-[11px] whitespace-nowrap gap-1 w-full flex items-center duration-300 my-1 hover:text-[#f1721a] py-2 uppercase tracking-wider " :to="subItem.to">
                                    <SelectedRadioButton
                                        v-if="$route.path === subItem.to"
                                        class="h-3"/>
                                    <RadioIcon v-else class="h-3" />
                                    {{ subItem.label }}
                                </router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div v-else class="flex-grow border-r border-gray-200 overflow-y-scroll h-[300px]">
                <div id="dropdown" class="ml-[8.5rem]">
                    <ul class="bg-white shadow-xl border border-gray-200 max-h-[300px]  overflow-y-auto  absolute text-gray-700"
                        aria-labelledby="dropdownDefaultButton">
                        <li v-for="links in navItems" :key="links">
                             <!-- remove key for default -->
                            <div v-if="links.children && links === activeItem">
                                <router-link
                                    v-for="link in links.children" :key="link.children"
                                    :to="link.to"
                                    active-class="bg-[#f9951e] text-white"
                                    class="px-6 py-[0.5rem] tracking-widest text-[10px] border-b whitespace-nowrap w-full gap-2
                                    flex items-center duration-300 hover:text-white hover:bg-[#F9951E] uppercase">
                                    <!--                                <CircleCheckIcon class="h-5 w-4" />-->
                                    {{ link.label }}
                                </router-link>
                            </div>
                        </li>
                    </ul>
                </div>

                <ul class="space-y-1">
                    <li v-for="menuItem in navItems" :key="menuItem.label" class="text-center py-1">
                        <router-link
                            @click="menuItem.label === 'Logout' ? logout() : toggleMenu(menuItem)"
                            :active-class="menuItem.label === 'Logout' ? '' : 'text-[#FA961E]'"
                            :to="menuItem.to" class="uppercase text-[8px] hover:text-[#FA961E] duration-300">
                            <component class="h-6 w-6 m-auto" :is="menuItem.icon"></component>
                            {{menuItem.label}}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main content -->
        <!-- Swap to ml-64 if you dont want a sticky sidebar -->
        <div class="flex flex-col flex-grow ml-64" :class="!isToggled ? 'ml-32' : ''">
            <!-- Navbar -->
            <div class="fixed bg-white mt-[0.15rem] right-0 left-64 z-10 px-4 py-2 " :class="!isToggled ? 'left-32' : ''">
                <div class="min-w-0 flex-1 flex justify-between ">
                    <div v-if="!isToggled">
                        <h1 class="uppercase text-[11px]">{{ user.first_name }} {{user.last_name}}</h1>
                        <h1 class="uppercase text-[11px] font-bold">{{ user.role }} </h1>
                    </div>
                    <div></div>
                    <div class="space-x-1">
                        <button class="p-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor"
                                 class="w-5 h-5 hover:text-[#F9951E]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                        <button type="submit" @click="(slideoverOpen = !slideoverOpen)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5 hover:text-[#F9951E]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </button>
                        <button @click="isLogout  = !isLogout" class="p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5 hover:text-[#F9951E]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div v-if="isLogout" class="bg-white rounded-sm border border-gray-300 w-[15%] fixed right-4 z-10 top-12">
                <div class="text-center py-4">
                    <div class="px-4 m-auto w-full flex items-center justify-center">
                        <img class="rounded-full w-20 h-20 "
                             :src="user.avatar" alt="" />
                    </div>
                    <div class="text-[11px] uppercase tracking-widest">
                        <span>{{user.first_name}} {{user.last_name}}</span>
                    </div>
                </div>
                <ul class="p-2">
                    <button @click="logout()" class="uppercase px-[1rem] font-[700] w-full hover:bg-gray-300 py-2 text-[#3e3e3e] text-left text-[12px] rounded-sm tracking-widest" to="">Logout</button>
                </ul>
            </div>

            <div class="flex-grow bg-[#ECECEC] min-h-screen  px-4 py-6 my-10 mt-6">
                <Title class="font-bold mt-4" :title="this.$route.meta.title" />
                <router-view></router-view>
            </div>

            <div class="border-b-[2px] border-gradient-bottom inset-x-0  border-gray-100 fixed bottom-0 shadow-sm bg-white w-full px-4 py-3 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="min-w-0 flex-1">
                    <h1 class="text-right uppercase text-[12px] tracking-widest">
                        Date today:
                        {{currentDate()}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- SLIDEOVER PROFILE DETAILS-->
    <Slideover :show="slideoverOpen" @close="slideOverToggle" :title="'PROFILE'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="input-area mx-10">
                <div class="profile-upload flex justify-evenly items-center">
                    <img src="../../../assets/images/user-logo.png" alt="user-logo" class="w-36 h-36 rounded-full">
                    <BorderButton @click="(profileSlideoverOpen = !profileSlideoverOpen)"  @click.prevent="slideOverToggle()"  :buttonLabel="'UPLOAD'" :buttonSize="'h-auto w-[100px]'" :buttonPadding="'px-3 py-1'"/>
                </div>
                <div class="flex flex-col gap-3 mt-5">
                    <InputGroup :inputType="'text'" :inputLabel="'complete name'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'user role'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'company'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'department'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'email'" :inputLabel="'email address'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'contact number'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'date'" :inputLabel="'date created'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                </div>
            </div>
            <div class="flex justify-center">
                <BorderButton @click.prevent="slideOverToggle()" :buttonLabel="'CLOSE'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

    <!-- SLIDEOVER CHANGE PHOTO - Step 1-->
    <Slideover :show="profileSlideoverOpen" @close="profileSlideOverToggle" :title="'CHANGE PHOTO'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between items-center h-full pb-5">
            <div class="py-5 mx-5 w-4/5">
                <div class="flex flex-col items-center border-dashed border-2 border-#7F7F7F rounded-md p-5">
                    <div class="text-center mb-5">
                        <p class="text-sm">DRAG IMAGE HERE<br>OR</p>
                        <div class="flex items-center justify-center cursor-pointer">
                            <BorderButton :buttonLabel="'browse'" :buttonSize="'h-auto w-[100px]'" :buttonTextColor="'text-[#EE3E2C]'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2c]'" :buttonPadding="'px-4 py-1'" :buttonTextSize="'text-[12px]'"/>
                            <input class="absolute w-[100px] opacity-0" type="file" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                    <div class="text-center text-[10px]">
                        <p>MAX FILE SIZE: <span class="font-bold">1MB</span><br>
                        SUPPORTED FILE TYPES: <span class="font-bold">JPEG, JPG, PNG</span>
                        </p>
                    </div>
                </div>
                <div class="pt-5 ">
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center text-sm">
                            <LoadingIcon></LoadingIcon>
                            <span>photo_lasconia.jpg</span>
                        </div>
                        <div class="cursor-pointer">
                            <XMarkIcon></XMarkIcon>
                        </div>
                    </div>
                    <div class="mb-3">
                        <ProgressIcon :progressWidth="'w-96'"></ProgressIcon>
                    </div>
                    <div class="flex justify-between text-[10px] mb-3">
                        <div>
                            <p>
                                <span>0.5 MB</span>
                                of
                                <span>1 MB</span>
                            </p>
                        </div>
                        <div class="text-#194E72">
                            <p>UPLOADING...
                                <span>50%</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between w-4/5">
                <BorderButton @click.prevent="profileSlideOverToggle()" :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton @click="(adjustProfileSlideoverOpen = !adjustProfileSlideoverOpen)" @click.prevent="profileSlideOverToggle()" :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

    <!-- SLIDEOVER CHANGE PHOTO - Step 2-->
    <Slideover :show="adjustProfileSlideoverOpen" @close="adjustProfileSlideoverToggle" :title="'CHANGE PHOTO'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between items-center py-5 h-full">
            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center w-auto h-auto p-7 bg-#F9951E rounded-md relative">
                    <div class="absolute top-3 right-3 text-white cursor-pointer">
                        <XMarkIcon></XMarkIcon>
                    </div>
                    <div class="flex justify-center items-center w-72 h-52 bg-#EAEAEA">
                        <img src="https://pbs.twimg.com/profile_images/1564398871996174336/M-hffw5a_400x400.jpg" alt="user-logo" class=" w-48 h-48 rounded-full border-2 border-[#c6c3bd]">
                    </div>
                </div>
                <div class="mt-2">
                    <RangeSlider></RangeSlider>
                </div>
            </div>

            <div class="flex justify-between w-4/5">
                <BorderButton @click.prevent="adjustProfileSlideoverToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>
</template>
<style>
.main {
    border-bottom: 9px solid;
    border-image: linear-gradient(126deg,
    #ee3e2c 33.28%,
    #f98b38 61.25%,
    #fb9e30 89.37%,
    #ffffff 115.09%) 1 stretch;
    transform: rotate(-180deg);
}
.border-gradient-bottom{
    border-bottom: 3px solid;
    border-image: linear-gradient(to left,
    #ee3e2c 33.28%,
    #f98b38 61.25%,
    #fb9e30 89.37%,
    #ffffff 115.09%) 1 stretch;
}
.border-gradient-top{
    border-image: linear-gradient(to left,
    #ee3e2c 33.28%,
    #f98b38 61.25%,
    #fb9e30 89.37%,
    #ffffff 115.09%) 1 stretch;
}

.nav {
    border-image: linear-gradient(180deg,
    #f1532d 33.28%,
    #f99335 61.25%,
    #fbac4f 89.37%,
    #ffffff 115.09%) 1 stretch;
}
 /* CARL MENDIZA 4-20 */
/* width */
*::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

/* Track */
*::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
*::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 10px;
}

/* Handle on hover */
*::-webkit-scrollbar-thumb:hover {
  background: #555;
}
/* input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
} */


</style>
