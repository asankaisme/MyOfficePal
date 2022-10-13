<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::where('status', 'A')->get();
        return view('masterData.department', compact('departments'));
    }

    public function addDepartment(Request $request)
    {
        $departmentName = $request->input('departmentName');
        //$status = 'A';
        $isInsertSuccessed = Department::insert(['departmentName' => $departmentName, 'status' => 'A']);
        return redirect(route('manageDepartment'));
    }
}
