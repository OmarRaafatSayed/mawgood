# 🏗️ المخطط المعماري لنظام الموافقة التلقائية

## 📐 البنية الكاملة (Full Architecture)

```
┌─────────────────────────────────────────────────────────────────────────┐
│                          LARAVEL MARKETPLACE                             │
│                     Multi-Vendor E-commerce System                       │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│                           PRESENTATION LAYER                             │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌──────────────────────┐              ┌──────────────────────┐        │
│  │   Vendor Dashboard   │              │    Admin Panel       │        │
│  │                      │              │                      │        │
│  │  - Add Product       │              │  - View Products     │        │
│  │  - Edit Product      │              │  - Approve/Reject    │        │
│  │  - View Status       │              │  - Manage Vendors    │        │
│  └──────────────────────┘              └──────────────────────┘        │
│           │                                       │                     │
└───────────┼───────────────────────────────────────┼─────────────────────┘
            │                                       │
            ▼                                       ▼
┌─────────────────────────────────────────────────────────────────────────┐
│                          CONTROLLER LAYER                                │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌──────────────────────┐              ┌──────────────────────┐        │
│  │ VendorController     │              │ AdminController      │        │
│  │                      │              │                      │        │
│  │  + store()           │              │  + approve($id) ◄────┼────┐   │
│  │  + update()          │              │  + reject($id)       │    │   │
│  │  + index()           │              │  + index()           │    │   │
│  └──────────────────────┘              └──────────────────────┘    │   │
│                                                  │                  │   │
└──────────────────────────────────────────────────┼──────────────────┼───┘
                                                   │                  │
                                                   ▼                  │
┌─────────────────────────────────────────────────────────────────────┼───┐
│                          SERVICE LAYER                              │   │
├─────────────────────────────────────────────────────────────────────┼───┤
│                                                                      │   │
│  ┌────────────────────────────────────────────────────────────────┐ │   │
│  │           ProductApprovalService                               │ │   │
│  │                                                                 │ │   │
│  │  + approveProduct($id): bool                                   │◄┘   │
│  │  + rejectProduct($id, $reason): bool                           │     │
│  │  # autoFillRequiredAttributes($product): void                  │     │
│  │  # setAttributeValue($product, $code, $config): void           │     │
│  │  # ensureDescriptionExists($product): void                     │     │
│  │  # setProductVisibility($id, $visible): void                   │     │
│  │                                                                 │     │
│  │  Business Logic:                                               │     │
│  │  ┌──────────────────────────────────────────────────────────┐ │     │
│  │  │ 1. Begin Transaction                                     │ │     │
│  │  │ 2. Update product status                                 │ │     │
│  │  │ 3. Auto-fill required attributes:                        │ │     │
│  │  │    - status = true                                       │ │     │
│  │  │    - visible_individually = true                         │ │     │
│  │  │    - guest_checkout = true                               │ │     │
│  │  │    - weight = "1"                                        │ │     │
│  │  │    - description = default                               │ │     │
│  │  │ 4. Save for all channels & locales                       │ │     │
│  │  │ 5. Commit Transaction                                    │ │     │
│  │  │ 6. Log success                                           │ │     │
│  │  └──────────────────────────────────────────────────────────┘ │     │
│  └────────────────────────────────────────────────────────────────┘     │
│                                   │                                      │
└───────────────────────────────────┼──────────────────────────────────────┘
                                    │
                                    ▼
┌─────────────────────────────────────────────────────────────────────────┐
│                        REPOSITORY LAYER                                  │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌──────────────────────┐  ┌──────────────────────┐  ┌───────────────┐ │
│  │ ProductRepository    │  │ AttributeRepository  │  │ Other Repos   │ │
│  │                      │  │                      │  │               │ │
│  │  + find()            │  │  + findByCode()      │  │  ...          │ │
│  │  + update()          │  │  + getAll()          │  │               │ │
│  │  + create()          │  │                      │  │               │ │
│  └──────────────────────┘  └──────────────────────┘  └───────────────┘ │
│           │                          │                                  │
└───────────┼──────────────────────────┼──────────────────────────────────┘
            │                          │
            ▼                          ▼
┌─────────────────────────────────────────────────────────────────────────┐
│                          MODEL LAYER                                     │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌──────────────────────┐  ┌──────────────────────┐  ┌───────────────┐ │
│  │   Product Model      │  │  Attribute Model     │  │  Other Models │ │
│  │                      │  │                      │  │               │ │
│  │  - id                │  │  - id                │  │  ...          │ │
│  │  - sku               │  │  - code              │  │               │ │
│  │  - type              │  │  - type              │  │               │ │
│  │  - vendor_id         │  │  - is_required       │  │               │ │
│  │  - approved_by_admin │  │                      │  │               │ │
│  │  - status            │  │                      │  │               │ │
│  └──────────────────────┘  └──────────────────────┘  └───────────────┘ │
│           │                                                              │
└───────────┼──────────────────────────────────────────────────────────────┘
            │
            ▼
┌─────────────────────────────────────────────────────────────────────────┐
│                        OBSERVER LAYER                                    │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌────────────────────────────────────────────────────────────────────┐ │
│  │           ProductApprovalObserver                                  │ │
│  │                                                                     │ │
│  │  + updated(Product $product): void                                 │ │
│  │  + creating(Product $product): void                                │ │
│  │                                                                     │ │
│  │  Responsibilities:                                                 │ │
│  │  - Log approval events                                             │ │
│  │  - Set default values on creation                                  │ │
│  │  - Trigger notifications (future)                                  │ │
│  │  - Audit logging (future)                                          │ │
│  └────────────────────────────────────────────────────────────────────┘ │
│                                                                          │
└─────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────┐
│                        DATABASE LAYER                                    │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                          │
│  ┌──────────────────────┐  ┌──────────────────────┐  ┌───────────────┐ │
│  │   products           │  │  attributes          │  │  vendors      │ │
│  │                      │  │                      │  │               │ │
│  │  - id (PK)           │  │  - id (PK)           │  │  - id (PK)    │ │
│  │  - sku               │  │  - code              │  │  - store_name │ │
│  │  - type              │  │  - type              │  │  - status     │ │
│  │  - vendor_id (FK)    │  │  - is_required       │  │               │ │
│  │  - approved_by_admin │  │  - value_per_channel │  │               │ │
│  │  - status            │  │  - value_per_locale  │  │               │ │
│  └──────────────────────┘  └──────────────────────┘  └───────────────┘ │
│                                                                          │
│  ┌────────────────────────────────────────────────────────────────────┐ │
│  │   product_attribute_values                                         │ │
│  │                                                                     │ │
│  │  - id (PK)                                                          │ │
│  │  - product_id (FK) ──────────┐                                     │ │
│  │  - attribute_id (FK) ────────┼──────┐                              │ │
│  │  - channel                    │      │                              │ │
│  │  - locale                     │      │                              │ │
│  │  - text_value                 │      │                              │ │
│  │  - boolean_value              │      │                              │ │
│  │  - integer_value              │      │                              │ │
│  │  - float_value                │      │                              │ │
│  │  - datetime_value             │      │                              │ │
│  │  - date_value                 │      │                              │ │
│  │  - json_value                 │      │                              │ │
│  └────────────────────────────────────────────────────────────────────┘ │
│                                                                          │
└─────────────────────────────────────────────────────────────────────────┘
```

