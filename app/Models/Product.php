<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image, $imageNewName, $directory, $imgUrl;

    public static function saveProduct($request)
    {
        self::$product =new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->product_name = $request->product_name;
        self::$product->product_code = $request->sub_description;
        self::$product->description = $request->description;
        self::$product->sub_description = $request->product_Code;
        self::$product->product_stroke = $request->product_stroke;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->image = self::getImagUrl($request);
        self::$product->publication_status = $request->publication_status;
        self::$product->save();
        return self::$product;
    }
    private static function getImagUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'product'.'-'.rand().'.'.self::$image->extension();
        self::$directory = 'adminAssets/product-image/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function productStatus($id)
    {
        self::$product = Product::find($id);
        if (self::$product->publication_status == 1) {
            self::$product->publication_status = 2;
            self::$product->save();
        } else {
            self::$product->publication_status = 1;
            self::$product->save();
        }
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function otherImages(){
        return $this->hasMany(OtherImage::class);
    }

    public static function updateProduct($request,$id)
    {
        self::$product = Product::find($id);
        if ($request->file('image')){
            if (file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$imgUrl = self::getImagUrl($request);
        }
        else{
            self::$imgUrl = self::$product->image;
        }
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->product_name = $request->product_name;
        self::$product->product_code = $request->sub_description;
        self::$product->description = $request->description;
        self::$product->sub_description = $request->product_code;
        self::$product->product_stroke = $request->product_stroke;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->image = self::$imgUrl;
        self::$product->publication_status = $request->publication_status;
        self::$product->save();

    }
}
