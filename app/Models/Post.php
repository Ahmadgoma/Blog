<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category_id',
    ];

    /**
     * Get the category that owns the post.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