---

## 🔄 تدفق الموافقة (Approval Flow)

```
START
  │
  ├─► [1] Vendor creates product
  │        │
  │        ├─► Product saved with:
  │        │    - approved_by_admin = false
  │        │    - status = 0
  │        │
  │        └─► ProductApprovalObserver::creating()
  │             └─► Sets default values
  │
  ├─► [2] Admin views pending products
  │        │
  │        └─► Filters: approved_by_admin = false
  │
  ├─► [3] Admin clicks "Approve" button
  │        │
  │        └─► POST /admin/catalog/products/{id}/approve
  │
  ├─► [4] ProductController::approve($id)
  │        │
  │        ├─► Dispatch: catalog.product.update.before
  │        │
  │        ├─► Call: ProductApprovalService::approveProduct($id)
  │        │    │
  │        │    ├─► [5] BEGIN TRANSACTION
  │        │    │
  │        │    ├─► [6] Update Product:
  │        │    │    - approved_by_admin = true
  │        │    │    - status = 1
  │        │    │
  │        │    ├─► [7] Auto-fill Attributes:
  │        │    │    │
  │        │    │    ├─► For each channel & locale:
  │        │    │    │    │
  │        │    │    │    ├─► status = true
  │        │    │    │    ├─► visible_individually = true
  │        │    │    │    ├─► guest_checkout = true
  │        │    │    │    ├─► weight = "1"
  │        │    │    │    └─► description = default
  │        │    │    │
  │        │    │    └─► Save to product_attribute_values
  │        │    │
  │        │    ├─► [8] COMMIT TRANSACTION
  │        │    │
  │        │    └─► [9] Log::info("Product approved")
  │        │
  │        ├─► Dispatch: catalog.product.update.after
  │        │
  │        └─► Return JSON response
  │
  ├─► [10] ProductApprovalObserver::updated()
  │         │
  │         └─► Log approval event
  │
  ├─► [11] Product now visible in:
  │         │
  │         ├─► Shop frontend
  │         ├─► Search results
  │         ├─► Category pages
  │         └─► Vendor store
  │
END (Success)


ERROR HANDLING:
  │
  ├─► Exception thrown?
  │    │
  │    ├─► ROLLBACK TRANSACTION
  │    ├─► Log::error()
  │    └─► Return error response
  │
END (Failure)
```

