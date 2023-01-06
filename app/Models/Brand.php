<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $imageNewName, $directory, $imgUrl;

    public static function saveBrand($request)
    {
        if ($request->id){
            self::$brand = Brand::find($request->id);
        }else{
            self::$brand =new Brand();
        }
        self::$brand->name = $request->name;
        if ($request->file('image')) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = self::getImagUrl($request);
        }
        self::$brand->publication_status = $request->publication_status;
        self::$brand->save();
    }
    private static function getImagUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'brand'.'-'.rand().'.'.self::$image->extension();
        self::$directory = 'adminAssets/brand-image/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function brandStatus($id)
    {
        self::$brand = Brand::find($id);
        if (self::$brand->publication_status == 1) {
            self::$brand->publication_status = 2;
        } else {
            self::$brand->publication_status = 1;
        }
        self::$brand->save();
    }

    public static function deleteBrand($request)
    {
        self::$brand = Brand::find($request->delete_id);
        if (self::$brand->image) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
        }
        self::$brand->delete();
    }
}
