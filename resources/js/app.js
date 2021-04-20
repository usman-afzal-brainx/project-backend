import Vue from "vue";
import route from "./route";
import VueRouter from "vue-router";

import exampleComponent from "./components/exampleComponent";
require("./bootstrap");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueRouter);

const app = new Vue({
    el: "#app",
    router: route,
    render: h => h(exampleComponent)
});
