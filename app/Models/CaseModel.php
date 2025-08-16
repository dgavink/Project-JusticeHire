<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'user_id',
        'lawyer_name',
        'client_name',
        'holder_name',
        'nic',
        'contact',
        'case_category',
        'court_type',
        'venue',
        'case_date_time',
        'file_attachment',
    ];
}
