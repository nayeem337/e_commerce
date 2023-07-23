<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Translation\CatalogueMetadataAwareInterface;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }
    public function manage()
    {
        return view('admin.category.manage',[
            'categories' => Category::all()
        ]);
    }
    public function create(Request $request)
    {

        Category::createCategory($request);
        return back()->with('success' , 'Category Added Successfully');
    }
    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit',[
            'category' =>$this->category
        ]);
    }
    public function update(Request $request , $id)
    {
        Category::updateCategory($request , $id);
        return redirect('/category/manage')->with('success' , 'Category Updated Successfully');
    }
    public function delete($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);

        }
        $this->category->delete();
        return redirect('/category/manage')->with('success', 'Category Deleted Successfully');
    }
}
