<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected static $brand;

    protected $fillable = ['name', 'description', 'image', 'status'];

    public static function createOrUpdateBrand($request, $id = null)
    {
        Brand::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'description' => $request->description,
            'image' => fileUpload($request->file('image'), 'brand-images', isset($id) ? Brand::find($id)->image : null),
            'status' => $request->status
        ]);
    }
}
