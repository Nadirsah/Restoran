<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'phone_1' => 'required|numeric',
            'phone_2' => 'required|numeric',
            'adress' => 'required',
            'email' => 'required|email',
            'activ' => 'required|integer',
            'logo'=>'max:2048|mimes:jpg,png',
            'favicon'=>'max:2048|mimes:jpg,png',
        ];
    }
}