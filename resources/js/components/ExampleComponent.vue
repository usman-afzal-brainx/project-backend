<template>
    <div class="pl-4 pt-2">
        <div class="row">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup"
                            aria-controls="navbarNavAltMarkup"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse"
                            id="navbarNavAltMarkup"
                        >
                            <div class="navbar-nav">
                                <router-link
                                    class="nav-link active"
                                    aria-current="page"
                                    to="/"
                                    >Home</router-link
                                >
                                <router-link
                                    class="nav-link"
                                    to="/route/company"
                                    >Company</router-link
                                >
                                <router-link
                                    class="nav-link"
                                    to="/route/employee"
                                    >Employee</router-link
                                >
                            </div>
                        </div>
                    </div>
                </nav>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
// import createEmployee from "./employees/createEmployee.vue";
export default {
    mounted() {
        // this.fetchUser();
    },
    // components: {
    //     createEmployee
    // },
    methods: {
        fetchUser() {
            let token = window.api_token;
            axios
                .get("/api/user", {
                    headers: {
                        Authorization: "Bearer " + token,
                        Accept: "application/json"
                    }
                })
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
