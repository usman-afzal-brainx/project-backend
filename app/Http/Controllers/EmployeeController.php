<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Project;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('employee.index', ['employees' => $employees]);
    }

    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $projects = Project::all();
        $companies = Company::all();

        return view('employee.create', [
            'departments' => $departments,
            'designations' => $designations,
            'projects' => $projects,
            'companies' => $companies,
        ]);
    }

    public function store()
    {

        request()->validate([
            'name' => 'required',
            'f_name' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'project' => 'required',
        ]);

        $company = Company::where('id', request('company'))->first();

        $companyStrength = count($company->employees);
        $companyMaxStrength = $company->no_employees;

        if ($companyStrength === $companyMaxStrength) {
            return redirect('/employee/create');
        }

        $employee = new Employee();
        $employee->name = request('name');
        $employee->father_name = request('f_name');

        $designation = Designation::where('id', request('designation'))->first();

        $department = Department::where('id', request('department'))->first();

        $project = Project::where('id', request('project'))->first();

        $employee->department_id = $department->id;
        $employee->designation_id = $designation->id;
        $employee->company_id = $company->id;
        $employee->save();
        $employee->projects()->attach($project);
        return redirect('/employee');
    }
}
