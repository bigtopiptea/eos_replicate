<template>
    <div>
        <div v-for="links in navItems">
<!--            {{JSON.stringify(this.user.permissions).includes(links.label) == false}}-->
            <div v-if="!isOpen" v-show="JSON.stringify(this.user.permissions).includes(links.label)" class="text-center pt-4">
                <span>
                    <router-link
                        @click="show = false"
                        v-if="!links.children.length"
                        :to="links.to"
                        active-class=" text-[#F9951E]"
                        class="hover:text-[#f9951e] duration-300">
                        <component class="h-6 w-8 m-auto" :is="links.icon">
                        </component>
                        <span class="font-rubik text-[10px] uppercase">
                            {{ links.label }}
                        </span>
                    </router-link>
                </span>
            </div>
            <div v-else>
                <span v-show="JSON.stringify(this.user.permissions).includes(links.label)">
                    <router-link
                        v-if="!links.children.length"
                        active-class="bg-[#3E3E3E] mt-0.5 text-[#FFFFFF] "
                        class="flex whitespace-nowrap text-[10px] duration-300 tracking-widest font-rubik font-normal items-center hover:bg-[#3E3E3E] gap-3 uppercase mt-0.5 hover:text-white cursor-pointer py-2 px-6 text-[#3E3E3E]"
                        :to="links.to"
                    >
                        <component class="h-6 w-6" :is="links.icon"></component>
                        <span class="text-[12px]">
                            {{ links.label }}
                        </span>
                    </router-link>
                </span>
            </div>
        </div>
        <!-- Settings dropdown -->
        <div v-if="isOpen">
            <button
                @click="show = !show"
                id="dropdownDefaultButton"
                data-dropdown-toggle="dropdown"
                class="flex justify-between whitespace-nowrap w-full text-[12px] tracking-widest font-rubik font-normal items-center gap-3 uppercase mt-0.5 cursor-pointer py-2 px-6 text-[#3E3E3E]"
                type="button"
            >
                <div class="flex items-center gap-3">
                    <SettingsIcon class="h-6 w-6" />
                    <span class="text-[12px]">Settings</span>
                </div>
                <svg
                    :class="!show ? '-rotate-90' : ''"
                    class="w-4 h-4 ml-2 duration-300"
                    aria-hidden="true"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    ></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div v-show="show">
                <ul v-if="isOpen" aria-labelledby="dropdownDefaultButton">
                    <li v-for="links in navItems">
                        <router-link
                            v-for="link in links.children"
                            :to="link.to"
                            :class="{
                                'active text-[#F1721A]':
                                    $route.path === link.to,
                            }"
                            class="px-14 text-[12px] whitespace-nowrap gap-1 w-full flex items-center duration-300 hover:text-white my-1 hover:text-[#f1721a] py-2 uppercase tracking-wider font-rubik-light"
                        >
                            <SelectedRadioButton
                                v-if="$route.path === link.to"
                                class="h-4"
                            />
                            <RadioIcon v-else class="h-4" />
                            {{ link.label }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Settings dropdown end-->

        <!--Toggled Settings -->
        <div v-else>
            <div class="text-center z-10">
                <button @click="show = !show" class="hover:text-#F9951E w-full text-black pt-2">
                    <SettingsIcon class="h-6 w-8 m-auto" />
                    <span class="text-[10px] uppercase font-rubik">
                        Settings
                    </span>
                </button>
                <div
                    v-if="!isOpen"
                    v-show="show"
                    id="dropdown"
                    class="relative left-[150px] -top-[200px]">
                    <ul class="text-sm z-10 bg-white shadow-xl rounded-md border border-gray-200 absolute text-gray-700"
                        aria-labelledby="dropdownDefaultButton">
                        <li v-for="links in navItems">
                            <router-link
                                v-for="link in links.children"
                                @click="show = false"
                                :to="link.to"
                                class="px-4 py-1 my-1 text-[11px] whitespace-nowrap  w-full gap-2  flex items-center duration-300 hover:text-white hover:bg-[#F9951E] uppercase tracking-wider font-rubik-light">
<!--                                <CircleCheckIcon class="h-5 w-[18px]" />-->
                                {{ link.label }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Toggled Settings -->
        <button
            v-if="isOpen"
            @click="logout"
            class="flex w-full whitespace-nowrap text-[12px] tracking-widest font-rubik font-normal items-center hover:bg-[#3E3E3E] gap-3 uppercase mt-0.5 hover:text-white cursor-pointer py-2 px-6 text-[#3E3E3E]"
        >
            <LogoutIcon class="h-6 w-6" />
            <span class="text-[12px]"> Logout </span>
        </button>
        <button
            v-else
            @click="logout"
            class="hover:text-#F9951E w-full py-3 text-black"
        >
            <LogoutIcon class="h-6 w-full m-auto" />
            <span class="font-rubik text-[10px] uppercase">Logout</span>
        </button>
    </div>
    <!-- End Toggled Settings -->

</template>

<script>
import { mapActions } from "vuex";
import Swal from "sweetalert2";

import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from "@headlessui/vue";

import ProcessIcon from "../Icons/ProcessIcon.vue";
import HomeIcon from "../Icons/HomeIcon.vue";
import StatusReversalIcon from "../Icons/StatusReversalIcon.vue";
import InquiryIcon from "../Icons/InquiryIcon.vue";
import AmendmentIcon from "../Icons/AmendmentIcon.vue";
import MonitoringIcon from "../Icons/MonitoringIcon.vue";
import ReportIcon from "../Icons/ReportIcon.vue";
import SettingsIcon from "../Icons/SettingsIcon.vue";
import LogoutIcon from "../Icons/LogoutIcon.vue";
import ChevronRightArrow from "../Icons/CheveronRightIcon.vue";
import CircleCheckIcon from "../Icons/CircleCheckIcon.vue";
import RadioIcon from "@/Components/Misc/Icons/RadioIcon.vue";
import SelectedRadioButton from "@/Components/Misc/Icons/SelectedRadioButton.vue";

export default {
    components: {
        SelectedRadioButton,
        RadioIcon,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        ProcessIcon,
        HomeIcon,
        StatusReversalIcon,
        InquiryIcon,
        AmendmentIcon,
        MonitoringIcon,
        ReportIcon,
        SettingsIcon,
        LogoutIcon,
        CircleCheckIcon,
        ChevronRightArrow,
    },
    props: {
        isOpen: Boolean,
    },
    data() {
        return {
            show: false,
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
                {
                    to: "/app/monitor-transaction",
                    label: "Monitoring",
                    children: [],
                    icon: MonitoringIcon,
                },
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
                    to: "/app/status-reversal",
                    label: "Status & Reversal",
                    children: [],
                    icon: StatusReversalIcon,
                },
                {
                    to: "/app/reports",
                    label: "Reports",
                    children: [],
                    icon: ReportIcon,
                },
                {
                    to: '/app/other-services',
                    label: 'Other Services',
                    children: [],
                    icon: ReportIcon,
                },
                {
                    to: "/settings",
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
                },
            ],
        };
    },
    methods: {
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
        hide() {
            console.log("test");
            this.show = false;
        },
    },
    created() {
        console.log("user permission", this.user);
    },
};
</script>
