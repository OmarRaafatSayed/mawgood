# ✅ Unified Auth System (مكتمل)

## 🎯 المبدأ الأساسي

**Account واحد = User واحد**

اللي بيختلف هو:
- Roles
- Profiles  
- Permissions

**مش Guards مختلفة لكل واحد**

---

## 🧍♂️ User Types

| Role | الوصف |
|------|-------|
| customer | تسوق + تقديم على وظائف |
| vendor | بيع منتجات |
| company | عرض وظائف |

**User ممكن يبقى:**
- Customer فقط
- Customer + Vendor
- Customer + Company
- الثلاثة مع بعض

---

## 🔐 Auth Flow

```
Visitor
  ↓
Login / Register
  ↓
Create / Authenticate User
  ↓
Detect Roles
  ↓
/select-role (إذا كان عنده أكتر من role)
  ↓
Redirect Based on Role
```

---

## 🗂️ Database Structure

### Tables Created

**roles**
- id
- name (customer, vendor, company)
- timestamps

**role_user** (pivot)
- user_id → customers.id
- role_id → roles.id

**profiles** (optional)
- id
- user_id → customers.id
- type (vendor/company)
- data (json)
- timestamps

---

## 📁 Files Created

### Models
```
✅ app/Models/Role.php
✅ app/Models/Profile.php
✅ app/Traits/HasRoles.php
```

### Middleware
```
✅ app/Http/Middleware/RoleMiddleware.php
✅ Updated: Mawgood\Vendor\Http\Middleware\EnsureVendorAccess.php
```

### Controllers
```
✅ app/Http/Controllers/RoleSelectionController.php
✅ app/Http/Controllers/JobApplicationController.php
✅ app/Http/Controllers/Company/DashboardController.php
✅ app/Http/Controllers/Company/JobController.php
✅ app/Http/Controllers/Company/ApplicationController.php
```

### Views
```
✅ resources/views/auth/select-role.blade.php
✅ resources/views/company/dashboard/index.blade.php
✅ resources/views/company/jobs/index.blade.php
✅ resources/views/company/jobs/create.blade.php
✅ resources/views/company/applications/index.blade.php
```

---

## 🛣️ Routes

### Auth Routes
```php
GET  /select-role     → RoleSelectionController@index
POST /select-role     → RoleSelectionController@select
```

### Jobs Routes
```php
GET  /jobs            → JobController@index
GET  /jobs/{slug}     → JobController@show
POST /jobs/{id}/apply → JobApplicationController@store (middleware: customer)
```

### Company Routes
```php
GET  /company/dashboard      → Company\DashboardController@index
GET  /company/jobs           → Company\JobController@index
GET  /company/jobs/create    → Company\JobController@create
POST /company/jobs           → Company\JobController@store
GET  /company/applications   → Company\ApplicationController@index
```

**Middleware:** `auth + role:company`

---

## 🔧 Usage Examples

### Check Role
```php
$user = auth()->guard('customer')->user();

if ($user->hasRole('vendor')) {
    // Vendor logic
}

if ($user->hasRole('company')) {
    // Company logic
}
```

### Assign Role
```php
$user->assignRole('vendor');
$user->assignRole('company');
```

### Active Role
```php
// Set active role
$user->setActiveRole('vendor');

// Get active role
$activeRole = $user->getActiveRole(); // Returns 'vendor'
```

### Middleware Usage
```php
// In routes
Route::middleware(['customer', 'role:vendor'])->group(function () {
    // Vendor routes
});

Route::middleware(['customer', 'role:company'])->group(function () {
    // Company routes
});
```

---

## 🧠 Job Seeker Journey

```
Visitor
  ↓
Browse Jobs
  ↓
Click Apply
  ↓
Login / Register (Customer)
  ↓
Submit Application
  ↓
Notify Company
```

**Job Seeker = Customer Role** (مش Account جديد)

---

## 🏢 Company Journey

```
Login
  ↓
Select Role: Company
  ↓
Company Dashboard
  ↓
Post Job
  ↓
Receive Applications
```

---

## ✅ Definition of Done

| المتطلب | الحالة |
|---------|:------:|
| User واحد فقط | ✅ |
| Roles متعددة | ✅ |
| Login مش بيعمل لخبطة | ✅ |
| Job Seeker = Customer | ✅ |
| Company منفصلة عن Vendor | ✅ |
| Redirect واضح | ✅ |
| Role Detection | ✅ |
| Active Role per Session | ✅ |

---

## 🎉 النتيجة

**Auth System موحد 100%**
- ✅ User واحد
- ✅ Multiple Roles
- ✅ Clean Separation
- ✅ No Confusion
- ✅ Scalable

**الآن:**
- Customer يقدر يتسوق
- نفس Customer يقدر يبقى Vendor
- نفس Customer يقدر يبقى Company
- كل واحد له Dashboard خاص
- Session تحدد Active Role
