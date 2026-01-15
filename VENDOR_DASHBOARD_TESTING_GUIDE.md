# Vendor Dashboard Testing Checklist

## Quick Start Test

### Step 1: Verify Server is Running
```bash
http://127.0.0.1:8000
```
✅ Should display the home page

### Step 2: Access Vendor Dashboard
```bash
http://127.0.0.1:8000/vendor/admin
```

#### Expected Behavior:
- **Without Vendor Account:** Redirects to customer profile with error message
- **With Approved Vendor:** Shows professional dashboard with:
  - Header with "Vendor Dashboard"
  - 4 Stats Cards (Products, Orders, Revenue, Pending)
  - Quick Action Buttons
  - Recent Orders Table
  - Recent Products Grid

---

## Complete Testing Workflow

### 1. **Create Customer Account**
```
URL: http://127.0.0.1:8000/customer/register
Email: testvendor@example.com
Password: Test@1234
```

### 2. **Apply for Vendor**
```
URL: http://127.0.0.1:8000/vendor/apply
Fill Form:
- Store Name: "Test Shop"
- Store Description: "My test shop"
- Category: Select any
- Contact Info: Fill all required fields
Submit Application
```

### 3. **Admin Approval** (Via Admin Panel)
```
URL: http://127.0.0.1:8000/admin
Navigate: Vendors → Review Applications
Approve: Click "Approve" for Test Shop
Vendor Status: Should change to "approved"
```

### 4. **Access Vendor Dashboard**
```
URL: http://127.0.0.1:8000/vendor/admin
Expected: Professional dashboard loads without errors
```

### 5. **Add Test Product**
```
Dashboard → Click "Add New Product"
Fill Form:
- Product Name: "Test Product"
- Category: Select any
- Price: 99.99
- Quantity: 10
- Description: "This is a test product"
Save Product
```

### 6. **Verify Product Appears**
```
Dashboard → Recent Products Grid
Should Show: Test product with image placeholder and price
```

### 7. **Check Public Search**
```
URL: http://127.0.0.1:8000/search
Search: Your product name
Expected: Product appears in results
```

---

## Visual Checklist

### Dashboard Elements Verification

- [ ] **Header Section**
  - [ ] Title: "Dashboard"
  - [ ] Subtitle: "Welcome to your vendor dashboard, {store_name}"
  - [ ] Visible on desktop and mobile

- [ ] **Stats Cards**
  - [ ] Total Products - Shows count with icon
  - [ ] Total Orders - Shows count with icon
  - [ ] Total Revenue - Shows currency formatted amount
  - [ ] Pending Orders - Shows count with icon
  - [ ] Cards have dark mode support
  - [ ] Cards are responsive (1 col mobile, 4 col desktop)

- [ ] **Quick Action Buttons**
  - [ ] "Add New Product" button works
  - [ ] "Manage Orders" button works
  - [ ] "View All Products" button works
  - [ ] Buttons are properly styled
  - [ ] Buttons have icons

- [ ] **Recent Orders Section**
  - [ ] Section title visible
  - [ ] "View All" link visible
  - [ ] Table headers: Order ID, Customer, Amount, Status
  - [ ] Shows up to 5 recent orders
  - [ ] Status displayed as badge
  - [ ] Responsive table design

- [ ] **Recent Products Section**
  - [ ] Section title visible
  - [ ] "View All" link visible
  - [ ] Products displayed in grid (1 col mobile, 4 col desktop)
  - [ ] Product image or fallback icon shown
  - [ ] Product name displayed
  - [ ] Product price displayed
  - [ ] Edit link available

- [ ] **Navigation**
  - [ ] Sidebar visible (desktop)
  - [ ] Hamburger menu visible (mobile)
  - [ ] Sidebar shows only:
    - [ ] Dashboard
    - [ ] Products
    - [ ] Orders
  - [ ] Other admin sections hidden

---

## Error Prevention Tests

### Test 1: Unauthorized Access
**Without Vendor Account:**
```
URL: http://127.0.0.1:8000/vendor/admin
Expected: Redirect to /customer/account with error message
```

### Test 2: Non-Approved Vendor
**Pending Status:**
```
Database: Update vendor.status = 'pending'
URL: http://127.0.0.1:8000/vendor/admin
Expected: Redirect with error message
```

### Test 3: Not Logged In
**No Session:**
```
Clear cookies/session
URL: http://127.0.0.1:8000/vendor/admin
Expected: Redirect to login page
```

### Test 4: Product Ownership
**Attempt to Edit Other Vendor's Product:**
```
URL: http://127.0.0.1:8000/vendor/admin/catalog/products/{other_vendor_product_id}/edit
Expected: 403 error (Unauthorized)
```

