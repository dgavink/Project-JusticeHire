<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;
    protected $table = 'lawyers';

    protected $fillable = [
        'user_id',
        'email',
        'contactNo',
        'address',
        'govRegistrationNumber',
        'name',
        'lawyerCategory',
        'courtCategory',
        'yearsOfExperience',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;



}
