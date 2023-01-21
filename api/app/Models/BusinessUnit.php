<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'bumdes_id',
        'category_bu_id',
        'name',
        'since',
        'number_of_employee',
    ];
}
