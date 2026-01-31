<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Webkul\Core\Rules\Slug;

class StoreUpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        if ($this->isMethod('post')) {
            $rules = [
                'type' => 'required',
                'attribute_family_id' => 'required',
                'sku' => ['required', 'unique:products,sku', new Slug],
            ];
        }

        return $rules;
    }
}
