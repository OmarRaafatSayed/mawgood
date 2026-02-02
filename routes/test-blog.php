<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-blog-system', function() {
    try {
        $posts = App\Models\BlogPost::all();
        $routes = collect(Route::getRoutes())->filter(function($route) {
            return str_contains($route->uri(), 'blog');
        })->map(function($route) {
            return [
                'uri' => $route->uri(),
                'name' => $route->getName(),
                'action' => $route->getActionName()
            ];
        })->values();
        
        return response()->json([
            'status' => 'success',
            'posts_count' => $posts->count(),
            'posts' => $posts,
            'routes' => $routes,
            'blog_index_url' => route('blog.index'),
            'views_exist' => [
                'index' => file_exists(resource_path('views/blog/index.blade.php')),
                'show' => file_exists(resource_path('views/blog/show.blade.php'))
            ]
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});
