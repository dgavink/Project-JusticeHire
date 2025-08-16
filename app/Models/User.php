<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    protected $primaryKey = 'user_id'; 

    protected $fillable = [
        'username', 
        'password', 
        'user_type', 
    ];
    public $timestamps = false;

    protected $hidden = [
        'password', 
    ];
     // Relationship to the Client model
     public function client()
     {
         return $this->hasOne(Client::class, 'user_id', 'user_id');
     }
 
     // Other relationships (if needed)
     public function lawyer()
     {
         return $this->hasOne(Lawyer::class, 'user_id', 'user_id');
     }
 
     public function police()
     {
         return $this->hasOne(Police::class, 'user_id', 'user_id');
     }
}