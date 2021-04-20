<template>
    <div>
        <router-link to="/route/company/create" class="btn btn-primary"
            >Create</router-link
        >
        <div class="company" v-for="company in companies" :key="company.id">
            <div class="heading">
                <h2>
                    <a href="">Company</a>
                </h2>
            </div>
            <div class="company-name">
                <h4>Name:</h4>
                <p>{{ company.name }}</p>
            </div>
            <div class="company-city">
                <h4>City:</h4>
                <p>{{ company.city.name }}</p>
            </div>
            <div class="country-city">
                <h4>Country</h4>
                <p>{{ company.city.country.name }}</p>
            </div>
            <div class="company-employee-strength">
                <h4>Number of Employees</h4>
                <p>{{ company.no_employees }}</p>
            </div>
            <div class="company-logo">
                <h4>Logo</h4>
                <img src="" alt="" /><br />
            </div>
            <div class="buttons pt-2">
                <button
                    class="btn btn-primary"
                    v-on:click="handleEdit(company)"
                >
                    Edit
                </button>
                <button
                    class="btn btn-danger"
                    v-on:click="handleDelete(company)"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            companies: []
        };
    },
    async created() {
        let token = window.api_token;
        try {
            const { data } = await axios.get("/api/company", {
                headers: {
                    Authorization: "Bearer " + token,
                    Accept: "application/json"
                }
            });
            const companies = data.companies;
            this.companies = companies;
        } catch (ex) {
            console.log(ex);
        }
    },
    methods: {
        handleEdit(company) {
            this.$router.push({
                name: "company.create",
                params: { company }
            });
        },
        async handleDelete(company) {
            try {
                await axios.delete("/api/company/delete", {
                    headers: {
                        Authorization: "Bearer " + window.api_token,
                        Accept: "application/json"
                    },
                    params: {
                        id: company.id
                    }
                });
                const companies = this.companies.filter(
                    c => c.id !== company.id
                );
                this.companies = companies;
            } catch (error) {
                console.log(error);
            }
        }
    }
};
</script>
