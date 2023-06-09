import { createWebHistory, createRouter } from "vue-router";
import store from "@/store";

/* Guest Component */
import Login from "@/Components/Guest/Auth/Login.vue";
import Register from "@/Components/Guest/Auth/Register.vue";
import ForgotPassword from "@/Components/Guest/Auth/ForgotPassword.vue";
import ResetPassword from "@/Components/Guest/Auth//PasswordReset.vue";

import LandingPage from "@/Components/Guest/LandingPage/LandingPage.vue";
/* Guest Component */

/* Layouts */
import AuthLayout from "@/Components/Layouts/AuthLayout.vue";
import GuestLayout from "@/Components/Layouts/GuestLayout.vue";
/* Layouts */

/* Authenticated Component */
import Dashboard from "../Components/Admin/Dashboard/Dashboard.vue";
import StatusReversal from "@/Components/Admin/Status & Reversal/StatusReversal.vue";
import Inquiry from "@/Components/Admin/Inquiry/Inquiry.vue";
import Amendments from "@/Components/Admin/Amendments/Amendments.vue";
import MonitorTransaction from "@/Components/Admin/Monitor & Transactions/Monitor&Transactions.vue";
import Reports from "@/Components/Admin/Reports/Reports.vue";
// import Settings from "@/Components/Admin/Settings/Settings.vue";
import Help from "@/Components/Admin/Help/Help.vue";

import Process from "@/Components/Admin/Process/Process.vue";

import Outfile from "@/Components/Admin/Monitor & Transactions/Outfile.vue";

//Settings Sub Components
import FeesManagement from "@/Components/Admin/Settings/Fees Management/Fees.vue";

import RateManagement from "@/Components/Admin/Settings/Rate Management/Rate.vue";

import HandlingFee from "@/Components/Admin/Settings/Handling Fee/HandlingFee.vue";

import WaiveCharges from "@/Components/Admin/Settings/Waive Charges/WaiveCharges.vue";

import Branch from "@/Components/Admin/Settings/Branches/Branch.vue";
import Index from "@/Components/Admin/Settings/Branches/Index.vue";
import CreateBranch from "@/Components/Admin/Settings/Branches/CreateBranch.vue";
import EditBranch from "@/Components/Admin/Settings/Branches/EditBranch.vue";

import Users from "@/Components/Admin/Settings/Users/Users.vue";
import CreateUser from "@/Components/Admin/Settings/Users/CreateUser.vue";

import Others from "@/Components/Admin/Settings/Others/Others.vue";
import Billers from "@/Components/Admin/Settings/Billers/Billers.vue";
import CreateBillers from "@/Components/Admin/Settings/Billers/CreateBiller.vue";

import DataEntry from "@/Components/Admin/Settings/Custom Fields/Index.vue";
import CreateDataEntry from "@/Components/Admin/Settings/Custom Fields/Create.vue";

import emailContents from "@/Components/Admin/Settings/Custom Email/Index.vue";
import CreateEmailContents from "@/Components/Admin/Settings/Custom Email/Create.vue";

import IndexCMT from "@/Components/Admin/Settings/Rate/Index.vue";

/* Authenticated Component */
import NotFound from "@/Components/404/NotFound.vue";
import OtherServices from "@/Components/Admin/Other Services/OtherServices.vue";
import CompanyCode from "@/Components/Guest/Auth/CompanyCode.vue";
import CompanyIndex from "@/Components/Admin/Settings/Branches/CompanyIndex.vue";
import Layout from "@/Components/Admin/Settings/Branches/Layout.vue";
import Swal from "sweetalert2";

