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
// import StatusReversal from "@/Components/Admin/Status & Reversal/StatusReversal.vue";
import Inquiry from "@/Components/Admin/Inquiry/Inquiry.vue";
import Amendments from "@/Components/Admin/Amendments/Amendments.vue";
import MonitorTransaction from "@/Components/Admin/Monitor & Transactions/Monitor&Transactions.vue";


//OJT EDITED//
import Home from "@/Components/Admin/Home/Home.vue";
import Distribution from "@/Components/Admin/Distribution/Distribution.vue";
import MonitorTransactions from "@/Components/Admin/Monitor Transactions/MonitorTransactions.vue"
import Funding from "@/Components/Admin/Funding/Funding.vue"
import PaymentVoucher from "@/Components/Admin/Funding/Payment Voucher/PaymentVoucherNewPage.vue"
import TieUpFundingEdit from "@/Components/Admin/Funding/Tie Up to Oeri/TieUpToOeriEdit.vue";
import Buying from "@/Components/Admin/Trading/Buying/Buying.vue";
import Selling from "@/Components/Admin/Trading/Selling/Selling.vue";
import CustomerRecord from "@/Components/Admin/Trading/Customer Record/CustomerRecord.vue";
import CustomerRecordIndividual from "@/Components/Admin/Trading/Customer Record/Individual/CustomerRecordIndividual.vue";
import CustomerRecordCorporate from "@/Components/Admin/Trading/Customer Record/Corporate/CustomerRecordCorporate.vue";
import AvailableInventory from '@/Components/Admin/Trading/Inventory/AvailableInventory.vue';
import STR from '@/Components/Admin/Trading/STR/STR.vue';
import AdjustmentEntry from '@/Components/Admin/Status & Reversal/Adjustment Entry/AdjustmentEntry.vue';
import AllEntries from '@/Components/Admin/Status & Reversal/Adjustment Entry/AllEntries.vue';

//CMT REPORTS/
import TransactionReport from "@/Components/Admin/Reports/CMT-Reports/Transaction Report/TransactionReport.vue";
import CashPositionReport from "@/Components/Admin/Reports/CMT-Reports/Cash Position Report/CashPositionReport.vue";
import TradingSummaryReport from "@/Components/Admin/Reports/CMT-Reports/Trading Summary Report/TradingSummaryReport.vue";
import PaymentToSuppliers from "@/Components/Admin/Reports/CMT-Reports/Payment to Suppliers/PaymentToSuppliers.vue";
import CTR_STRReport from "@/Components/Admin/Reports/CMT-Reports/CTR & STR Report/CTR_STRReport.vue";
import DailyInventoryReport from "@/Components/Admin/Reports/CMT-Reports/Daily Inventory Report/DailyInventoryReport.vue";
import RevenueReport from "@/Components/Admin/Reports/CMT-Reports/Revenue Report/RevenueReport.vue";
import OutwardRemittanceReport from "@/Components/Admin/Reports/CMT-Reports/Outward Remittance Report/OutwardRemittanceReport.vue";
import EndDayReport from "@/Components/Admin/Reports/CMT-Reports/End of the Day Report/EndDayReport.vue";

//OPS REPORTS
import StatusReport from "@/Components/Admin/Reports/OPS-Reports/Status Report/StatusReport.vue";
import DispositionReport from "@/Components/Admin/Reports/OPS-Reports/Disposition Report/DispositionReport.vue";
import LongOutstandingReport from "@/Components/Admin/Reports/OPS-Reports/Long Outstanding Report/LongOutstandingReport.vue";
import AMLAReport from "@/Components/Admin/Reports/OPS-Reports/AMLA Report/AMLAReport.vue";
import MasterlistReport from "@/Components/Admin/Reports/OPS-Reports/Masterlist Report/MasterlistReport.vue";
import OPSTransactionReport from "@/Components/Admin/Reports/OPS-Reports/Transaction Report/TransactionReport.vue";
import OPSEndDayReport from "@/Components/Admin/Reports/OPS-Reports/End Day Report/EndDayReport.vue";

import Pushback from "@/Components/Admin/Other Services/Pushback/Pushback.vue";
import UploadUSF from "@/Components/Admin/Other Services/Upload USF/UploadUSF.vue";
import ConsolidatedProofsheet from "@/Components/Admin/Other Services/Consolidated Proofsheet/ConsolidatedProofsheet.vue";
import Help from "@/Components/Admin/Help/Help.vue"
import Logs from "@/Components/Admin/Logs/Logs.vue"

