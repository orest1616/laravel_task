<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'nullable|url',
        ]);
        $company = new Company();
        $company->name = $validated['name'];
        $company->email = $validated['email'] ?? null;
        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
        }
        $company->website = $validated['website'] ?? null;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }
}
