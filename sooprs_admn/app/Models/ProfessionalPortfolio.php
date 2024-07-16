<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalPortfolio extends Model
{
    use HasFactory;

    protected $fillable = ['professional_id','professional_slug','title','description','files'];
}
