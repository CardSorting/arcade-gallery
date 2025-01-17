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
            'store_description' => 'required|string|min:100|max:1000',
            'store_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'store_screenshots' => 'nullable|array|max:5',
            'store_screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'store_category' => 'required|string|max:255',
            'store_price' => 'nullable|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'store_featured' => 'sometimes|boolean',
            'store_published_at' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) {
                    if ($this->store_featured && empty($value)) {
                        $fail('Published date is required when featuring a game.');
                    }
                }
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'store_title.required' => 'A title is required for the store listing',
            'store_title.max' => 'Title cannot exceed 255 characters',
            'store_description.required' => 'A description is required',
            'store_description.min' => 'Description must be at least 100 characters',
            'store_description.max' => 'Description cannot exceed 1000 characters',
            'store_icon.image' => 'The icon must be a valid image',
            'store_icon.mimes' => 'The icon must be a JPEG, PNG, JPG, GIF, or WEBP file',
            'store_icon.max' => 'The icon cannot be larger than 2MB',
            'store_screenshots.max' => 'You can upload a maximum of 5 screenshots',
            'store_screenshots.*.image' => 'Each screenshot must be a valid image',
            'store_screenshots.*.mimes' => 'Each screenshot must be a JPEG, PNG, JPG, GIF, or WEBP file',
            'store_screenshots.*.max' => 'Each screenshot cannot be larger than 2MB',
            'store_category.required' => 'A category is required',
            'store_price.numeric' => 'Price must be a number',
            'store_price.min' => 'Price cannot be negative',
            'store_price.regex' => 'Price must be in valid currency format (e.g. 9.99)',
            'store_published_at.date' => 'Published date must be a valid date',
        ];
    }
}
