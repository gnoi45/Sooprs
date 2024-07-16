<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinProfessional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'mobile',
        'listing_about',
        'organisation',
        'resume',
        'image',
        'service',
        'services',
        'is_verified',
        'is_kyc_verified',

        'status',
        'wallet',
        'bio'
    ];   
}
