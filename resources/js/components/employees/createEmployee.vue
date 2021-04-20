<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7">
                <div class="create-employee">
                    <h1>Create Employee Form</h1>
                    <form @submit.prevent="handleSubmit">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                v-model="employee.name"
                            />
                        </div>
                        <div class="form-group">
                            <label for="father_name">Father Name: </label>
                            <input
                                type="text"
                                class="form-control"
                                id="father_name"
                                v-model="employee.father_name"
                            />
                        </div>
                        <div class="form-group">
                            <label for="department">Department: </label>
                            <select
                                class="custom-select"
                                id="department"
                                v-model="employee.department"
                            >
                                <option
                                    v-for="department in departments"
                                    :key="department.id"
                                    :value="department.id"
                                    >{{ department.name }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation: </label>
                            <select
                                class="custom-select"
                                id="designation"
                                v-model="employee.designation"
                            >
                                <option
                                    v-for="designation in designations"
                                    :key="designation.id"
                                    :value="designation.id"
                                    >{{ designation.name }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="project">Project: </label>
                            <select
                                class="custom-select"
                                id="project"
                                v-model="employee.project"
                            >
                                <option
                                    v-for="project in projects"
                                    :key="project.id"
                                    :value="project.id"
                                    >{{ project.name }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="company">Company: </label>
                            <select
                                class="custom-select"
                                id="company"
                                v-model="employee.company"
                            >
                                <option
                                    v-for="company in companies"
                                    :key="company.id"
                                    :value="company.id"
                                    >{{ company.name }}</option
                                >
                            </select>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            companies: [],
            departments: [],
            projects: [],
            designations: [],
            employee: {
                name: "",
                father_name: "",
                company: "",
                designation: "",
                department: "",
                project: ""
            }
        };
    },
    async created() {
        try {
            const { data } = await axios.get("/api/employee/create", {
                headers: {
                    Authorization: "Bearer" + window.api_token,
                    Accept: "application/json"
                }
            });
            this.companies = data.companies;
            this.departments = data.departments;
            this.projects = data.projects;
            this.designations = data.designations;
            if (this.companies && this.companies.length > 0)
                this.employee.company = this.companies[0].id;
            if (this.designations && this.designations.length > 0)
                this.employee.designation = this.designations[0].id;
            if (this.departments && this.departments.length > 0)
                this.employee.department = this.departments[0].id;
            if (this.projects && this.projects.length > 0)
                this.employee.project = this.projects[0].id;
        } catch (error) {
            console.log(error);
        }
    },
    methods: {
        async handleSubmit() {
            let data = {
                name: this.employee.name,
                f_name: this.employee.father_name,
                company: this.employee.company,
                designation: this.employee.designation,
                department: this.employee.department,
                project: this.employee.project
            };
            try {
                await axios.post("/api/employee/store", data);
                this.employee.name = "";
                this.employee.father_name = "";
            } catch (error) {
                console.log(error);
            }
        }
    }
};
</script>
