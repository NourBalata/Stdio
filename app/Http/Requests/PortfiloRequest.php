<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfiloRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'slug'=>'required',
            'title'=>'required',
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:2000'
            
        ];
    }
}
