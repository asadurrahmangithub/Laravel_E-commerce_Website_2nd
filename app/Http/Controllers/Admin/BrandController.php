<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.brand',[
            'brands'=>Brand::all()
        ]);
    }
    public function saveBrand(Request $request){
        Brand::saveBrand($request);
        if($request->id){
            return redirect('brand')->with('massage','Brand Section Update Successfully');
        }else{
            return redirect('brand')->with('massage','Brand Section Add Successfully');
        }
    }
    public function editBrand($id){
        return view('admin.brand.edit-brand',[
            'brand' => Brand::find($id),
        ]);
    }
    public function brandStatus($id){
        Brand::brandStatus($id);
        return back()->with('massage','Status changes successfully');
    }
    public function deleteBrand(Request $request){
        Brand::deleteBrand($request);
        return back()->with('massage','Category Delete Successfully');
    }
}
