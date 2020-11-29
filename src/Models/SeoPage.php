<?php

namespace Tperrelli\SeoStack\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeoPage extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'url', 'allow_index', 'object', 'object_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(SeoPageImage::class);
    }
}