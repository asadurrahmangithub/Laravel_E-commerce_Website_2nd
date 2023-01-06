<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category',[
            'categories'=>Category::all()
        ]);
    }
    public function saveCategory(Request $request){
        Category::saveCategory($request);
        if($request->id){
            return redirect('category')->with('massage','Category Section Update Successfully');
        }else{
            return redirect('category')->with('massage','Category Section Add Successfully');
        }

    }
    public function editCategory($id){
        return view('admin.category.edit-category',[
            'category' => Category::find($id),
        ]);
    }
    public function status($id){
        Category::status($id);
        return back()->with('massage','Status changes successfully');
    }
    public function categoryDelete(Request $request){
        Category::categoryDelete($request);
        return back()->with('massage','Category Delete Successfully');
    }
}
