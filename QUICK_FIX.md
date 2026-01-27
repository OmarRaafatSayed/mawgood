# 🔧 Quick Fix Script

## Run Migration
```bash
php artisan migrate --path=database/migrations/2026_01_22_000000_add_customer_id_to_vendors_table.php --force
```

## Get Admin Credentials
```bash
php artisan tinker --execute="DB::table('admins')->select('email')->first()"
```

## Reset Admin Password (if needed)
```bash
php artisan tinker --execute="DB::table('admins')->update(['password' => bcrypt('admin123')])"
```

---

## 📍 Access URLs

**Admin Panel:**
```
http://localhost:8000/admin
```

**Customer/Vendor/Company Login:**
```
http://localhost:8000/customer/login
```

**Vendor Dashboard:**
```
http://localhost:8000/vendor/dashboard
```

**Company Dashboard:**
```
http://localhost:8000/company/dashboard
```

**Public Vendor Store:**
```
http://localhost:8000/store/{vendor-slug}
```

---

## 🔑 Default Credentials (Bagisto)

**Admin:**
- Email: `admin@example.com`
- Password: `admin123` (or check database)

**Test Vendor:**
- Register as customer
- Apply as vendor
- Admin approves
- Login and select "vendor" role
