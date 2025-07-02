<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'pro_name' => ['required','max:255'],
            'pro_price' => ['required','decimal:1,3'], 
            'pro_quantity' => ['required','numeric'],
            'pro_discount' => ['nullable','decimal:1,3'],
            'category_id' => ['required','numeric'],
            'image' => ['nullable','max:1024','mimes:png,jpg,webp,jpeg']
        ];
    }
}
