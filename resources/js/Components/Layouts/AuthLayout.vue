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
export default {
    components: {CircleCheckIcon, ChevLeftIcon, RadioIcon, SelectedRadioButton, ChevronLeftIcon, Footer, Title},
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
                    to: "/app/distribution",
                    label: "Distribution",
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
                    to: "#",
                    label: 'Logout',
                    children: [],
                    icon: LogoutIcon,
                    // logout: ,
                }
            ],
            isOpen: false,
            isLogout: false,
            isToggled: true,
            openDropdown: false,
            activeItem: null

        }
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
        // console.log(this.activeItem.children);
    }
}
</script>
<template>
    <!-- Sidebar -->
    <div class="border-gradient-top border-t-[3px] z-10 fixed inset-x-0 w-full"></div>
    <div class="flex bg-gray-100 ">
        <div class="flex flex-col inset-y-0 fixed z-10 flex-shrink-0 border-r-[2px] my-[0.15rem] nav w-64 bg-white" :class="!isToggled ? 'w-32': '64'">
            <ChevronLeftIcon @click="isToggled = !isToggled" class="h-6 absolute cursor-pointer -right-[0.80rem] top-[140px]"/>
            <div class="flex items-center justify-center z-10 py-6 text-white">
                <img src="../../../assets/images/EosMaker.png"
                     class="h-12  m-auto duration-300" alt="" />
            </div>
            <div>
                <img class="m-auto h-[100px] w-[100px] my-5 rounded-full"
                     :src="user.avatar" alt="" />
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
                    <li v-for="menuItem in navItems" :key="menuItem.name" >
                        <router-link @click="menuItem.label === 'Logout' ? logout() : toggleMenu(menuItem)"
                         :active-class="menuItem.label === 'Logout' ? '' : 'bg-[#3E3E3E] text-white'"
                          class="uppercase text-gray-900 group flex items-center justify-between pl-5 py-2 text-[11px]
                          tracking-widest font-rubik-light font-medium hover:bg-[#3e3e3e] hover:text-white duration-300"
                         :to="menuItem.to">
                            <div class="flex">
                               <component :is="menuItem.icon" class="h-5 w-6 mr-3"></component>
                               <span>{{ menuItem.label }}</span>
                            </div>
<!--                            :class=" ? '-rotate-90' : '-rotate-180'"-->
                            <component
                                       class="h-4 w-6 duration-300 mr-4 -rotate-180" :is="menuItem.toggleOffIcon">
                            </component>
                        </router-link>
                        <ul v-if="menuItem.children && menuItem === activeItem">
                            <li v-for="subItem in menuItem.children" :key="subItem.label">
                                <router-link
                                    @click="reroute(subItem)"
                                    :class="{'active text-[#F1721A]': $route.path === subItem.to}"
                                    class="px-14 text-[11px] whitespace-nowrap gap-1 w-full flex items-center duration-300 hover:text-white my-1 hover:text-[#f1721a] py-2 uppercase tracking-wider font-rubik-light" :to="subItem.to">
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
            <div v-else class="flex-grow border-r border-gray-200 overflow-y-scroll ">
                <div id="dropdown" class="ml-[8.5rem]">
                    <ul class="bg-white shadow-xl border border-gray-200 absolute text-gray-700"
                        aria-labelledby="dropdownDefaultButton">
                        <li v-for="links in navItems">
                            <div v-if="links.children && links === activeItem">
                                <router-link
                                    v-for="link in links.children"
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
                        <button>
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
            <div v-if="isLogout" class="bg-white rounded-sm border border-gray-300 w-[15%] border fixed right-4 z-10 top-12">
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
</style>