---

## 🎯 Data Flow Diagram

```
┌─────────────┐
│   Vendor    │
│  Dashboard  │
└──────┬──────┘
       │ Creates Product
       ▼
┌─────────────────────────────────────┐
│         products table              │
│  ┌───────────────────────────────┐  │
│  │ id: 123                       │  │
│  │ sku: "PROD-001"               │  │
│  │ vendor_id: 5                  │  │
│  │ approved_by_admin: false ◄────┼──┼─── Initial State
│  │ status: 0                     │  │
│  └───────────────────────────────┘  │
└─────────────────────────────────────┘
       │
       │ Admin Approves
       ▼
┌─────────────────────────────────────┐
│  ProductApprovalService             │
│  ┌───────────────────────────────┐  │
│  │ BEGIN TRANSACTION             │  │
│  │                               │  │
│  │ 1. Update products:           │  │
│  │    approved_by_admin = true   │  │
│  │    status = 1                 │  │
│  │                               │  │
│  │ 2. Insert/Update attributes:  │  │
│  │    ┌─────────────────────────┐│  │
│  │    │ status = true           ││  │
│  │    │ visible_individually    ││  │
│  │    │ guest_checkout          ││  │
│  │    │ weight                  ││  │
│  │    │ description             ││  │
│  │    └─────────────────────────┘│  │
│  │                               │  │
│  │ COMMIT TRANSACTION            │  │
│  └───────────────────────────────┘  │
└─────────────────────────────────────┘
       │
       ▼
┌─────────────────────────────────────┐
│  product_attribute_values table     │
│  ┌───────────────────────────────┐  │
│  │ product_id: 123               │  │
│  │ attribute_id: 1 (status)      │  │
│  │ boolean_value: true           │  │
│  │ channel: default              │  │
│  │ locale: en                    │  │
│  ├───────────────────────────────┤  │
│  │ product_id: 123               │  │
│  │ attribute_id: 2 (visible)     │  │
│  │ boolean_value: true           │  │
│  │ ...                           │  │
│  └───────────────────────────────┘  │
└─────────────────────────────────────┘
       │
       ▼
┌─────────────────────────────────────┐
│      Frontend (Shop)                │
│  ┌───────────────────────────────┐  │
│  │ Product is now:               │  │
│  │ ✅ Visible                    │  │
│  │ ✅ Searchable                 │  │
│  │ ✅ Can be added to cart       │  │
│  │ ✅ Appears in categories      │  │
│  └───────────────────────────────┘  │
└─────────────────────────────────────┘
```

---

## 🔐 Security & Transaction Flow

```
┌────────────────────────────────────────────────────────────┐
│                    TRANSACTION FLOW                         │
└────────────────────────────────────────────────────────────┘

START Transaction
  │
  ├─► [Step 1] Lock product record
  │    └─► SELECT * FROM products WHERE id = ? FOR UPDATE
  │
  ├─► [Step 2] Update product
  │    └─► UPDATE products SET approved_by_admin = 1, status = 1
  │
  ├─► [Step 3] Insert/Update attributes (Loop)
  │    │
  │    ├─► For each channel:
  │    │    └─► For each locale:
  │    │         │
  │    │         ├─► Check if exists
  │    │         │    └─► SELECT * FROM product_attribute_values
  │    │         │         WHERE product_id = ? AND attribute_id = ?
  │    │         │
  │    │         └─► Insert or Update
  │    │              └─► INSERT INTO product_attribute_values ...
  │    │                   ON DUPLICATE KEY UPDATE ...
  │    │
  │    └─► All attributes saved
  │
  ├─► [Step 4] Validation
  │    │
  │    ├─► All operations successful?
  │    │    │
  │    │    ├─► YES ──► COMMIT
  │    │    │            └─► Changes permanent
  │    │    │
  │    │    └─► NO ───► ROLLBACK
  │    │                 └─► All changes reverted
  │    │
  │    └─► Log result
  │
END Transaction

┌────────────────────────────────────────────────────────────┐
│                    ERROR HANDLING                           │
└────────────────────────────────────────────────────────────┘

try {
    DB::beginTransaction();
    
    // Operations...
    
    DB::commit();
    return success;
    
} catch (Exception $e) {
    DB::rollBack();
    Log::error($e);
    throw $e;
}
```

