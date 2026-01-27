# ✅ المرحلة 2 — Company Journey (مكتمل)

## 🎯 الهدف
إدارة الوظائف من أول ما الشركة تدخل لحد ما تختار متقدم

---

## 📦 Package Structure

```
packages/Mawgood/Company/
├── src/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php ✅
│   │   │   ├── ProfileController.php ✅
│   │   │   ├── JobController.php ✅
│   │   │   └── ApplicationController.php ✅
│   │   ├── Requests/
│   │   │   ├── StoreJobRequest.php ✅
│   │   │   └── UpdateCompanyProfileRequest.php ✅
│   │   └── Middleware/
│   │       └── EnsureCompanyRole.php ✅
│   ├── Models/
│   │   └── CompanyProfile.php ✅
│   ├── Services/
│   │   ├── JobPostingService.php ✅
│   │   └── ApplicationReviewService.php ✅
│   ├── Routes/
│   │   └── web.php ✅
│   ├── Resources/views/
│   │   ├── dashboard/index.blade.php ✅
│   │   ├── jobs/
│   │   │   ├── index.blade.php ✅
│   │   │   ├── create.blade.php ✅
│   │   │   └── edit.blade.php ✅
│   │   ├── applications/index.blade.php ✅
│   │   └── profile/index.blade.php ✅
│   ├── Database/Migrations/
│   │   ├── 2026_01_21_100000_create_company_profiles_table.php ✅
│   │   ├── 2026_01_21_100001_update_jobs_table.php ✅
│   │   └── 2026_01_21_100002_update_job_applications_table.php ✅
│   └── Providers/
│       └── CompanyServiceProvider.php ✅
└── composer.json ✅
```

---

## 🗄️ Database

### company_profiles
- id
- user_id → customers.id
- company_name
- industry
- description
- website
- logo
- status (pending/approved/rejected)

### jobs (updated)
- company_id → customers.id
- type
- status (draft/published/closed)

### job_applications (updated)
- job_id → job_listings.id
- user_id → customers.id

---

## 🛣️ Routes

```php
GET    /company/dashboard                → Dashboard
GET    /company/profile                  → Profile
POST   /company/profile                  → Update Profile

GET    /company/jobs                     → Jobs List
GET    /company/jobs/create              → Create Job Form
POST   /company/jobs                     → Store Job
GET    /company/jobs/{id}/edit           → Edit Job Form
PUT    /company/jobs/{id}                → Update Job
DELETE /company/jobs/{id}                → Delete Job

GET    /company/jobs/{id}/applications   → Applications List
POST   /company/applications/{id}/accept → Accept Application
POST   /company/applications/{id}/reject → Reject Application
```

**Middleware:** `web + customer + EnsureCompanyRole`

---

## 🔁 Company Flow

```
Login
  ↓
Select Role: Company
  ↓
Company Dashboard
  ├── Stats (Jobs, Applications)
  └── Recent Applications
  ↓
Post New Job
  ↓
Job Published
  ↓
Receive Applications
  ↓
Review Applications
  ├── View Resume
  ├── Read Cover Letter
  └── Accept / Reject
  ↓
Notify Applicant (TODO)
```

---

## 🧠 Services

### JobPostingService
```php
create($user, $data)      // Create new job
update($job, $data)       // Update job
getCompanyJobs($companyId) // Get company jobs
```

### ApplicationReviewService
```php
accept($applicationId, $companyUser)  // Accept application
reject($applicationId, $companyUser)  // Reject application
getJobApplications($jobId, $companyUser) // Get job applications
```

---

## 📋 Features

### Dashboard
✅ Total Jobs
✅ Active Jobs
✅ Total Applications
✅ Pending Applications
✅ Recent Applications List

### Job Management
✅ Create Job
✅ Edit Job
✅ Delete Job
✅ List Jobs
✅ View Applications per Job

### Application Review
✅ View Applicant Details
✅ View Resume
✅ View Cover Letter
✅ Accept Application
✅ Reject Application
✅ Status Badges

### Company Profile
✅ Company Name
✅ Industry
✅ Description
✅ Website
✅ Logo Upload

---

## ✅ Definition of Done

| المتطلب | الحالة |
|---------|:------:|
| Company Dashboard | ✅ |
| Post Jobs | ✅ |
| Edit/Delete Jobs | ✅ |
| View Applications | ✅ |
| Accept/Reject Applications | ✅ |
| Company Profile | ✅ |
| Separation من Vendor | ✅ |
| User واحد + Role | ✅ |
| Clean Architecture | ✅ |

---

## 🎉 النتيجة

**Company System كامل ومنفصل!**

- ✅ Company = User + Role
- ✅ Job Posting System
- ✅ Application Review System
- ✅ Accept/Reject Workflow
- ✅ Dashboard with Stats
- ✅ Profile Management
- ✅ مفيش خلط مع Vendor
- ✅ Package منفصل تماماً

**الآن Company تقدر:**
- تنشر وظائف
- تستقبل طلبات
- تراجع السير الذاتية
- تقبل أو ترفض المتقدمين
- تدير ملفها الشخصي
