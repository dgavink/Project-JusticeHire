<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Auth;
use App\Models\Lawyer;
use App\Models\Client;

class AppointmentController extends Controller
{
    // Function to show the form and pass lawyer data
    public function create()
    {
        // Retrieve all users who are lawyers
        $lawyers = User::where('user_type', 'lawyer')->get();
        return view('appointments.create', compact('lawyers'));

        
    }

    // Function to store the appointment data
    public function store(Request $request)
    {
        $request->validate([
            // 'clientid' => 'required|exists:users,user_id',  // Ensuring the client exists
            'lawyerName' => 'required|string',
            'appointment_date_time' => 'required|date',
        ]);

        $clientid = Auth::user()->client->id;
        // dd($request->lawyerName);
        $lawyer = Lawyer::where('name', $request->lawyerName)->first();
        // Storing the appointment details
        Appointment::create([
            'client_id' => $clientid,
            'lawyer_name' => $lawyer->id,
            'appointment_date_time' => $request->appointment_date_time,
            'status' => 'pending',  // Default status is 'pending'
        ]);

        return redirect()->back()->with('success', 'Appointment scheduled successfully.');
    }

    // Function to display the list of appointments for the lawyer
    public function lawyerAppointments()
    {
        $clients = Client::all();
        // Get logged in lawyer's name
        $lawyerName = auth()->user()->lawyer->id;

        // Fetch all appointments for this lawyer
        $appointments = Appointment::where('lawyer_name', $lawyerName)->get();
        return view('lawyerAppointments', compact('appointments','clients'));
    }

    // Function to update appointment status
    public function updateStatus($id, $status)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $status;
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment status updated.');
    }

    public function destroy($id)
    {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Check if the authenticated client owns the appointment
        if (Auth::user()->client->id !== $appointment->client_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this appointment.');
        }

        // Delete the appointment
        $appointment->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }



}
