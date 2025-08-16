<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource_type',
        'file_path',
    ];
}
