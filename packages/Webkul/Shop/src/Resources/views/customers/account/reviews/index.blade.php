<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>تقييماتي - موجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>tailwind.config = {theme: {extend: {colors: {"primary": "#FF6B00"}}}}</script>
<style>body { font-family: 'Tajawal', sans-serif; }</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<main class="max-w-7xl mx-auto px-4 py-8 pb-24">
<h1 class="text-3xl font-bold text-gray-800 mb-6">تقييماتي</h1>

@if($reviews->count())
<div class="space-y-4">
@foreach($reviews as $review)
<div class="bg-white rounded-2xl shadow-sm p-6">
<div class="flex gap-4">
<img src="{{ $review->product->base_image_url }}" class="size-20 rounded-xl object-cover" alt="{{ $review->product->name }}"/>
<div class="flex-1">
<h3 class="font-bold text-gray-800 mb-2">{{ $review->product->name }}</h3>
<div class="flex items-center gap-1 mb-2">
@for($i = 1; $i <= 5; $i++)
<span class="material-symbols-outlined text-sm {{ $i <= $review->rating ? 'text-yellow-500 fill-1' : 'text-gray-300' }}">star</span>
@endfor
<span class="text-sm text-gray-600 mr-2">{{ $review->created_at->format('Y-m-d') }}</span>
</div>
<p class="text-gray-700">{{ $review->comment }}</p>
</div>
</div>
</div>
@endforeach
</div>
@else
<div class="bg-white rounded-2xl shadow-sm p-12 text-center">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">rate_review</span>
<p class="text-gray-600">لم تقم بأي تقييمات بعد</p>
</div>
@endif
</main>

@include('components.footer')
@include('components.navbar')
</body>
</html>
