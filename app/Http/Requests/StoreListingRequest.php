<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'game_id' => ['required', 'exists:games,id'],
            'version' => ['required', 'string', 'max:20'],
            'release_date' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:100', 'max:2000'],
            'icon' => ['required', 'image', 'mimes:jpeg,png', 'max:2048', 'dimensions:ratio=1/1'],
            'screenshots' => ['nullable', 'array', 'max:5'],
            'screenshots.*' => ['image', 'mimes:jpeg,png', 'max:2048'],
            'category' => ['required', 'string', 'in:action,adventure,puzzle,strategy,other'],
            'price' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'distribution' => ['required', 'string', 'in:free,paid']
        ];
    }

    public function messages(): array
    {
        return [
            'version.required' => 'Version number is required',
            'version.string' => 'Version must be a string',
            'version.max' => 'Version cannot exceed 20 characters',
            'release_date.required' => 'Release date is required',
            'release_date.date' => 'Release date must be a valid date',
            'game_id.required' => 'Game ID is required',
            'game_id.exists' => 'Invalid game selected',
            'name.required' => 'App name is required',
            'name.max' => 'App name cannot exceed 255 characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 100 characters',
            'description.max' => 'Description cannot exceed 2000 characters',
            'icon.required' => 'App icon is required',
            'icon.image' => 'App icon must be a valid image',
            'icon.mimes' => 'App icon must be a JPEG or PNG file',
            'icon.max' => 'App icon cannot be larger than 2MB',
            'icon.dimensions' => 'App icon must be square (1:1 aspect ratio)',
            'screenshots.max' => 'You can upload a maximum of 5 screenshots',
            'screenshots.*.image' => 'Each screenshot must be a valid image',
            'screenshots.*.mimes' => 'Each screenshot must be a JPEG or PNG file',
            'screenshots.*.max' => 'Each screenshot cannot be larger than 2MB',
            'category.required' => 'Category is required',
            'category.in' => 'Invalid category selected',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price cannot be negative',
            'price.regex' => 'Price must be in valid currency format (e.g. 9.99)',
            'distribution.required' => 'Distribution type is required',
            'distribution.in' => 'Invalid distribution type selected',
        ];
    }
}
