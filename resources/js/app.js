// app.js

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";

import BootstrapVue from "bootstrap-vue";
Vue.use(BootstrapVue);

import App from "./App.vue";
Vue.use(VueAxios, axios);

import HomeComponent from "./components/HomeComponent.vue";
import CreateComponent from "./components/CreateComponent.vue";
import IndexComponent from "./components/IndexComponent.vue";
import EditComponent from "./components/EditComponent.vue";

const routes = [
    {
        name: "home",
        path: "/",
        component: HomeComponent
    },
    {
        name: "create",
        path: "/create",
        component: CreateComponent
    },
    {
        name: "posts",
        path: "/posts",
        component: IndexComponent
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditComponent
    }
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");

// window.Vue = require('vue');

// import App from './App.vue';

// const app = new Vue({
//   el: '#app',
//   components: {
//     App
//   },
//   render: h => h(App)
// });
