<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'description.*' => 'sometimes|nullable',
            'name.*' => 'required',
            'picture' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:5120',
            'price' => 'sometimes|nullable|integer',
            'file_path' => 'sometimes|nullable',
            'parent_id' => 'sometimes|nullable|numeric'
        ];
    }
}
