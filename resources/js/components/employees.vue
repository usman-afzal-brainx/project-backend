<template>
    <div class="container-fluid">
        <div class="row">
            <div
                class="no-employee-message col-sm-5"
                v-if="employees.length === 0"
            >
                <p>
                    There are no employees in database
                </p>
            </div>
            <div class="col-sm-5" v-if="employees.length > 0">
                <div
                    class="employee"
                    v-for="employee in employees"
                    :key="employee.id"
                >
                    <div class="heading">
                        <h2>Employee</h2>
                    </div>
                    <div class="employee-name">
                        <h4>Name:</h4>
                        <p>{{ employee.name }}</p>
                    </div>
                    <div class="employee-father-name">
                        <h4>Father Name:</h4>
                        <p>{{ employee.father_name }}</p>
                    </div>
                    <div class="employee-designation">
                        <h4>Designation:</h4>
                        <p>{{ employee.designation.name }}</p>
                    </div>
                    <div class="employee-department">
                        <h4>Department:</h4>
                        <p>{{ employee.department.name }}</p>
                    </div>
                    <div class="employee-company">
                        <h4>Company:</h4>
                        <p>{{ employee.company.name }}</p>
                    </div>
                    <div
                        class="employee-project"
                        v-for="project in employee.projects"
                        :key="project.id"
                    >
                        <h4>project: {{ project.id }}</h4>
                        <p>{{ project.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            employees: []
        };
    },
    async created() {
        try {
            const { data } = await axios.get("/api/employee", {
                headers: {
                    Authorization: "Bearer " + window.api_token,
                    Accept: "application/json"
                }
            });
            console.log(data);
            this.employees = data.employees;
        } catch (error) {
            console.log(error);
        }
    }
};
</script>
