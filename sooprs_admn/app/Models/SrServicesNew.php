<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SrServicesNew extends Model
{
    use HasFactory;
    protected $table = 'sr_services_new';
    protected $fillable = [
        'service_name',
        'service_slug',
        'service_imgs',
        'service_bg_img',
        'banner_strip',

        'service_desc',
        'meta_title',
        'cat_id',
        'meta_keywords',
        'meta_description',
        'status',
        'created_by',
        'sr_home'
    ];
}
