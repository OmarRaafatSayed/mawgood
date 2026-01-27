<x-shop::layouts>
    <x-slot:title>تقييمات {{ $vendor->store_name }}</x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ route('store.show', $vendor->store_slug) }}" class="text-blue-600 hover:underline">
                ← العودة للمتجر
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-6">تقييمات {{ $vendor->store_name }}</h1>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="text-center">
                <div class="text-5xl font-bold text-yellow-500 mb-2">{{ number_format($averageRating, 1) }}</div>
                <div class="text-gray-600">متوسط التقييم</div>
            </div>
        </div>

        <!-- Add Review Form -->
        @auth('customer')
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-xl font-bold mb-4">أضف تقييمك</h2>
                <form method="POST" action="{{ route('store.reviews.store', $vendor->store_slug) }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">التقييم</label>
                        <select name="rating" class="border rounded px-4 py-2" required>
                            <option value="">اختر التقييم</option>
                            <option value="5">⭐⭐⭐⭐⭐ ممتاز</option>
                            <option value="4">⭐⭐⭐⭐ جيد جداً</option>
                            <option value="3">⭐⭐⭐ جيد</option>
                            <option value="2">⭐⭐ مقبول</option>
                            <option value="1">⭐ ضعيف</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">التعليق</label>
                        <textarea name="comment" rows="3" class="w-full border rounded px-4 py-2" placeholder="اكتب تعليقك هنا..."></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        إضافة التقييم
                    </button>
                </form>
            </div>
        @else
            <div class="bg-gray-100 p-6 rounded-lg mb-8 text-center">
                <p class="text-gray-600">
                    <a href="{{ route('shop.customer.session.create') }}" class="text-blue-600 hover:underline">سجل دخولك</a>
                    لإضافة تقييم
                </p>
            </div>
        @endauth

        <!-- Reviews List -->
        @if($reviews->isEmpty())
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لا توجد تقييمات بعد</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($reviews as $review)
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-bold">{{ $review->first_name }} {{ $review->last_name }}</h3>
                                <div class="text-yellow-500">
                                    @for($i = 1; $i <= 5; $i++)
                                        {{ $i <= $review->rating ? '⭐' : '☆' }}
                                    @endfor
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                        </div>
                        @if($review->comment)
                            <p class="text-gray-700">{{ $review->comment }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
</x-shop::layouts>
