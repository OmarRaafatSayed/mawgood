# إضافة Routes للمقالات

أضف هذا الكود في ملف: `routes/web.php`

```php
use App\Http\Controllers\BlogController;

// Blog Routes
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
```

## الروابط:
- قائمة المقالات: `http://your-site.com/blog`
- مقال واحد: `http://your-site.com/blog/article-slug`
