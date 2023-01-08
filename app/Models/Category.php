<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image, $imageNewName, $directory, $imgUrl;

    public static function saveCategory($request)
    {
        if ($request->id){
            self::$category = Category::find($request->id);
        }else{
            self::$category =new Category();
        }
        self::$category->category_name = $request->category_name;
        if ($request->file('image')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = self::getImagUrl($request);
        }
        self::$category->publication_status = $request->publication_status;
        self::$category->save();
    }

    private static function getImagUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = 'category'.'-'.rand().'.'. self::$image->extension();
        self::$directory = 'adminAssets/category-image/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);
        return self::$imgUrl;
    }
    public static function status($id)
    {
        self::$category = Category::find($id);
        if (self::$category->publication_status == 1) {
            self::$category->publication_status = 2;
            self::$category->save();
        } else {
            self::$category->publication_status = 1;
            self::$category->save();
        }
    }

    public static function categoryDelete($request)
    {
        self::$category = Category::find($request->delete_id);
        if (self::$category->image) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
