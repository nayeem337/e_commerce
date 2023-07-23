<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected static $unit;

    protected $fillable = ['name', 'description', 'code', 'status'];

    public static function createOrUpdateUnit($request, $id = null)
    {
        Unit::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'status' => $request->status
        ]);
    }
}
