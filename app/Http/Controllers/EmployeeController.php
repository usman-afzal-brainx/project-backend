<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Project;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.create');
    }

    public function store()
    {
        $company = Company::where('name', request('company'))->first();
        if (!$company) {
            return redirect('/company/create');
        }
        $employee = new Employee();
        $employee->name = request('name');
        $employee->father_name = request('f_name');

        $designation = Designation::where('name', request('designation'))->first();

        if (!$designation) {
            $designation = new Designation();
            $designation->name = request('designation');
            $designation->save();
        }

        $department = Department::where('name', request('department'))->first();

        if (!$department) {
            $department = new Department();
            $department->name = request('department');
            $department->save();
        }
        $project = Project::where('name', request('project'))->first();
        if (!$project) {
            $project = new Project();
            $project->name = request('project');
            $project->save();
        }
        $employee->department_id = $department->id;
        $employee->designation_id = $designation->id;
        $employee->company_id = $company->id;
        $employee->save();
        $employee->projects()->attach($project);
        return redirect('/employee/create');
    }
}