---

## Performance Tests

- [ ] **Dashboard Load Time**
  - [ ] Should load in < 1 second
  - [ ] No JavaScript errors in console

- [ ] **Database Queries**
  - [ ] Debugbar shows < 10 queries
  - [ ] No N+1 query problems

- [ ] **Asset Loading**
  - [ ] CSS loaded properly
  - [ ] Icons displaying correctly
  - [ ] Images loading without broken links

- [ ] **Responsive Design**
  - [ ] Mobile (320px): Single column layout
  - [ ] Tablet (768px): 2-column layout
  - [ ] Desktop (1920px): Full 4-column layout
  - [ ] No horizontal scrolling on mobile

---

## Dark Mode Test

```
Click: Avatar menu → Dark mode toggle
Expected Results:
- Background changes to dark gray (#1f2937)
- Text changes to light colors
- Cards have dark background
- All elements properly contrasted
- Dashboard fully functional
```

---

## Sidebar Test

### Desktop (Large Screen)
- [ ] Sidebar visible on left
- [ ] Menu items properly indented
- [ ] Active menu item highlighted
- [ ] Smooth animation on collapse

### Mobile (Small Screen)
- [ ] Sidebar hidden by default
- [ ] Hamburger menu visible
- [ ] Click hamburger opens sidebar drawer
- [ ] Sidebar overlays content
- [ ] Close button visible

### Sidebar Content Verification
Only these items should be visible:
```
✓ Dashboard
✓ Catalog
  ✓ Products
✓ Sales
  ✓ Orders

✗ Customers
✗ Promotions
✗ Settings
✗ Content
✗ System Configuration
```

---

## Product Search Test

### Add Multiple Products
```
Add 5-10 products with different names
Each product should have:
- vendor_id = current vendor's id
- Visible status enabled
- Valid category
```

### Search Verification
```
URL: http://127.0.0.1:8000/search?q={product_name}
Expected: All vendor products appear
- Product image
- Product name
- Price
- Vendor info (if shown)
```

### Category Filtering
```
URL: http://127.0.0.1:8000/shop/products?category=slug
Filter: By category
Expected: Vendor products in that category shown
```

---

## Database Verification

### Check Vendor Record
```sql
SELECT * FROM vendors WHERE status = 'approved' LIMIT 1;
```
Should return:
- customer_id (not null)
- store_name (not empty)
- status = 'approved'

### Check Product Records
```sql
SELECT * FROM products WHERE vendor_id = {vendor_id} LIMIT 5;
```
Should return:
- vendor_id set correctly
- type = 'simple' or 'configurable'
- status = 1

### Check Product Flat
```sql
SELECT * FROM product_flat WHERE vendor_id = {vendor_id} LIMIT 5;
```
Should return:
- Denormalized product data
- Updated recent dates
- Correct indexing

---

## Common Issues & Solutions

### Issue: Dashboard Shows 0 Products
**Check:**
```sql
SELECT COUNT(*) FROM products WHERE vendor_id = {vendor_id};
```
**Solution:**
- Add product via dashboard
- Ensure product save was successful
- Check product_flat table is updated

### Issue: Recent Orders Not Showing
**Check:**
```sql
SELECT COUNT(*) FROM vendor_orders WHERE vendor_id = {vendor_id};
```
**Solution:**
- Create a test order with vendor products
- Ensure order status processing completed
- Check vendor_orders table has records

### Issue: Styling Not Applied
**Solution:**
```bash
npm run dev
# or for production
npm run build
composer dump-autoload -o
php artisan cache:clear
```

### Issue: Products Not in Search
**Check:**
```sql
SELECT COUNT(*) FROM product_flat WHERE vendor_id = {vendor_id} AND status = 1;
```
**Solution:**
- Ensure product status = 1 (active)
- Re-index products
- Clear search cache

---

## Sign-Off Checklist

- [ ] Dashboard loads without errors
- [ ] All stats display correctly
- [ ] Quick action buttons functional
- [ ] Recent orders table shows data
- [ ] Recent products grid shows data
- [ ] Sidebar filtered to vendor items
- [ ] Mobile responsive design works
- [ ] Dark mode functional
- [ ] Products appear in search
- [ ] No console JavaScript errors
- [ ] No database errors in logs
- [ ] Performance acceptable
- [ ] Security checks passed

---

**Test Date:** _______________
**Tested By:** _______________
**Status:** ✅ PASS / ❌ FAIL / ⚠️ NEEDS REVIEW

**Notes:**
```
_________________________________
_________________________________
_________________________________
```

