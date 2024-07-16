<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SrPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'heading',
        'content',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'banner_image',
        'content_image',
        'thumb_image',
        'service_name',
        'service_id',
        'service_category',
        'status'

    ];
}