<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Hr;
use Illuminate\Http\Request;

class HrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hrs = Hr::orderBy('id','desc')->with('company')->get();
        $companies=Company::all();
        return view('owm.hr.index',[
            'hrs'=>$hrs,
            'companies'=>$companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|url|max:255',

        ]);

        try {
            Hr::create($validated);

            return redirect()->back()->with('success', 'HR data has been saved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving HR data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hr $hr)
    {
        $hr->load('company');
        return view('owm.hr.show',[
            'hr'=>$hr,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hr $hr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hr $hr)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|url|max:255',
        ]);

        try {
            $hr->update($validated);
            return redirect()->back()->with('success', 'HR details updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating HR details.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hr $hr)
    {
        try {
            $hr->delete();
            return redirect()->route('company.index')->with('success', 'Hr deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('company.index')->with('error', 'Failed to delete the hr. Please try again.');
        }
    }


}
