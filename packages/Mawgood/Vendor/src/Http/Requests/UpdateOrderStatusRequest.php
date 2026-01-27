<?php

namespace Mawgood\Vendor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ];
    }
}
