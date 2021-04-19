<template>
    <div>
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
                <a class="btn btn-primary">Edit</a>
                <a class="btn btn-danger">Delete</a>
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
    }
};
</script>
