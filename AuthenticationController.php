<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\Police;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\CaseModel;
use App\Models\Appointment;
use App\Models\CaseHistory;

use Hash;
use Auth;

class AuthenticationController extends Controller
{
    function registerIndex() {
        return view('auth.register');
    }

    function loginindex() {


        return view('auth.login');
    }

    function clientPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'client_name' => 'required',
            'client_nic' => 'required',
            'client_address' => 'required',
            'client_contact' => 'required',
            'client_email' => 'required',
        ]);
        
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'user_type' => 'client',
        ]);

        Client::create([
            'user_id' => $user->user_id,
            'name' => $request->client_name,
            'nic' => $request->client_nic,
            'address' => $request->client_address,
            'contactNo' => $request->client_contact,
            'email' => $request->client_email,
        ]);

    return redirect()->route('login');

    }

    function lawyerPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'lawyer_name' => 'required',
            'lawyer_reg_number' => 'required',
            'lawyer_email' => 'required',
            'lawyer_address' => 'required',
            'lawyer_contact' => 'required',
            'lawyerCategory' => 'required',
            'courtCategory' => 'required',
            'yearsOfExperience' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'user_type' => 'lawyer',
        ]);

        Lawyer::create([
            'user_id' => $user->user_id,
            'name' => $request->lawyer_name,
            'govRegistrationNumber' => $request->lawyer_reg_number,
            'email' => $request->lawyer_email,
            'contactNo' => $request->lawyer_contact,
            'address' => $request->lawyer_address,
            'lawyerCategory' => $request->lawyerCategory,
            'courtCategory' => $request->courtCategory,
            'yearsOfExperience' => $request->yearsOfExperience,
        ]);

    return redirect()->route('login');

    }
    
    function policePost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'police_division_name' => 'required',
            'police_division_id' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'user_type' => 'police',
        ]);

        Police::create([
            'user_id' => $user->user_id,
            'division_name' => $request->police_division_name,
            'division_id' => $request->police_division_id,
        ]);

    return redirect()->route('login');

    }
    function loginPost(Request $request) {
        
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');  // Redirect to the unified dashboard
        } else {
            return redirect()->back()->with('error', "Incorrect username or password!");
        }
    
    }

    public function index()
    {
        
        
        $lawyers = Lawyer::all();
        if(Auth::user()->user_type == 'lawyer'){
            $lawyer_name = Auth::user()->lawyer->name;

            $lawyerCases = CaseModel::where('lawyer_name' ,$lawyer_name)->get();
            return view('consultC', compact('lawyerCases'));
        }
        return view('consultC', compact('lawyers'));
    }

    public function viewa()
    {
        
        $lawyers = Lawyer::all();
        $clientId = Auth::user()->client->id;
        
        

        // Fetch all appointments for this client
        $appointments = Appointment::where('client_id', $clientId)->get();
        

        return view('appointments', compact('lawyers','appointments'));
    }

    


}

