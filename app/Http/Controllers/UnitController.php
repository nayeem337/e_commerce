<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }
    public function create(Request $request)
    {
        Unit::createUnit($request);
        return back()->with('success' , 'Unit Added Successfully');
    }
    public function manage()
    {
        return view('admin.Unit.manage',[
            'units' => Unit::all()
        ]);
    }

    public function edit($id)
    {
        $this->unit = Unit::find($id);
        return view('admin.unit.edit',[
            'unit' =>$this->unit
        ]);
    }
    public function update(Request $request , $id)
    {
        Unit::updateUnit($request , $id);
        return redirect('/unit/manage')->with('success' , 'Unit Updated Successfully');
    }
    public function delete($id)
    {
        $this->unit = Unit::find($id);
        $this->unit->delete();
        return redirect('/unit/manage')->with('success', 'Unit Deleted Successfully');
    }
}
