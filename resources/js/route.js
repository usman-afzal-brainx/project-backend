import Vue from "vue";
import VueRouter from "vue-router";
import home from "./components/home.vue";
import companies from "./components/companies/companies.vue";
import createCompany from "./components/companies/createCompany.vue";
import editCompany from "./components/companies/editCompany";
import employees from "./components/employees/employees.vue";
import createEmployee from "./components/employees/createEmployee.vue";

Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        { path: "/", component: home },
        { path: "/route/company", component: companies },
        {
            path: "/route/employee/create",
            component: createEmployee
        },
        {
            path: "/route/company/create",
            name: "company.create",
            component: createCompany
        },
        { path: "/route/employee", component: employees },
        { path: "/route/user", component: employees }
    ],
    mode: "history"
});
