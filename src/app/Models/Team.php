<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'conference',
        'division',
        'city',
        'name',
        'full_name',
        'abbreviation'
    ];
    
}