const routes = [
    {
        path: "/:catchAll(.*)*",
        name: "not-found",
        component: NotFound,
    },
    {
        path: "/app/monitoring/outfile/:id",
        name: "monitoringOutfile",
        component: Outfile,
        props: true,
        meta: {
            title: "Monitoring Outfile",
            ability: "Monitoring",
        }
    },
    {
        path: "/",
        component: GuestLayout,
        meta: {
            middleware: "guest",
        },
        children: [
            {
                name: "company-code",
                path: "/company/code",
                component: CompanyCode,
                meta: {
                    title: `Company Code`,
                },
            },
            {
                name: "landing-page",
                path: "/",
                component: LandingPage,
                meta: {
                    title: `Landing Page`,
                },
            },
            {
                name: "login",
                path: "/login",
                component: Login,
                meta: {
                    title: `Login`,
                },
            },
            {
                name: "register",
                path: "/register",
                component: Register,
                meta: {
                    title: `Register`,
                },
            },
            {
                name: "forgot-password",
                path: "/forgot-password",
                component: ForgotPassword,
                meta: {
                    title: `Forgot Password`,
                },
            },
            {
                name: "reset-password",
                path: "/reset-password",
                component: ResetPassword,
                meta: {
                    title: `Reset Password`,
                },
            },
        ],
    },
    {
        path: "/",
        component: AuthLayout,
        meta: {
            middleware: "auth",
        },
        children: [
            {
                path: "/app/dashboard",
                name: "dashboard",
                component: Dashboard,
                meta: {
                    title: `Dashboard`,
                    ability: "Home",
                },
            },
            {
                path: "/app/process",
                name: "Process",
                component: Process,
                meta: {
                    title: `Processing`,
                    ability: "Processing",
                },
            },
            {
                path: "/app/status-reversal",
                name: "status-reversal",
                component: StatusReversal,
                meta: {
                    title: `Status & Reversal`,
                    ability: "Status & Reversal",
                },
            },

            {
                path: "/app/inquiry",
                name: "inquiry",
                component: Inquiry,
                meta: {
                    title: `Inquiry`,
                    ability: "Inquiry",
                },
            },

            {
                path: "/app/amendments",
                name: "amendments",
                component: Amendments,
                meta: {
                    title: `Amendments`,
                    ability: "Amendments",
                },
            },

            {
                path: "/app/monitor-transaction",
                name: "monitoring&transactions",
                component: MonitorTransaction,
                meta: {
                    title: `Monitoring`,
                    ability: "Monitoring",
                },
            },

            {
                path: "/app/reports",
                name: "reports",
                component: Reports,
                meta: {
                    title: `Reports`,
                    ability: `Reports`,
                },
            },
            {
                path: "/app/other-services",
                name: "other services",
                component: OtherServices,
                meta: {
                    title: `Other Services`,
                    ability: `Other Services`,
                },
            },
            {
                path: "/app/settings/fees-management",
                name: "fees-management",
                component: FeesManagement,
                meta: {
                    title: `Fees Management`,
                    ability: `Fees Management`,
                },
            },
            {
                path: "/app/settings/data-entry",
                name: "data-entry",
                component: DataEntry,
                meta: {
                    title: `Data Entry`,
                    ability: `All Data Entry`,
                },
            },
            {
                path: "/app/settings/data-entry/create",
                name: "create-data-entry",
                component: CreateDataEntry,
                meta: {
                    title: `Create Data Entry`,
                    ability: `Create Data Entry`,
                },
            },
            {
                path: "/app/settings/data-entry/:id/edit",
                name: "edit-data-entry",
                component: CreateDataEntry,
                meta: {
                    title: `Edit Data Entry`,
                    ability: `Edit Data Entry`,
                },
            },
            {
                path: "/app/settings/email-contents",
                name: "email-contents",
                component: emailContents,
                meta: {
                    title: `Email Contents`,
                    ability: `Email Contents`,
                },
            },
            {
                path: "/app/settings/email-contents/create",
                name: "create-email-contents",
                component: CreateEmailContents,
                meta: {
                    title: `Create Email Content`,
                    ability: `Create Email Content`,
                },
            },
            {
                path: "/app/settings/email-contents/:id/edit",
                name: "edit-email-contents",
                component: CreateEmailContents,
                meta: {
                    title: `Edit Email Content`,
                    ability: `Edit Email Content`,
                },
            },
            {
                path: "/app/settings/rate-management",
                name: "rate-management",
                component: RateManagement,
                meta: {
                    title: `Rate Management`,
                    ability: `Rate Management`,
                },
            },
            {
                path: "/app/settings/handling-fee",
                name: "handling-fee",
                component: HandlingFee,
                meta: {
                    title: `Handling Fees`,
                    ability: `Handling Fee`,
                },
            },
            {
                path: "/app/settings/waive-charges",
                name: "waive-charges",
                component: WaiveCharges,
                meta: {
                    title: `Waive Charges`,
                    ability: `Waive Charges`,
                },
            },
            {
                path: "/app/settings/rate",
                name: "cmt-rate",
                component: IndexCMT,
                meta: {
                    title: `Rate`,
                    ability: `CMT-RATE`
                }
            },
            {
                path: "/",
                component: Index,
                children: [
                    {
                        path: "/app/settings/company",
                        name: "company",
                        component: CompanyIndex,
                        meta: {
                            title: `Company`,
                            ability: `Companies`,
                        },
                    },
                    {
                        path: '/',
                        component: Layout,
                        children: [
                            {
                                path: "/app/settings/branch",
                                name: "branch",
                                component: Branch,
                                meta: {
                                    title: `Branch`,
                                    ability: `Branches`,
                                },
                            },
                            {
                                path: "/app/settings/create/branch",
                                name: "create-branch",
                                component: CreateBranch,
                                meta: {
                                    title: `Create Branch`,
                                    ability: `Branches`,
                                },
                            },
                            {
                                path: "/app/settings/edit/branch/:id",
                                name: "edit-branch",
                                component: EditBranch,
                                meta: {
                                    title: `Edit Branch`,
                                    ability: `Branches`,
                                },
                            },

                        ]
                    },
                ]
            },
            {
                path: "/app/settings/users",
                name: "users",
                component: Users,
                meta: {
                    title: `Users`,
                    ability: `Users`,
                },
            },

            {
                path: "/app/settings/create/users",
                name: "create-user",
                component: CreateUser,
                meta: {
                    title: `Create User`,
                    ability: `Users`,
                },
            },
            {
                path: "/app/settings/edit/:id/user",
                name: "edit-user",
                component: CreateUser,
                meta: {
                    title: `Edit User`,
                    ability: `Users`,
                },
            },
            {
                path: "/app/settings/others",
                name: "others",
                component: Others,
                meta: {
                    title: `Other Maintenance`,
                    ability: "Others",
                },
            },
            {
                path: "/app/settings/billers",
                name: "billers",
                component: Billers,
                meta: {
                    title: `Billers`,
                    ability: "Billers",
                },
            },
            {
                path: "/app/settings/create/billers",
                name: "create-billers",
                component: CreateBillers,
                meta: {
                    title: `Add new Biller`,
                    ability: "Billers",
                },
            },
            {
                path: "/app/help",
                name: "help",
                component: Help,
                meta: {
                    title: `Help`,
                    ability: "Help",
                },
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    if (to.meta.middleware === "guest") {
        if (store.state.auth.authenticated === true) {
            next({ name: "dashboard" });
        }
        next();
    } else {
        if (store.state.auth.authenticated) {
            axios
                .get("/api/check-permission", {
                    params: {
                        ability: to.meta.ability,
                    },
                })
                .then((data) => {
                    if (data.status) {
                        next();
                    } else {
                        if (to.meta.ability === store.state.auth.user.permissions) {
                            next();
                        } else {
                            Swal.fire({
                                title: "Opps!",
                                text: "You are not authorized to perform this action!",
                                icon: "error",
                                showCancelButton: false,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Go back to Dashboard",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    next({ name: "dashboard" });
                                }
                            });
                        }
                    }
                })
                .catch((e) => {
                    if (e.response.status == 401) {
                        axios.post("/logout").then(({ data }) => {
                            localStorage.removeItem("vuex");
                        });
                    }
                });
        } else {
            next({ name: "login" });
        }
    }
});

export default router;
