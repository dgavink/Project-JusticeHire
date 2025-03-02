<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    use HasFactory;

    protected $table = 'police';

    protected $fillable = [
        'user_id',
        'division_id',
        'division_name',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
}
