<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use App\SubOffice;

class SubOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subOffices = SubOffice::all();

        return view('subOffice.index', compact('subOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::all();
        return view('subOffice.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubOffice::create($request->all());
        return redirect()->route('sub-offices.index')
                ->with('success', 'Office created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubOffice $subOffice)
    {
        return view('subOffice.view', compact('subOffice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubOffice $subOffice)
    {
        $offices = Office::all();
        return view('subOffice.edit', compact('subOffice', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubOffice $subOffice)
    {
        $subOffice->update($request->all());
        
        return redirect()->route('sub-offices.index')
                ->with('success', 'Sub office updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubOffice $subOffice)
    {
        $subOffice->delete();

        return redirect()->route('sub-offices.index')
                ->with('success', 'Sub office deleted successfully.');
    }
}
