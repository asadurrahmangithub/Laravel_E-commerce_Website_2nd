<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-subcategory',[
            'categories'=>Category::all(),
            'subcategories'=>DB::table('sub_categories')
                ->join('categories','sub_categories.category_id','categories.id')
                ->select('sub_categories.*','categories.category_name')
                ->get()
        ]);
    }
    public function saveSubCategory(Request $request){
        SubCategory::saveSubCategory($request);
        if($request->id){
            return redirect('sub-category')->with('massage','Sub Category Section Update Successfully');
        }else{
            return redirect('sub-category')->with('massage','Sub Category Section Add Successfully');
        }

    }
    public function editSubCategory($id){
        return view('admin.category.edit-subcategory',[
            'subcategory' =>SubCategory::find($id),
            'categories'=>Category::all(),

        ]);
    }
    public function subStatus($id){
        SubCategory::subStatus($id);
        return back()->with('massage','Status changes successfully');
    }
    public function deleteSubCategory(Request $request){
        SubCategory::deleteSubCategory($request);
        return back()->with('massage','Category Delete Successfully');
    }
}
