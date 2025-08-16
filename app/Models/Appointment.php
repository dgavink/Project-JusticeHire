<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Specify the table name (optional if it follows Laravel's conventions)
    protected $table = 'appointments';

    // Define the fillable attributes
    protected $fillable = [
        'client_id',
        'lawyer_name',
        'appointment_date_time',
        'status',
    ];

    // Define relationships if necessary
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id'); // Assuming you have a Client model
    }

    // Add other relationships or methods as needed
}
