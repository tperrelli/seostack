<?php

namespace Tperrelli\SeoStack\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeoPageImage extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = [
        'title', 'caption', 'src', 'type', 'seo_page_id'
    ];

    public function seoThing()
    {
        return $this->belongsTo(SeoThing::class);
    }
}