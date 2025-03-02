<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseHistory;
use App\Models\CaseModel; // Ensure this is the correct model for your cases
use Illuminate\Support\Facades\Storage;

class CaseHistoryController extends Controller
{
    // Show the form to submit case history
    public function create()
    {
        // Retrieve all cases for the dropdown
        $cases = CaseModel::all();
        return view('chistory', compact('cases'));
    }

    // Store the case history submission
    public function store(Request $request)
    {
        $request->validate([
            'case_id' => 'required|exists:cases,id', // Ensure the case exists
            'file_attachment' => 'required|file|mimes:pdf,docx', // Validate the file attachment
        ]);

        // Handle file upload
        $filePath = $request->file('file_attachment')->store('case_histories');

        // Create case history record
        CaseHistory::create([
            'case_id' => $request->case_id,
            'file_attachment' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Case history submitted successfully.');
    }

    // Display case histories
    public function index()
    {
        $caseHistories = CaseHistory::with('case')->get();
        return view('consultC', compact('caseHistories'));
    }

    public function viewCases()
    {
        // Fetch all cases
        $cases = CaseModel::all(); // Replace 'Case' with your actual model name if it's different

        // Pass the data to the view
        return view('chistory', compact('cases'));
    }

    
}
