<?php

namespace Mawgood\Company\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'nullable|string|max:100',
            'salary_range' => 'nullable|string|max:100',
            'experience_level' => 'nullable|string|max:100',
        ];
    }
}
