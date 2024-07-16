<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpCountry extends Model
{
    use HasFactory;
    protected $table = 'sp_country';
    protected $primaryKey = 'country_id';
    protected $fillable = [
        'country_code',
        'country_name',
        'status',
        'svg',
        'dial_code'
    ];
}
