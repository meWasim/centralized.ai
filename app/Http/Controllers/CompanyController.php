<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        return view('owm.company.index', [
            'companies' => $companies,
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
            'industry' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'company_career_email' => 'required|email|max:255',
            'company_phone' => 'required|string|max:255',
            'career_page' => 'nullable|url|max:255',
        ]);



        try {

            Company::create($validated);

            return redirect()->back()->with('success', 'Data has been saved successfully.');
        } catch (\Exception $e) {


            return redirect()->back()->with('error', 'An error occurred while saving the data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

        return view('owm.company.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'company_career_email' => 'required|email|max:255',
            'company_phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'career_page' => 'nullable|url|max:255',
        ]);

        try {
            // Update the company's details
            $company->update($validated);

            // Redirect back with success message
            return redirect()->route('company.index')->with('success', 'Company details updated successfully!');
        } catch (\Exception $e) {


            return redirect()->back()->with('error', 'An error occurred while updating the company.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
            return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('company.index')->with('error', 'Failed to delete the company. Please try again.');
        }
    }


    public function download($id)
    {
        $company = Company::findOrFail($id);

        // Load the same Blade view used for showing the invoice
        $pdf = Pdf::loadView('owm.company.download', compact('company'));

        // Download the PDF with a custom filename
        return $pdf->download("Company_Details_{$company->name}.pdf");
    }
}
