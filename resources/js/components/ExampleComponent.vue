<template>
    <div class="pl-4 pt-2">
        <div class="row">
            <div class="col-md-8">
                <h1>Welcome to the Home Page.</h1>
                <employees></employees>
            </div>
        </div>
    </div>
</template>
<script>
import employees from "./employees.vue";
export default {
    mounted() {
        // this.fetchUser();
    },
    components: {
        employees
    },
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
