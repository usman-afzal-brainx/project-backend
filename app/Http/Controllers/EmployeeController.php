<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.create');
    }
}
