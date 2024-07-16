<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetVerifiedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'id_number',
        'front_image',
        'back_image'
        
    ];   
}
