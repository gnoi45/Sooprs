<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpSkill extends Model
{
    use HasFactory;

    protected $primaryKey = 'skill_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['skill_slug','skill_name','category_id','status'];
}
