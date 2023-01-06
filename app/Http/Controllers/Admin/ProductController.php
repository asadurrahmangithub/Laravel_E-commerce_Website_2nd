<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;

class ProductController extends Controller
{
    private $product;
    public function index(){
        return view('admin.product.add-product',[
            'categories' => Category::where('publication_status',1)->get(),
            'subCategories' => SubCategory::where('publication_status',1)->get(),
            'brands' => Brand::where('publication_status',1)->get(),
        ]);
    }
    public function saveProduct(Request $request){
        $this->product = Product::saveProduct($request);
        OtherImage::newOtherImage($request, $this->product->id);
        return redirect('product')->with('message','Product Section Update Successfully');

    }
    public function editProduct($id){
        return view('admin.product.edit-product',[
            'categories' => Category::where('publication_status',1)->get(),
            'subCategories' => SubCategory::where('publication_status',1)->get(),
            'brands' => Brand::where('publication_status',1)->get(),
            'product'=>Product::find($id)
        ]);
    }
    public function manageProduct(){
        return view('admin.product.manage-product',[
            'products' =>Product::all()
        ]);
    }
    public function status($id){
        Product::productStatus($id);
        return back()->with('message','Status changes successfully');
    }
    public function detailsProduct($id){
        return view('admin.product.product-details',[
            'product' => Product::find($id),
        ]);

    }
    public function updateProduct(Request $request,$id){
        Product::updateProduct($request,$id);
        if ($request->file('other_image')){
            OtherImage::updateOtherImage($request,$id);
        }
        return redirect('manage-product')->with('message','Product Update Successfully');
    }
    public function deleteProduct(Request $request){

    }
}
