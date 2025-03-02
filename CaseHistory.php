<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'file_attachment',
    ];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'id', 'id');
    }
}