//New Setting CMT Sub Components -OJT-
import ChangePassword from "@/Components/Admin/New Settings/Change Password/ChangePassword.vue";
import ChartOfAccounts from "@/Components/Admin/New Settings/Chart of Accounts/ChartOfAccounts.vue";
import DistributionSetup from "@/Components/Admin/New Settings/Distribution Setup/DistributionSetup.vue";
import FundingSetup from "@/Components/Admin/New Settings/Funding Setup/FundingSetup.vue";
import Maintenance from "@/Components/Admin/New Settings/Maintenance/Maintenance.vue";
import RateManagement from "@/Components/Admin/New Settings/Rate Management/RateManagement.vue";
import Signatories from "@/Components/Admin/New Settings/Signatories/Signatories.vue";

//New Setting OPS Sub Components -OJT-
import OPSDistributionSetup from "@/Components/Admin/New Settings/OPS-Settings/Distribution Setup/DistributionSetup.vue";
import OPSCostManagement from "@/Components/Admin/New Settings/OPS-Settings/Cost Management/CostManagement.vue";

//Billing and Collection
import BCHome from "@/Components/Admin/Billing & Collection/Home/BillingCollectionHome.vue";
import BCBilling from "@/Components/Admin/Billing & Collection/Billing & Collection/Billing/Billing.vue";
import BCCollection from "@/Components/Admin/Billing & Collection/Billing & Collection/Collection/Collection.vue";
import BCCollectionPayment from "@/Components/Admin/Billing & Collection/Billing & Collection/Collection/CollectionPayment.vue";
import BCPrint from "@/Components/Admin/Billing & Collection/Billing & Collection/Print/Print.vue";
import BCCollectionReport from "@/Components/Admin/Reports/B&C-Reports/Collection Report/CollectionReport.vue"

// import Settings from "@/Components/Admin/Settings/Settings.vue";
import Process from "@/Components/Admin/Process/Process.vue";
import Outfile from "@/Components/Admin/Monitor & Transactions/Outfile.vue";

