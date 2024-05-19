<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:100',
            'description' => 'nullable|max:1000',
            'thumb' => 'nullable|max:255',
            'price' => 'nullable|max:15',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => 'nullable|max:50',
        ];
    }
}
