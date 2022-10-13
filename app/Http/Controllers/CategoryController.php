<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('status', 'A')->get();
        return view('masterData.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $categoryName = $request->input('categoryName');
        //$status = 'A';
        $isInsertSuccessed = Category::insert(['categoryName' => $categoryName, 'status' => 'A']);
        return redirect(route('manageCategory'));
    }
}
