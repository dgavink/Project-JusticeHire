<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerSpec extends Model
{
    use HasFactory;

    protected $table = 'lawyerspec';

    protected $fillable = [
        'lawyerCategory',
        'courtCategory',
        'yearsOfExperience',
    ];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
    public $timestamps = false;
}

