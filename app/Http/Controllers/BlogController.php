<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // عرض جميع المقالات
    public function index()
    {
        $posts = BlogPost::published()
                        ->orderBy('published_at', 'desc')
                        ->paginate(12);
        
        return view('blog.index', compact('posts'));
    }

    // عرض مقال واحد
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
                       ->published()
                       ->firstOrFail();
        
        // زيادة عدد المشاهدات
        $post->increment('views');
        
        // مقالات مشابهة
        $relatedPosts = BlogPost::published()
                               ->where('id', '!=', $post->id)
                               ->inRandomOrder()
                               ->limit(3)
                               ->get();
        
        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
