<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;

    public function index ()
    {
        return view('admin.category.index');
    }

    public function manage ()
    {
        return view('admin.category.manage', [
            'categories' => Category::all(),
        ]);
    }
    public function store (Request $request)
    {
        Category::createOrUpdateCategory($request);
        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function edit ($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id),
        ]);
    }

    public function update (Request $request, $id)
    {
        Category::createOrUpdateCategory($request, $id);
        return redirect()->route('category.manage')->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
