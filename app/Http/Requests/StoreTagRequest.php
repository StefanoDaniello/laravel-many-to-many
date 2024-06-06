<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'unique:tags|max:50|min:3'
        ];
    }

    public function messages(){

        return [
            'name.unique:tags' => 'Questo tag esiste gia!',
            'name.max' => 'Il tag deve essere lungo massimo :50 caratteri!',
            'name.min' => 'Il tag deve essere lungo almeno :3 caratteri!'
        ];
    }
}
