<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>الأقسام - ماوجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: { "primary": "#FF6B00" }
        }
    }
}
</script>
<style>
body { font-family: 'Tajawal', sans-serif; }
</style>
</head>
<body class="bg-gray-50">
<div class="min-h-screen pb-20 lg:pb-8">

<header class="sticky top-0 z-40 bg-white border-b px-4 lg:px-8 py-4">
<div class="max-w-7xl mx-auto">
<h1 class="text-2xl font-bold text-gray-800">الأقسام</h1>
</div>
</header>

<main class="max-w-7xl mx-auto px-4 lg:px-8 py-6">
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" id="categoriesGrid"></div>
</main>

@include('components.navbar')

</div>

<script>
async function loadCategories() {
    try {
        const response = await fetch('/api/categories/tree');
        const data = await response.json();
        renderCategories(data.data);
    } catch (error) {
        console.error('Error:', error);
    }
}

function renderCategories(categories) {
    const grid = document.getElementById('categoriesGrid');
    
    grid.innerHTML = categories.map(cat => `
        <a href="/categories/${cat.id}/products" class="bg-white rounded-[15px] overflow-hidden shadow-sm border hover:shadow-md transition-shadow p-6 flex flex-col items-center gap-3">
            <div class="size-20 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="material-symbols-outlined text-4xl text-primary">category</span>
            </div>
            <h3 class="text-center font-bold text-gray-800">${cat.name}</h3>
            ${cat.children_count ? `<span class="text-xs text-gray-500">${cat.children_count} قسم فرعي</span>` : ''}
        </a>
    `).join('');
}

loadCategories();
</script>
</body>
</html>
