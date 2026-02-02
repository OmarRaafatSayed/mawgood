<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author',
        'status',
        'views',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status' => 'boolean'
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Scope for published posts
    public function scopePublished($query)
    {
        return $query->where('status', 1)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    // Get URL
    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }
}
