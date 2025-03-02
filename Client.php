<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'nic',
        'address',
        'contactNo',
        'email',
        'user_id',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;

    public function appointments()
    {
        return $this->hasMany(App\Models\Appointment::class, 'client_id');
    }
    


}
