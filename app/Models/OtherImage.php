<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherImage, $otherImages, $image, $imageName, $directory,$extension;
    private static function getImagUrl($image)
    {
        self::$extension= $image->getClientOriginalExtension();
        self::$imageName = 'product'.'-'.rand().'.'.self::$extension;
        self::$directory = 'adminAssets/product-other-image/';
        $image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }
    public static function newOtherImage($request, $id){
        foreach ($request->other_image as $image){
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id = $id;
            self::$otherImage->image = self::getImagUrl($image);
            self::$otherImage->save();
        }
    }
    public static function updateOtherImage($request,$id){
        self::$otherImages = OtherImage::where('product_id',$id)->get();
        foreach (self::$otherImages as $otherImage){
            if (file_exists(self::$otherImage->other_image)){
                unlink(self::$otherImage->other_image);
            }
            $otherImage->delete();
        }
        self::newOtherImage($request,$id);
    }
}
