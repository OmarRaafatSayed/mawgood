<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ $product->id ? 'تعديل المنتج' : 'أضف منتج جديد' }}</h5>
    </div>
    <div class="card-body">
        <!-- Alert -->
        <div class="alert alert-info mb-4" role="alert">
            <h6 class="alert-heading">⚠️ ملحوظة مهمة:</h6>
            <p class="mb-2">لظهور المنتج في الموقع، يجب ملء جميع الحقول التالية:</p>
            <ul class="mb-2">
                <li>✅ <strong>اسم المنتج</strong> (مطلوب)</li>
                <li>✅ <strong>السعر</strong> (مطلوب - يجب أن يكون أكبر من 0)</li>
                <li>✅ <strong>الكمية في المخزن</strong> (مطلوب - يجب أن تكون أكبر من 0)</li>
                <li>✅ <strong>صورة واحدة على الأقل</strong> (مفضل)</li>
            </ul>
            <div class="alert alert-warning mb-0" role="alert">
                <strong>⚠️ ملاحظة هامة:</strong> المنتج سيكون <strong>"قيد المراجعة"</strong> ولن يظهر في الموقع حتى تتم موافقة الإدارة عليه.
            </div>
        </div>
        
        <form method="POST" action="{{ $product->id ? route('vendor.products.update', $product->id) : route('vendor.products.store') }}" enctype="multipart/form-data">
            @csrf
            @if($product->id)
                @method('PUT')
            @endif
            
            <input type="hidden" name="type" value="simple">
            <input type="hidden" name="attribute_family_id" value="1">
            
            <div class="row">
                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label required">اسم المنتج</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- SKU -->
                <div class="col-md-6 mb-3">
                    <label class="form-label required">SKU</label>
                    <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $product->sku ?: 'PROD-'.time()) }}" required>
                    @error('sku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Price -->
                <div class="col-md-4 mb-3">
                    <label class="form-label required">السعر</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" step="0.01" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Quantity -->
                <div class="col-md-4 mb-3">
                    <label class="form-label required">الكمية في المخزن</label>
                    <input type="number" name="inventories[1]" class="form-control @error('inventories.1') is-invalid @enderror" value="{{ old('inventories.1', optional($product->inventories->first())->qty ?? 0) }}" min="0" required>
                    <small class="text-muted">الكمية المتاحة للبيع</small>
                    @error('inventories.1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Status (Read Only) -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">الحالة</label>
                    <input type="text" class="form-control" value="قيد المراجعة" readonly>
                    <input type="hidden" name="status" value="0">
                    <small class="text-muted">⚠️ سيتم تفعيل المنتج بعد موافقة الإدارة</small>
                </div>
                
                <!-- Weight -->
                <div class="col-md-4 mb-3">
                    <label class="form-label required">الوزن (كجم)</label>
                    <input type="number" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $product->weight ?? 1) }}" step="0.01" min="0.01" required>
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Visible Individually -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">ظهور المنتج</label>
                    <select name="visible_individually" class="form-control">
                        <option value="1" selected>نعم - يظهر في الموقع</option>
                        <option value="0">لا - مخفي</option>
                    </select>
                    <input type="hidden" name="visible_individually" value="0">
                    <small class="text-muted">⚠️ سيتم تفعيله بعد الموافقة</small>
                </div>
                
                <!-- Guest Checkout -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">الشراء بدون تسجيل</label>
                    <select name="guest_checkout" class="form-control">
                        <option value="1" selected>نعم - مسموح</option>
                        <option value="0">لا - يتطلب تسجيل</option>
                    </select>
                </div>
                
                <!-- Description -->
                <div class="col-12 mb-3">
                    <label class="form-label">الوصف</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                </div>
                
                <!-- Short Description -->
                <div class="col-12 mb-3">
                    <label class="form-label">وصف مختصر</label>
                    <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                </div>
                
                <!-- URL Key -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">URL Key</label>
                    <input type="text" name="url_key" class="form-control" value="{{ old('url_key', $product->url_key) }}">
                    <small class="text-muted">سيتم توليده تلقائياً من الاسم إذا تُرك فارغاً</small>
                </div>
                
                <!-- Meta Title -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $product->meta_title) }}">
                </div>
                
                <!-- Meta Description -->
                <div class="col-12 mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                </div>
                
                <!-- Images -->
                <div class="col-12 mb-3">
                    <label class="form-label">صور المنتج</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*" id="productImages">
                    <small class="text-muted">يمكنك اختيار عدة صور</small>
                    
                    @if($product->id && $product->images->count())
                        <div class="row mt-3" id="existingImages">
                            @foreach($product->images as $image)
                                <div class="col-md-2 mb-2" data-image-id="{{ $image->id }}">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $image->path) }}" class="img-thumbnail" alt="Product Image" onerror="this.src='{{ asset('themes/mawgood/assets/images/placeholder.png') }}'">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="removeImage({{ $image->id }})">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                    <div class="row mt-3" id="imagePreview"></div>
                </div>
                
                <!-- Video -->
                <div class="col-12 mb-3">
                    <label class="form-label">فيديو المنتج</label>
                    <input type="file" name="videos[]" class="form-control" accept="video/*" id="productVideo">
                    <small class="text-muted">فيديو واحد فقط</small>
                    
                    @if($product->id && $product->videos->count())
                        <div class="mt-3">
                            @foreach($product->videos as $video)
                                <video width="320" height="240" controls class="img-thumbnail">
                                    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                </video>
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <!-- Buttons -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>حفظ المنتج
                    </button>
                    <a href="{{ route('vendor.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>إلغاء
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Image preview
document.getElementById('productImages')?.addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    Array.from(e.target.files).forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-2 mb-2';
                col.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" alt="Preview">`;
                preview.appendChild(col);
            };
            reader.readAsDataURL(file);
        }
    });
});

function removeImage(imageId) {
    if (confirm('هل أنت متأكد من حذف هذه الصورة؟')) {
        // Add hidden input to mark for deletion
        const form = document.querySelector('form');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'remove_images[]';
        input.value = imageId;
        form.appendChild(input);
        
        // Hide the image
        event.target.closest('.col-md-2').style.display = 'none';
    }
}
</script>