//Settings Sub Components
import FeesManagement from "@/Components/Admin/Settings/Fees Management/Fees.vue";
// import RateManagement from "@/Components/Admin/Settings/Rate Management/Rate.vue";
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
                path: "/app/home",
                name: "Home",
                component: Home,
                meta: {
                    title: `Home`,
                    ability: "Home",
                },
            },
            {
                path: "/app/distribution",
                name: "Distribution",
                component: Distribution,
                meta: {
                    title: `Distribution`,
                    ability: "Distribution",
                },
            },


            // {
            //     path: "/app/status-reversal",
            //     name: "status-reversal",
            //     component: StatusReversal,
            //     meta: {
            //         title: `Status & Reversal`,
            //         ability: "Status & Reversal",
            //     },
            // },
            {
                path: "/app/status-reversal/adjustment-entry",
                name: "Adjustment Entry",
                component: AdjustmentEntry,
                meta: {
                    title: `Adjustment Entry`,
                    ability: "Adjustment Entry",
                },
            },
            {
                path: "/app/status-reversal/adjustment-entry/all-entries",
                name: "View All Entries",
                component: AllEntries,
                meta: {
                    title: `View All Entries`,
                    ability: "View All Entries",
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
            // Carl Mendoza Edited
            {
                path: "/app/monitor-transactions",
                name: "monitoringtransactions",
                component: MonitorTransactions,
                meta: {
                    title: `Monitoring`,
                    ability: "Monitoring",
                },
            },
            //Carl Mendoza Edited [4-18]
            //Vedasto Quintans Edited [4-18 - 3:26pm]
            {
                path: "/app/funding",
                name: "Funding",
                component: Funding,
                meta: {
                    title: `Funding`,
                    ability: "Funding",
                },
                children:[
                    {
                        path: '/app/funding/edit',
                        component: TieUpFundingEdit,
                        name:'TieUpEdit',
                        meta: {
                            title: `Tie Up Edit`,
                            ability: "Tie Up Edit",
                        },
                    },
                ]
            },
            {
                path: "/app/funding/payment-voucher",
                name: "Payment Voucher",
                component: PaymentVoucher,
                meta: {
                    title: `Payment Voucher`,
                    ability: "Payment Voucher",
                },
            },

            {
                path: "app/trading/buying",
                name: "Buying",
                component: Buying,
                meta: {
                    title: `Buying`,
                    ability: "Buying",
                },

            },
            {
                path: "app/trading/selling",
                name: "Selling",
                component: Selling,
                meta: {
                    title: `Selling`,
                    ability: "Selling",
                },

            },
            {
                path: "app/trading/inventory",
                name: "Available Inventory",
                component: AvailableInventory,
                meta: {
                    title: `Available Inventory`,
                    ability: "Inventory",
                },

            },
            {
                path: "app/trading/str",
                name: "STR",
                component: STR,
                meta: {
                    title: `STR`,
                    ability: "STR",
                },

            },
            {
                path: "app/trading/customer-record",
                name: "Customer Record",
                component: CustomerRecord,
                meta: {
                    title: `Customer Record`,
                    ability: "Customer Record",
                },
            },
            // VDQ 4/24
            {
                path: "app/trading/customer-record/individual",
                name: "Customer Record - Individual",
                component: CustomerRecordIndividual,
                meta: {
                    title: `Customer Record - Individual`,
                    ability: "Customer Record - Individual",
                },

            },
            // VDQ 4/26
            {
                path: "app/trading/customer-record/corporate",
                name: "Customer Record - Corporate",
                component: CustomerRecordCorporate,
                meta: {
                    title: `Customer Record - Corporate`,
                    ability: "Customer Record - Corporate",
                },

            },
            // VDQ - OJT (5/2)
            {
                path: "/app/reports/transaction-report",
                name: "transaction report",
                component: TransactionReport,
                meta: {
                    title: `Transaction Report`,
                    ability: `Transaction Report`,
                },
            },
            {
                path: "/app/reports/cash-position-report",
                name: "cash position report",
                component: CashPositionReport,
                meta: {
                    title: `Cash Position Report`,
                    ability: `Cash Position Report`,
                },
            },
            {
                path: "/app/reports/trading-summary-report",
                name: "trading summary report",
                component: TradingSummaryReport,
                meta: {
                    title: `Trading Summary Report`,
                    ability: `Trading Summary Report`,
                },
            },
            {
                path: "/app/reports/payment-to-suppliers",
                name: "payment to suppliers",
                component: PaymentToSuppliers,
                meta: {
                    title: `Payment to Suppliers`,
                    ability: `Payment to Suppliers`,
                },
            },
            {
                path: "/app/reports/ctr-str-report",
                name: "ctr & str report",
                component: CTR_STRReport,
                meta: {
                    title: `CTR & STR Report`,
                    ability: `CTR & STR Report`,
                },
            },
            {
                path: "/app/reports/daily-inventory-report",
                name: "daily inventory report",
                component: DailyInventoryReport,
                meta: {
                    title: `Daily Inventory Report`,
                    ability: `Daily Inventory Report`,
                },
            },
            {
                path: "/app/reports/revenue-report",
                name: "revenue report",
                component: RevenueReport,
                meta: {
                    title: `Revenue Report`,
                    ability: `Revenue Report`,
                },
            },
            // VDQ OJT - (5/3)
            {
                path: "/app/reports/outward-remittance-report",
                name: "outward remittance report",
                component: OutwardRemittanceReport,
                meta: {
                    title: `Outward Remittance Report`,
                    ability: `Outward Remittance  Report`,
                },
            },
            {
                path: "/app/reports/end-day-report",
                name: "end day report",
                component: EndDayReport,
                meta: {
                    title: `End Day Report`,
                    ability: `End Day Report`,
                },
            },
            //5/16/2023 VDQ
            {
                path: "/app/reports/ops-status-report",
                name: "status report",
                component: StatusReport,
                meta: {
                    title: `Status Report`,
                    ability: `Status Report`,
                },
            },
            {
                path: "/app/reports/ops-disposition-report",
                name: "disposition report",
                component: DispositionReport,
                meta: {
                    title: `Disposition Report`,
                    ability: `Disposition Report`,
                },
            },
            {
                path: "/app/reports/ops-long-outstanding-report",
                name: "long outstanding report",
                component: LongOutstandingReport,
                meta: {
                    title: `Long Outstanding Report`,
                    ability: `Long Outstanding Report`,
                },
            },
            {
                path: "/app/reports/ops-amla-report",
                name: "amla report",
                component: AMLAReport,
                meta: {
                    title: `AMLA Report`,
                    ability: `AMLA Report`,
                },
            },
            {
                path: "/app/reports/ops-masterlist-report",
                name: "masterlist report",
                component: MasterlistReport,
                meta: {
                    title: `Masterlist Report`,
                    ability: `Masterlist Report`,
                },
            },
                //CM 5/16/23
            {
                path: "/app/reports/ops-transaction-report",
                name: "Transaction Report",
                component: OPSTransactionReport,
                meta: {
                    title: `Transaction Report`,
                    ability: `OPS - Transaction Report`,
                },
            },
            {
                path: "/app/reports/ops-end-day-report",
                name: "End Day Report",
                component: OPSEndDayReport,
                meta: {
                    title: `End Day Report`,
                    ability: `OPS - End Day Report`,
                },
            },

            //CM 6-14
            {
                path: "/app/reports/b&c-collection-report",
                name: "Collection Report",
                component: BCCollectionReport,
                meta: {
                    title: `Collection Report`,
                    ability: `B&C - Collection Report`,
                },
            },



            //Carl Mendoza 5-3
            {
                path: "/app/other-services/pushback",
                name: "Pushback",
                component: Pushback,
                meta: {
                    title: `Pushback`,
                    ability: `Pushback`,
                },
            },
            {
                path: "/app/other-services/upload-usf",
                name: "Upload USF",
                component: UploadUSF,
                meta: {
                    title: `Upload USF`,
                    ability: `Upload USF`,
                },
            },
            {
                path: "/app/other-services/consolidated-proofsheet",
                name: "Consolidated Proofsheet",
                component: ConsolidatedProofsheet,
                meta: {
                    title: `Consolidated Proofsheet`,
                    ability: `Consolidated Proofsheet`,
                },
            },
            {
                path: "/app/new-settings/change-password",
                name: "Change Password",
                component: ChangePassword,
                meta: {
                    title: `Change Password`,
                    ability: `Change Password`,
                },
            },
            {
                path: "/app/new-settings/chart-of-accounts",
                name: "Chart of Accounts",
                component: ChartOfAccounts,
                meta: {
                    title: `Chart of Accounts`,
                    ability: `Chart of Accounts`,
                },
            },
            {
                path: "/app/new-settings/distribution-setup",
                name: "Distribution Setup",
                component: DistributionSetup,
                meta: {
                    title: `Distribution Setup`,
                    ability: `Distribution Setup`,
                },
            },
            {
                path: "/app/new-settings/funding-setup",
                name: "Funding Setup",
                component: FundingSetup,
                meta: {
                    title: `Funding Setup`,
                    ability: `Funding Setup`,
                },
            },
            {
                path: "/app/new-settings/maintenance",
                name: "Maintenance",
                component: Maintenance,
                meta: {
                    title: `Maintenance`,
                    ability: `Maintenance`,
                },
            },
            {
                path: "/app/new-settings/rate-management",
                name: "Rate Management",
                component: RateManagement,
                meta: {
                    title: `Rate Management`,
                    ability: `Rate Management`,
                },
            },
            {
                path: "/app/new-settings/signatories",
                name: "Signatories",
                component: Signatories,
                meta: {
                    title: `Signatories`,
                    ability: `Signatories`,
                },
            },
            {
                path: "/app/new-settings/ops-distribution-setup",
                name: "OPS Distribution Setup",
                component: OPSDistributionSetup,
                meta: {
                    title: `OPS Distribution Setup`,
                    ability: `OPS Distribution Setup`,
                },
            },
            {
                path: "/app/new-settings/ops-cost-management",
                name: "OPS Cost Management",
                component: OPSCostManagement,
                meta: {
                    title: `OPS Cost Management`,
                    ability: `OPS Cost Management`,
                },
            },
            {
                path: "/app/new-settings/ops-distribution-setup",
                name: "OPS Distribution Setup",
                component: OPSDistributionSetup,
                meta: {
                    title: `OPS Distribution Setup`,
                    ability: `OPS Distribution Setup`,
                },
            },
            {
                path: "/app/billing-collection/home",
                name: "BCHome",
                component: BCHome,
                meta: {
                    title: `BCHome`,
                    ability: `BCHome`,
                },
            },
            {
                path: "/app/billing-collection/billing",
                name: "Billing",
                component: BCBilling,
                meta: {
                    title: `Billing`,
                    ability: `Billing`,
                },
            },
            {
                path: "/app/billing-collection/collection",
                name: "Collection",
                component: BCCollection,
                meta: {
                    title: `Collection`,
                    ability: `Collection`,
                },
            },
            // 6/13/2023 VDQ
            {
                path: "/app/billing-collection/collection/payment",
                name: "Collection Payment",
                component: BCCollectionPayment,
                meta: {
                    title: `Collection`,
                    ability: `Collection Payment`,
                },
            },
            {
                path: "/app/billing-collection/print",
                name: "Print",
                component: BCPrint,
                meta: {
                    title: `Print`,
                    ability: `Print`,
                },
            },
            {
                path: "/app/help",
                name: "Help",
                component: Help,
                meta: {
                    title: `Help`,
                    ability: `Help`,
                },
            },
            {
                path: "/app/logs",
                name: "Logs",
                component: Logs,
                meta: {
                    title: `Logs`,
                    ability: `Logs`,
                },
            },
            //OJT SETTINGS END

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
