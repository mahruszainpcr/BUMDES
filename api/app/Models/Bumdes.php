<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bumdes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'bumdes_name',
        'user_id',
        'address',
        'since',
        'vision',
        'mision',
        'number_of_employee',
        'city',
        'province',
        'postal_code'
    ];
}
