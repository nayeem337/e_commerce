<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'status'
    ];

    public static function createOrUpdateSubCategory($request, $id = null)
    {
        SubCategory::updateOrCreate(['id' => $id], [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => fileUpload($request->file('image'), 'subCategory-images', isset($id) ? SubCategory::find($id)->image : null),
            'status' => $request->status
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
