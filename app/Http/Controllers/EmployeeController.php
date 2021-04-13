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
        $employees = Employee::latest()->paginate(1);
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
            'department' => 'required | exists:departments,id',
            'designation' => 'required | exists:designations,id',
            'project' => 'required | exists:projects,id',
            'company' => 'required | exists:companies,id',
        ]);

        $company = Company::where('id', request('company'))->first();

        if ($company->employees->count() === $company->no_employees) {
            return redirect()->route('employee.create');
        }

        $employee = new Employee();
        $employee->name = request('name');
        $employee->father_name = request('f_name');

        $employee->department_id = request('department');
        $employee->designation_id = request('designation');
        $employee->company_id = request('company');
        $employee->save();
        $employee->projects()->attach(request('project'));
        return redirect()->route('employee');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $projects = Project::all();
        $companies = Company::all();
        return view('employee.edit', [
            'employee' => $employee,
            'departments' => $departments,
            'designations' => $designations,
            'projects' => $projects,
            'companies' => $companies,
        ]);
    }

    public function update(Employee $employee)
    {
        dd($employee);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee');
    }

}
