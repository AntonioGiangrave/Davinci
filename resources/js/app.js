// app.js

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";

import { BootstrapVue, BootstrapVueIcons } from "bootstrap-vue";

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

import Vuex from "vuex";

import App from "./App.vue";
Vue.use(VueAxios, axios, Vuex);

import RagioniSocialiComponent from "./components/RagioniSociali.vue";
import VoucherComponent from "./components/Voucher.vue";
import VoucherListComponent from "./components/VoucherList.vue";
import storeData from "./store/index";

const store = new Vuex.Store(storeData);

const routes = [
    {
        name: "index",
        path: "/",
        component: RagioniSocialiComponent,
    },
    {
        name: "ragionisociali",
        path: "/ragionisociali",
        component: RagioniSocialiComponent,
    },
    {
        name: "voucher",
        path: "/voucher/:id",
        component: VoucherComponent,
    },
    {
        name: "voucherlist",
        path: "/voucherlist/",
        component: VoucherListComponent,
    },
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router, store }, App)).$mount("#app");
