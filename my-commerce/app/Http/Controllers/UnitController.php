<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public $unit;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit.manage', ['units' => Unit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unit::createOrUpdateUnit($request);
        return redirect()->back()->with('success', 'Unit Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.unit.edit', [
            'unit' => Unit::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Unit::createOrUpdateUnit($request, $id);
        return redirect()->route('units.index')->with('success', 'Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->unit = Unit::find($id);
        $this->unit->delete();
        return redirect()->back()->with('success', 'Unit Deleted Successfully');
    }
}
