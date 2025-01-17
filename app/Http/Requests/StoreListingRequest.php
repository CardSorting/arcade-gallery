<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('game'));
    }

    public function rules(): array
    {
        return [
            'store_title' => 'required|string|max:255',
            'store_description' => 'required|string|max:1000',
            'store_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'store_screenshots' => 'nullable|array|max:5',
            'store_screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'store_category' => 'required|string|max:255',
            'store_price' => 'nullable|numeric|min:0',
            'store_featured' => 'sometimes|boolean',
            'store_published_at' => 'nullable|date'
        ];
    }
}
