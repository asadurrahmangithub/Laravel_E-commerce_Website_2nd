<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subcategory;
    public static function saveSubCategory($request)
    {
        if ($request->id){
            self::$subcategory = SubCategory::find($request->id);
        }else{
            self::$subcategory =new SubCategory();
        }
        self::$subcategory->category_id = $request->category_name;
        self::$subcategory->subcategory_name = $request->subcategory_name;
        self::$subcategory->publication_status = $request->publication_status;
        self::$subcategory->save();
    }
    public static function subStatus($id)
    {
        self::$subcategory = SubCategory::find($id);
        if (self::$subcategory->publication_status == 1) {
            self::$subcategory->publication_status = 2;
            self::$subcategory->save();
        } else {
            self::$subcategory->publication_status = 1;
            self::$subcategory->save();
        }
    }
    public static function deleteSubCategory($request)
    {
        self::$subcategory = SubCategory::find($request->delete_id);
        self::$subcategory->delete();
    }
}
