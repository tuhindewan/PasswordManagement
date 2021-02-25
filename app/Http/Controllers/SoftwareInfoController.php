<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use App\SubOffice;
use Illuminate\Support\Facades\DB;
use App\SoftwareInfo;
use App\Employee;

class SoftwareInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwareInfos = SoftwareInfo::all();

        return view('softwareInfo.index', compact('softwareInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::all();
        $subOffices = SubOffice::all();
        return view('softwareInfo.create', compact('offices', 'subOffices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SoftwareInfo::create($request->all());
        return redirect()->route('software-infos.index')
                ->with('success', 'Office created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SoftwareInfo $softwareInfo)
    {
        return view('softwareInfo.view', compact('softwareInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SoftwareInfo $softwareInfo)
    {
        $offices = Office::all();
        $subOffices = SubOffice::all();
        return view('softwareInfo.edit', compact('offices', 'softwareInfo', 'subOffices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoftwareInfo $softwareInfo)
    {
        $softwareInfo->update($request->all());
        return redirect()->route('software-infos.index')
                ->with('success', 'Software information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoftwareInfo $softwareInfo)
    {
        $softwareInfo->delete();

        return redirect()->route('software-infos.index')
                ->with('success', 'Software deleted successfully.');
    }

    // Get sub office list by office in Software Inforamtion create page
    // Get sub office list by office in Employee create page
    public function getSubOffices(Office $office)
    {
        $subOffices = DB::table('sub_offices')->where('office_id', $office->id)->pluck('name', 'id');
        return json_encode($subOffices);
    }

    // Get sub office list by office in Software Inforamtion edit page
    public function getSubOfficesForSoftware(SoftwareInfo $softwareInfo, Office $office)
    {
        $subOffices = DB::table('sub_offices')->where('office_id', $office->id)->pluck('name', 'id');
        return json_encode($subOffices);
    }


    // Get software list by office in Employee create page
    public function getSoftwareList(SubOffice $subOffice)
    {
        $softwares = DB::table('software_infos')->where('sub_office_id', $subOffice->id)->pluck('name', 'id');
        return json_encode($softwares);
    }


    // Get sub office list by office in Employee edit page
    public function getSubOfficesForEmployee(Employee $employee, Office $office)
    {
        $subOffices = DB::table('sub_offices')->where('office_id', $office->id)->pluck('name', 'id');
        return json_encode($subOffices);
    }

    // Get software list by office in Employee Edit page
    public function getSoftwareListForEmployee(Employee $employee, SubOffice $subOffice)
    {
        $softwares = DB::table('software_infos')->where('sub_office_id', $subOffice->id)->pluck('name', 'id');
        return json_encode($softwares);
    }

    
}
