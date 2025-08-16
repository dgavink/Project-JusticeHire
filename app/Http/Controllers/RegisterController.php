<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\Police;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Client Registration
    public function registerClient(Request $request)
    {
        // Validate the request data


        // Create a new User
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

        // Create a new Client
        Client::create([
            'clientName' => $request->clientName,
            'clientNIC' => $request->clientNIC,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
            'user_id' => $user->id, // Link to the User
        ]);

        return redirect()->route('login')->with('success', 'Client registered successfully.');
    }

    // Lawyer Registration
    public function registerLawyer(Request $request)
    {
        // Validate the request data


        // Create a new User
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'lawyer',
        ]);

        // Create a new Lawyer
        Lawyer::create([
            'govRegNumber' => $request->govRegNumber,
            'lawyerName' => $request->lawyerName,
            'contactNo' => $request->contactNo,
            'address' => $request->address,
            'user_id' => $user->id, // Link to the User
        ]);

        return redirect()->route('login')->with('success', 'Lawyer registered successfully.');
    }

    // Police Registration
    public function registerPolice(Request $request)
    {
        // Validate the request data
 

        // Create a new User
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'police',
        ]);

        // Create a new Police entry
        Police::create([
            'division_name' => $request->division_name,
            'division_id' => $request->division_id,
            'user_id' => $user->id, // Link to the User
        ]);

        return redirect()->route('login')->with('success', 'Police registered successfully.');
    }
}
