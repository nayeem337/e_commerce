<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function create(Request $request)
    {
        Brand::createBrand($request);
        return back()->with('success' , 'Brand Added Successfully');
    }
    public function manage()
    {
        return view('admin.brand.manage',[
            'brands' => Brand::all()
        ]);
    }

    public function edit($id)
    {
        $this->brand = Brand::find($id);
        return view('admin.brand.edit',[
            'brand' =>$this->brand
        ]);
    }
    public function update(Request $request , $id)
    {
        Brand::updateBrand($request , $id);
        return redirect('/brand/manage')->with('success' , 'Brand Updated Successfully');
    }
    public function delete($id)
    {
        $this->brand = Brand::find($id);
        if (file_exists($this->brand->image))
        {
            unlink($this->brand->image);

        }
        $this->brand->delete();
        return redirect('/brand/manage')->with('success', 'Brand Deleted Successfully');
    }
}
