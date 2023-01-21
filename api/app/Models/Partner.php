<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'bumdes_id',
        'company_id',
        'form_of_cooperation',
        'year_of_cooperation'
    ];
}
