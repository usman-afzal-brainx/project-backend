<template>
    <div class="company-form">
        <div class="company-form-label">
            <h2>Company Form</h2>
        </div>
        <form @submit.prevent="handleSubmit">
            <div class="company-form-name">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        v-model="company.name"
                    />
                    <p v-if="errors.name" style="color: red">
                        {{ errors.name }}
                    </p>
                </div>
            </div>
            <div class="company-form-no_employees">
                <div class="form-group">
                    <label for="no_employees">Number of employees</label>
                    <input
                        type="number"
                        class="form-control"
                        id="no_employees"
                        v-model="company.no_employees"
                    />
                    <p v-if="errors.no_employees" style="color: red">
                        {{ errors.no_employees }}
                    </p>
                </div>
            </div>
            <div class="company-form-country">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select
                        class="custom-select"
                        id="country"
                        v-model="company.country"
                        @change="getCities($event)"
                    >
                        <option
                            v-for="country in countries"
                            :key="country.id"
                            :value="country.id"
                            >{{ country.name }}</option
                        >
                    </select>
                    <p v-if="errors.country" style="color: red">
                        {{ errors.country }}
                    </p>
                </div>
            </div>
            <div class="company-form-city">
                <div class="form-group">
                    <label for="city">City</label>
                    <select
                        class="custom-select"
                        id="city"
                        v-model="company.city"
                    >
                        <option
                            v-for="city in cities"
                            :key="city.id"
                            :value="city.id"
                            >{{ city.name }}</option
                        >
                    </select>
                    <p v-if="errors.city" style="color: red">
                        {{ errors.city }}
                    </p>
                </div>
            </div>
            <!-- <div class="company-form-logo">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input
                        type="file"
                        class="form-control-file"
                        id="logo"
                        @change="setLogo"
                    />
                    <p v-if="errors.logo" style="color: red">
                        {{ errors.logo }}
                    </p>
                </div>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            countries: [],
            cities: [],
            errors: {
                name: "",
                city: "",
                country: "",
                logo: "",
                city: ""
            },
            company: {
                name: "",
                no_employees: "",
                country: null,
                city: null
                // logo: null
            }
        };
    },
    async created() {
        let token = window.api_token;
        try {
            let { data } = await axios.get("/api/country", {
                headers: {
                    Authorization: "Bearer " + token,
                    Accept: "application/json"
                }
            });
            this.countries = data.countries;
            if (this.countries && this.countries.length > 0) {
                this.company.country = this.countries[0].id;
            }
            let cities = await axios.get("/api/country/cities", {
                headers: {
                    Authorization: "Bearer " + token,
                    Accept: "application/json"
                },
                params: {
                    id: this.company.country
                }
            });
            this.cities = cities.data.cities;
            if (this.cities && this.cities.length > 0) {
                this.company.city = this.cities[0].id;
            }
        } catch (ex) {
            console.log(ex);
        }
    },
    methods: {
        setLogo(e) {
            this.company.logo = e.target.files[0];
        },
        async getCities(event) {
            let token = window.api_token;
            try {
                const { data } = await axios.get("/api/country/cities", {
                    headers: {
                        Authorization: "Bearer " + token,
                        Accept: "application/json"
                    },
                    params: {
                        id: event.target.value
                    }
                });
                this.cities = data.cities;
                if (this.cities && this.cities.length > 0) {
                    this.company.city = this.cities[0].id;
                }
            } catch (error) {
                console.log(error);
            }
        },
        async handleSubmit() {
            if (this.errors.name && this.company.name) delete this.errors.name;
            // if (this.errors.logo && this.company.logo) delete this.errors.logo;
            if (this.errors.country && this.company.country)
                delete this.errors.country;
            if (this.errors.city && this.company.city) delete this.errors.city;
            if (this.errors.no_employees && this.company.no_employees)
                delete this.errors.no_employees;

            if (
                this.company.name &&
                this.company.no_employees &&
                this.company.country &&
                this.company.city
            ) {
                try {
                    let data = {
                        api_token: window.api_token,
                        name: this.company.name,
                        city: this.company.city,
                        country: this.company.country,
                        no_employees: this.company.no_employees
                    };
                    await axios.post("/api/company/store", data);
                    this.company.name = "";
                    this.company.no_employees = "";
                    //  this.company.logo = null;
                } catch (error) {
                    console.log(error);
                }
            } else {
                if (!this.company.name) this.errors.name = "Name is required.";
                if (!this.company.no_employees)
                    this.errors.no_employees =
                        "Number of employees are required";
                if (!this.company.country)
                    this.errors.country = "Country is required.";
                if (!this.company.city) this.errors.city = "City is required.";
                //if (!this.company.logo) this.errors.logo = "Logo is required.";
            }
        }
    }
};
</script>
