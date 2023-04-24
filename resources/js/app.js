import "./bootstrap";
import Router from "@/router";
import store from "@/store";

import moment from "moment/moment";
import Particles from "vue3-particles";
import OtpInput from "@bachdgvn/vue-otp-input";
import Swal from "sweetalert2";

import moshaToast from "mosha-vue-toastify";
import "mosha-vue-toastify/dist/style.css";

import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

import VueHtml2pdf from 'vue-html2pdf'

import VueProgressBar from "@aacassandra/vue3-progressbar";
const options = {
    color: "#50d38a",
    failedColor: "#874b4b",
    thickness: "5px",
    transition: {
        speed: "0.2s",
        opacity: "0.6s",
        termination: 300,
    },
    autoRevert: true,
    location: "top",
    inverse: false,
};

import { TailwindPagination } from "laravel-vue-pagination";

import { createApp } from "vue/dist/vue.esm-bundler";
import CKEditor from "@ckeditor/ckeditor5-vue";
const app = createApp({});

app.use(Router);
app.use(
    store,
    moment,
    Particles,
    OtpInput,
    Swal,
    TailwindPagination,
    moshaToast,
    VueHtml2pdf
);
app.use(CKEditor);
app.use(VueProgressBar, options);
app.config.globalProperties.$moment = moment;

// app.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// app.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
app.component("v-select", vSelect);
app.mount("#app");
