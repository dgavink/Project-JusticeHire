<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalResource;
use Illuminate\Support\Facades\Storage;

class LegalResourceController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'resource-type' => 'required|string',
            'file-upload' => 'required|file|mimes:docx,pdf,txt,xlsx|max:2048', // Limit file size to 2MB
        ]);
    
        // Store the uploaded file
        if ($request->file('file-upload')->isValid()) {
            $filePath = $request->file('file-upload')->store('legal_resources');
    
            // Create a new resource record
            LegalResource::create([
                'resource_type' => $request->input('resource-type'),
                'file_path' => $filePath,
            ]);
    
            return back()->with('success', 'File uploaded successfully!');
        }
    
        return back()->withErrors(['file-upload' => 'File upload failed.']);
    }

    public function showResources()
    {
        // Fetch all legal resources from the database
        $legalResources = LegalResource::all();

        // Pass the data to the Blade view
        return view('legalrec', ['legalResources' => $legalResources]);
    }
    
}
