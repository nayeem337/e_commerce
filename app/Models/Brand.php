<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $brand , $imageFile , $imageDirectory , $imageName , $imageUrl ;

    public static function createBrand($request)
    {
        self::$imageFile = $request->File('image');
        if (self::$imageFile)
        {

            self::$imageName        = rand(10, 1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory   = 'admin/images/upload/brand/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl         = self::$imageDirectory.self::$imageName;

        }
        self::$brand                = new Brand();
        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->image          = self::$imageUrl;
        self::$brand->status = $request->status;
        self::$brand->save();

    }

    public static function updateBrand($request , $id)
    {
        self::$brand = Brand::find($id);

        self::$imageFile = $request->file('image');
        if (self::$imageFile)
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }

            self::$imageName = rand(10, 1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory   = 'admin/images/upload/brand/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl         = self::$imageDirectory.self::$imageName;

        }else{
            self::$imageUrl = self::$brand->image;
        }



        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageUrl;
        self::$brand->status = $request->status;
        self::$brand->save();
    }
}
