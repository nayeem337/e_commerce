<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;


    public static $category , $imageFile , $imageDirectory , $imageName , $imageUrl ;

    public static function createCategory($request)
    {
        self::$imageFile = $request->File('image');
        if (self::$imageFile)
        {

            self::$imageName        = rand(10, 1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory   = 'admin/images/upload/category/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl         = self::$imageDirectory.self::$imageName;

        }
        self::$category                = new Category();
        self::$category->name           = $request->name;
        self::$category->description    = $request->description;
        self::$category->image          = self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();

    }

    public static function updateCategory($request , $id)
    {
        self::$category = Category::find($id);

        self::$imageFile = $request->file('image');
        if (self::$imageFile)
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }

            self::$imageName = rand(10, 1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory   = 'admin/images/upload/category/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl         = self::$imageDirectory.self::$imageName;

        }else{
            self::$imageUrl = self::$category->image;
        }



        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