---

## 📊 Class Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                  ProductController                           │
├─────────────────────────────────────────────────────────────┤
│ - productApprovalService: ProductApprovalService            │
│ - productRepository: ProductRepository                      │
├─────────────────────────────────────────────────────────────┤
│ + approve(int $id): JsonResponse                            │
│ + reject(int $id): JsonResponse                             │
└────────────────────┬────────────────────────────────────────┘
                     │ uses
                     ▼
┌─────────────────────────────────────────────────────────────┐
│              ProductApprovalService                          │
├─────────────────────────────────────────────────────────────┤
│ - productRepository: ProductRepository                      │
│ - productAttributeValueRepository: Repository               │
│ - attributeRepository: AttributeRepository                  │
├─────────────────────────────────────────────────────────────┤
│ + approveProduct(int $id): bool                             │
│ + rejectProduct(int $id, ?string $reason): bool             │
│ # autoFillRequiredAttributes(Product $product): void        │
│ # setAttributeValue(Product, string, array): void           │
│ # ensureDescriptionExists(Product $product): void           │
│ # setProductVisibility(int $id, bool $visible): void        │
└────────────────────┬────────────────────────────────────────┘
                     │ uses
                     ▼
┌─────────────────────────────────────────────────────────────┐
│                ProductRepository                             │
├─────────────────────────────────────────────────────────────┤
│ + find(int $id): ?Product                                   │
│ + findOrFail(int $id): Product                              │
│ + update(array $data, int $id): Product                     │
│ + create(array $data): Product                              │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│              ProductApprovalObserver                         │
├─────────────────────────────────────────────────────────────┤
│ + updated(Product $product): void                           │
│ + creating(Product $product): void                          │
└────────────────────┬────────────────────────────────────────┘
                     │ observes
                     ▼
┌─────────────────────────────────────────────────────────────┐
│                    Product Model                             │
├─────────────────────────────────────────────────────────────┤
│ - id: int                                                    │
│ - sku: string                                                │
│ - type: string                                               │
│ - vendor_id: ?int                                            │
│ - approved_by_admin: bool                                    │
│ - status: int                                                │
├─────────────────────────────────────────────────────────────┤
│ + vendor(): BelongsTo                                        │
│ + attribute_values(): HasMany                                │
│ + images(): HasMany                                          │
└─────────────────────────────────────────────────────────────┘
```

---

## 🎨 Component Interaction

```
┌──────────────┐
│    Admin     │
│   Browser    │
└──────┬───────┘
       │ HTTP Request
       │ POST /admin/catalog/products/123/approve
       ▼
┌──────────────────────────────────────────┐
│         Laravel Router                    │
│  Route::post('products/{id}/approve')    │
└──────┬───────────────────────────────────┘
       │
       ▼
┌──────────────────────────────────────────┐
│      ProductController                    │
│  approve($id)                            │
└──────┬───────────────────────────────────┘
       │
       ├─► Event::dispatch('before')
       │
       ├─► ProductApprovalService
       │    │
       │    ├─► ProductRepository
       │    │    └─► Product Model
       │    │         └─► Database
       │    │
       │    ├─► AttributeRepository
       │    │    └─► Attribute Model
       │    │         └─► Database
       │    │
       │    └─► ProductAttributeValueRepository
       │         └─► ProductAttributeValue Model
       │              └─► Database
       │
       ├─► Event::dispatch('after')
       │    │
       │    └─► ProductApprovalObserver
       │         └─► Log::info()
       │
       └─► Return JsonResponse
            │
            ▼
       ┌──────────────┐
       │    Admin     │
       │   Browser    │
       │  (Success!)  │
       └──────────────┘
```

---

**هذا المخطط يوضح البنية الكاملة للنظام بشكل بصري! 🎨**
