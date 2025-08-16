<?php

namespace App\Http\Controllers;
use App\Models\CaseModel;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function store(Request $request)
    {

        /*// Validate incoming request
        $request->validate([
            'lawyerName' => 'required|string',
            'clientName' => 'required|string',
            'holdername' => 'required|string',
            'nic' => 'required|string|max:12',
            'contact' => 'required|string|max:15',
            'caseCategory' => 'required|string',
            'courtType' => 'required|string',
            'venue' => 'required|string',
            'caseDateTime' => 'required|date',
            'fileAttachment' => 'nullable',
            'fileAttachment.*' => 'nullable|file|mimes:pdf,docx,txt,xlsx',
        ]);*/
    
        // Retrieve the authenticated user's ID
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->back()->withErrors('User not authenticated');
        }
    
        // Handle file uploads and save filenames in the database
        if ($request->hasFile('fileAttachment')) {
            $fileNames = [];
            foreach ($request->file('fileAttachment') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);  // Save file to 'uploads' folder
                $fileNames[] = $filename;
            }
            $validatedData['file_attachment'] = implode(',', $fileNames);  // Store filenames as comma-separated string
        }
    
        // Store form data in the 'cases' table
        CaseModel::create([
            'user_id' => $user->user_id,  // Set the authenticated user's ID
            'lawyer_name' => $request->lawyerName,
            'client_name' => $request->clientName,
            'holder_name' => $request->holdername,
            'nic' => $request->nic,
            'contact' => $request->contact,
            'case_category' => $request->caseCategory,
            'court_type' => $request->courtType,
            'venue' => $request->venue,
            'case_date_time' => $request->caseDateTime,
            'file_attachment' => $request->file_attachment ?? null,
        ]);

    
        return redirect()->route('consultC')->with('success', 'Case submitted successfully!');
    }

    public function search()
    {
        return view('search-case');
    }

    // Handle search by NIC
    public function searchCaseByNic(Request $request)
    {
        // Validate the NIC input
        $request->validate([
            'nic' => 'required|string',
        ]);
        $lawyer_name = Auth::user()->lawyer->name;

        $lawyerCases = CaseModel::where('lawyer_name' ,$lawyer_name)->get();
        $caseHistories = CaseHistory::all();
        // return view('consultC', compact('lawyerCases'));
        // Retrieve the case based on NIC
        $cases = CaseModel::where('nic', $request->nic)->get();
    
        // Pass the case details to the consult view
        return view('consultC', compact('cases', 'lawyerCases','caseHistories'));
    }
    
    public function showCaseHistory()
    {
        // Retrieve all records from the CaseHistory table
        $caseHistories = CaseHistory::all();

        // Pass the data to the Blade view
        return view('consultC', compact('caseHistories'));
    }

}
