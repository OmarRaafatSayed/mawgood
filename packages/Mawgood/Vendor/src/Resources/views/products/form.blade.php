<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{!! $product->id ? 'تعديل المنتج' : 'أضف منتج جديد' !!}</h5>
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
            
            <!-- Hidden Fields -->
            <input type="hidden" name="type" value="simple">
            <input type="hidden" name="attribute_family_id" value="1">
            <input type="hidden" name="weight" value="1">
            <input type="hidden" name="meta_title" value="">
            <input type="hidden" name="meta_description" value="">
            <input type="hidden" name="status" value="0">
            
            <div class="row">
                <!-- Name -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required">{!! 'اسم المنتج' !!}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" placeholder="أدخل اسم المنتج" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- SKU -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required">{!! 'رمز المنتج (SKU)' !!}</label>
                    <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $product->sku ?: 'PROD-'.time()) }}" placeholder="سيتم توليده تلقائياً" required>
                    @error('sku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Category -->
                <div class="col-12 mb-3">
                    <label class="form-label required">{!! '<i class="fas fa-folder me-1"></i>الفئة' !!}</label>
                    <select name="categories[]" class="form-control @error('categories') is-invalid @enderror" required>
                        <option value="">-- اختر الفئة --</option>
                        @php
                            $categories = \Webkul\Category\Models\Category::where('status', 1)->orderBy('position')->get();
                            $selectedCategoryIds = $product->id ? $product->categories->pluck('id')->toArray() : [];
                        @endphp
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $selectedCategoryIds)) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">اختر الفئة المناسبة لظهور المنتج في الموقع</small>
                    @error('categories')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Price -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required">{!! 'السعر (جنيه مصري)' !!}</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" step="0.01" min="0.01" placeholder="0.00" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Quantity -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required">{!! 'الكمية في المخزن' !!}</label>
                    <input type="number" name="inventories[1]" class="form-control @error('inventories.1') is-invalid @enderror" value="{{ old('inventories.1', optional($product->inventories->first())->qty ?? 0) }}" min="0" placeholder="0" required>
                    <small class="text-muted">الكمية المتاحة للبيع</small>
                    @error('inventories.1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Status (Read Only) -->
                <div class="col-12 mb-3">
                    <div class="alert alert-warning mb-0" role="alert">
                        <i class="fas fa-clock me-2"></i>
                        <strong>حالة المنتج:</strong> قيد المراجعة - سيتم تفعيل المنتج تلقائياً بعد موافقة الإدارة
                    </div>
                </div>
                
                <!-- Description -->
                <div class="col-12 mb-3">
                    <label class="form-label">{!! 'وصف المنتج' !!}</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="أدخل وصفاً تفصيلياً للمنتج">{{ old('description', $product->description) }}</textarea>
                    <small class="text-muted">وصف تفصيلي يساعد العملاء على فهم المنتج</small>
                </div>
                
                <!-- Short Description -->
                <div class="col-12 mb-3">
                    <label class="form-label">{!! 'وصف مختصر' !!}</label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="وصف قصير يظهر في قائمة المنتجات">{{ old('short_description', $product->short_description) }}</textarea>
                    <small class="text-muted">وصف مختصر يظهر في صفحة البحث والفئات</small>
                </div>
                
                <!-- URL Key -->
                <div class="col-12 mb-3">
                    <label class="form-label">{!! 'رابط المنتج (URL)' !!}</label>
                    <input type="text" name="url_key" class="form-control" value="{{ old('url_key', $product->url_key) }}" placeholder="سيتم توليده تلقائياً">
                    <small class="text-muted">سيتم توليده تلقائياً من اسم المنتج إذا تُرك فارغاً</small>
                </div>

                <!-- Product Specifications Section -->
                <div class="col-12 mb-4">
                    <hr class="my-4">
                    <h6 class="mb-3">{!! '<i class="fas fa-cog me-2"></i>مواصفات المنتج' !!}</h6>
                </div>

                <!-- Color -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label">{!! '<i class="fas fa-palette me-1"></i>اللون' !!}</label>
                    <select name="color[]" class="form-control" multiple size="5">
                        <option value="">-- اختر الألوان المتاحة --</option>
                        @php
                            $colors = \DB::table('attribute_options')->where('attribute_id', 23)->orderBy('sort_order')->get();
                            $selectedColorIds = [];
                            if ($product->id) {
                                $colorText = \DB::table('product_attribute_values')
                                    ->where('product_id', $product->id)
                                    ->where('attribute_id', 23)
                                    ->value('text_value');
                                if ($colorText) {
                                    $selectedColorIds = explode(',', $colorText);
                                }
                            }
                        @endphp
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}" {{ in_array($color->id, $selectedColorIds) ? 'selected' : '' }}>
                                {{ $color->admin_name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">اضغط Ctrl (أو Cmd) لاختيار عدة ألوان</small>
                </div>

                <!-- Size -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label">{!! '<i class="fas fa-ruler me-1"></i>المقاس' !!}</label>
                    <select name="size[]" class="form-control" multiple size="5">
                        <option value="">-- اختر المقاسات المتاحة --</option>
                        @php
                            $sizes = \DB::table('attribute_options')->where('attribute_id', 24)->orderBy('sort_order')->get();
                            $selectedSizeIds = [];
                            if ($product->id) {
                                $sizeText = \DB::table('product_attribute_values')
                                    ->where('product_id', $product->id)
                                    ->where('attribute_id', 24)
                                    ->value('text_value');
                                if ($sizeText) {
                                    $selectedSizeIds = explode(',', $sizeText);
                                }
                            }
                        @endphp
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" {{ in_array($size->id, $selectedSizeIds) ? 'selected' : '' }}>
                                {{ $size->admin_name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">اضغط Ctrl (أو Cmd) لاختيار عدة مقاسات</small>
                </div>
                
                <!-- Images -->
                <div class="col-12 mb-3">
                    <label class="form-label">{!! 'صور المنتج' !!}</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*" id="productImages">
                    <small class="text-muted">يمكنك اختيار عدة صور (يفضل صور عالية الجودة)</small>
                    
                    @if($product->id && $product->images->count())
                        <div class="row mt-3" id="existingImages">
                            @foreach($product->images as $image)
                                <div class="col-md-2 mb-2" data-image-id="{{ $image->id }}">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $image->path) }}" class="img-thumbnail" alt="Product Image" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%27200%27 height=%27200%27%3E%3Crect fill=%27%23ddd%27 width=%27200%27 height=%27200%27/%3E%3Ctext fill=%27%23999%27 x=%2750%25%27 y=%2750%25%27 text-anchor=%27middle%27 dy=%27.3em%27%3ENo Image%3C/text%3E%3C/svg%3E';">
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
                    <label class="form-label">{!! 'فيديو المنتج (اختياري)' !!}</label>
                    <input type="file" name="videos[]" class="form-control" accept="video/*" id="productVideo">
                    <small class="text-muted">يمكنك إضافة فيديو واحد لعرض المنتج</small>
                    
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
                <div class="col-12 mt-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>{!! 'حفظ المنتج' !!}
                        </button>
                        <a href="{{ route('vendor.products.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-times me-2"></i>{!! 'إلغاء' !!}
                        </a>
                    </div>
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

<style>
/* Mobile-First Responsive Styles */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem;
    }
    
    .form-label {
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .form-control {
        font-size: 1rem;
        padding: 0.75rem;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
    
    .alert {
        font-size: 0.85rem;
        padding: 0.75rem;
    }
    
    .alert-heading {
        font-size: 1rem;
    }
    
    /* Single column layout for mobile */
    .row > [class*='col-md-'] {
        margin-bottom: 1rem;
    }
    
    /* Image preview optimization */
    #imagePreview .col-md-2,
    #existingImages .col-md-2 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

/* Tablet adjustments */
@media (min-width: 769px) and (max-width: 1024px) {
    .card-body {
        padding: 1.5rem;
    }
}

/* Form field improvements */
.form-label.required::after {
    content: ' *';
    color: #dc3545;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Button improvements */
.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

/* Image preview styling */
#imagePreview img,
#existingImages img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 0.375rem;
}

.position-relative .btn-danger {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.position-relative:hover .btn-danger {
    opacity: 1;
}

/* Product Specifications Section */
.col-12 h6 {
    color: #2c3e50;
    font-weight: 600;
}

/* Multi-select styling */
select[multiple] {
    padding: 0.5rem;
}

select[multiple] option {
    padding: 0.5rem;
    border-radius: 0.25rem;
    margin-bottom: 0.25rem;
}

select[multiple] option:hover {
    background-color: #0d6efd;
    color: white;
}

select[multiple] option:checked {
    background-color: #0d6efd;
    color: white;
}

/* Mobile optimization for multi-select */
@media (max-width: 768px) {
    select[multiple] {
        font-size: 0.9rem;
    }
    
    select[multiple] option {
        padding: 0.75rem;
    }
}
</style>
