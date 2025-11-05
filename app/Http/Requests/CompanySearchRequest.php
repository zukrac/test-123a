<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySearchRequest extends FormRequest
{
    public function rules()
    {
        return [
            'q' => 'nullable|string|max:255',
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
            'offset' => 'nullable|integer',
            'limit' => 'nullable|integer',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'distance' => 'nullable|integer|min:1',
        ];
    }

}
