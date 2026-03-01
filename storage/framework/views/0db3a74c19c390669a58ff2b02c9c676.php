<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><?php echo $product->id ? 'تعديل المنتج' : 'أضف منتج جديد'; ?></h5>
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
        
        <form method="POST" action="<?php echo e($product->id ? route('vendor.products.update', $product->id) : route('vendor.products.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if($product->id): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            
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
                    <label class="form-label required"><?php echo 'اسم المنتج'; ?></label>
                    <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name', $product->name)); ?>" placeholder="أدخل اسم المنتج" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <!-- SKU -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required"><?php echo 'رمز المنتج (SKU)'; ?></label>
                    <input type="text" name="sku" class="form-control <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('sku', $product->sku ?: 'PROD-'.time())); ?>" placeholder="سيتم توليده تلقائياً" required>
                    <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <!-- Price -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required"><?php echo 'السعر (جنيه مصري)'; ?></label>
                    <input type="number" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('price', $product->price)); ?>" step="0.01" min="0.01" placeholder="0.00" required>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <!-- Quantity -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label required"><?php echo 'الكمية في المخزن'; ?></label>
                    <input type="number" name="inventories[1]" class="form-control <?php $__errorArgs = ['inventories.1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('inventories.1', optional($product->inventories->first())->qty ?? 0)); ?>" min="0" placeholder="0" required>
                    <small class="text-muted">الكمية المتاحة للبيع</small>
                    <?php $__errorArgs = ['inventories.1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                    <label class="form-label"><?php echo 'وصف المنتج'; ?></label>
                    <textarea name="description" class="form-control" rows="4" placeholder="أدخل وصفاً تفصيلياً للمنتج"><?php echo e(old('description', $product->description)); ?></textarea>
                    <small class="text-muted">وصف تفصيلي يساعد العملاء على فهم المنتج</small>
                </div>
                
                <!-- Short Description -->
                <div class="col-12 mb-3">
                    <label class="form-label"><?php echo 'وصف مختصر'; ?></label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="وصف قصير يظهر في قائمة المنتجات"><?php echo e(old('short_description', $product->short_description)); ?></textarea>
                    <small class="text-muted">وصف مختصر يظهر في صفحة البحث والفئات</small>
                </div>
                
                <!-- URL Key -->
                <div class="col-12 mb-3">
                    <label class="form-label"><?php echo 'رابط المنتج (URL)'; ?></label>
                    <input type="text" name="url_key" class="form-control" value="<?php echo e(old('url_key', $product->url_key)); ?>" placeholder="سيتم توليده تلقائياً">
                    <small class="text-muted">سيتم توليده تلقائياً من اسم المنتج إذا تُرك فارغاً</small>
                </div>

                <!-- Product Specifications Section -->
                <div class="col-12 mb-4">
                    <hr class="my-4">
                    <h6 class="mb-3"><?php echo '<i class="fas fa-cog me-2"></i>مواصفات المنتج'; ?></h6>
                </div>

                <!-- Color -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label"><?php echo '<i class="fas fa-palette me-1"></i>اللون'; ?></label>
                    <select name="color[]" class="form-control" multiple size="5">
                        <option value="">-- اختر الألوان المتاحة --</option>
                        <?php
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
                        ?>
                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($color->id); ?>" <?php echo e(in_array($color->id, $selectedColorIds) ? 'selected' : ''); ?>>
                                <?php echo e($color->admin_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small class="text-muted">اضغط Ctrl (أو Cmd) لاختيار عدة ألوان</small>
                </div>

                <!-- Size -->
                <div class="col-12 col-md-6 mb-3">
                    <label class="form-label"><?php echo '<i class="fas fa-ruler me-1"></i>المقاس'; ?></label>
                    <select name="size[]" class="form-control" multiple size="5">
                        <option value="">-- اختر المقاسات المتاحة --</option>
                        <?php
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
                        ?>
                        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($size->id); ?>" <?php echo e(in_array($size->id, $selectedSizeIds) ? 'selected' : ''); ?>>
                                <?php echo e($size->admin_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small class="text-muted">اضغط Ctrl (أو Cmd) لاختيار عدة مقاسات</small>
                </div>
                
                <!-- Images -->
                <div class="col-12 mb-3">
                    <label class="form-label"><?php echo 'صور المنتج'; ?></label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*" id="productImages">
                    <small class="text-muted">يمكنك اختيار عدة صور (يفضل صور عالية الجودة)</small>
                    
                    <?php if($product->id && $product->images->count()): ?>
                        <div class="row mt-3" id="existingImages">
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2 mb-2" data-image-id="<?php echo e($image->id); ?>">
                                    <div class="position-relative">
                                        <img src="<?php echo e(asset('storage/' . $image->path)); ?>" class="img-thumbnail" alt="Product Image" onerror="this.src='<?php echo e(asset('themes/mawgood/assets/images/placeholder.png')); ?>'">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="removeImage(<?php echo e($image->id); ?>)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row mt-3" id="imagePreview"></div>
                </div>
                
                <!-- Video -->
                <div class="col-12 mb-3">
                    <label class="form-label"><?php echo 'فيديو المنتج (اختياري)'; ?></label>
                    <input type="file" name="videos[]" class="form-control" accept="video/*" id="productVideo">
                    <small class="text-muted">يمكنك إضافة فيديو واحد لعرض المنتج</small>
                    
                    <?php if($product->id && $product->videos->count()): ?>
                        <div class="mt-3">
                            <?php $__currentLoopData = $product->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <video width="320" height="240" controls class="img-thumbnail">
                                    <source src="<?php echo e(asset('storage/' . $video->path)); ?>" type="video/mp4">
                                </video>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Buttons -->
                <div class="col-12 mt-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i><?php echo 'حفظ المنتج'; ?>

                        </button>
                        <a href="<?php echo e(route('vendor.products.index')); ?>" class="btn btn-secondary btn-lg">
                            <i class="fas fa-times me-2"></i><?php echo 'إلغاء'; ?>

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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Mawgood\Vendor\src\Providers/../Resources/views/products/form.blade.php ENDPATH**/ ?>