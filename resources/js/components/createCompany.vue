<template>
    <div class="company-form">
        <div class="company-form-label">
            <h2>Company Form</h2>
        </div>
        <form>
            <div class="company-form-name">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        v-model="name"
                    />
                </div>
            </div>
            <div class="company-form-no_employees">
                <div class="form-group">
                    <label for="no_employees">Number of employees</label>
                    <input
                        type="text"
                        class="form-control"
                        id="no_employees"
                        v-model="no_employees"
                    />
                </div>
            </div>
            <div class="company-form-country">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="custom-select" id="country">
                        <option selected>Pakistan</option>
                    </select>
                </div>
            </div>
            <div class="company-form-city">
                <div class="form-group">
                    <label for="city">City</label>
                    <select class="custom-select" id="city">
                        <option selected>Lahore</option>
                    </select>
                </div>
            </div>
            <div class="company-form-logo">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" id="logo" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            no_employees: "",
            country: "",
            city: "",
            logo: ""
        };
    }
};
</script>
