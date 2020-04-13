// app.js

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)


import App from "./App.vue";
Vue.use(VueAxios, axios);


import RagioniSocialiComponent from "./components/RagioniSociali.vue";
import VoucherComponent from "./components/Voucher.vue";

const routes = [
    {
        name: "index",
        path: "/",
        component: RagioniSocialiComponent
    },
    {
        name: "ragionisociali",
        path: "/ragionisociali",
        component: RagioniSocialiComponent
    },
    {
        name: "voucher",
        path: "/voucher/:id",
        component: VoucherComponent
    }
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");
