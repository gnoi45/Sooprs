<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalGig extends Model
{
    use HasFactory;
    protected $primaryKey = 'gig_id';
    protected $fillable = ['gig_unique_id','professional_id','gig_title','gig_slug',
    'gig_img','gig_price','gig_desc','gig_declaration',
    'gig_status','gig_file','gig_rating','gig_main_category',
    'gig_sub_category','gig_service_type','gig_technologies','gig_tags'
];

}
