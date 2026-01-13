<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Job;
use App\JobCategory;

uses(RefreshDatabase::class);

it('submits a job application and stores record and file', function () {
    Storage::fake('public');

    $category = JobCategory::create(['name' => 'Engineering', 'slug' => 'engineering', 'status' => 1]);

    $job = Job::create([
        'title' => 'Test Engineer',
        'slug' => 'test-engineer',
        'description' => 'A test job',
        'company_name' => 'Acme',
        'city' => 'Remote',
        'job_type' => 'full-time',
        'job_category_id' => $category->id,
        'status' => 1,
    ]);

    $file = UploadedFile::fake()->create('resume.pdf', 100);

    $response = $this->post(route('jobs.apply', $job->slug), [
        'applicant_name' => 'Jane Doe',
        'applicant_email' => 'jane@example.com',
        'applicant_phone' => '555-1234',
        'cover_letter' => 'I am excited to apply',
        'resume' => $file,
    ]);

    $response->assertRedirect(route('jobs.apply.success', ['slug' => $job->slug]));

    $this->assertDatabaseHas('job_applications', [
        'applicant_email' => 'jane@example.com',
        'job_listing_id' => $job->id,
    ]);

    $application = \App\JobApplication::where('applicant_email', 'jane@example.com')->first();
    expect($application)->not->toBeNull();

    Storage::disk('public')->assertExists($application->resume_path);
});