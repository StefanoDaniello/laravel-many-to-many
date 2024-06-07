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
            'name' => 'required|unique:tags|max:200|min:3|string',
            'slug' => 'nullable|unique:tags|max:200|min:3|string',
        ];
    }

    public function messages(){

        return [
            'name.required' => 'Il nome è obbligatorio!',
            'name.unique:tags' => 'Questo nome esiste più!',
            'name.max' => 'Il nome deve essere lungo massimo :max caratteri!',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri!',
            'name.string' => 'Il nome deve essere una stringa',
            'slug.unique:tags' => 'Questo slug esiste più!',
            'slug.max' => 'Il slug deve essere lungo massimo :max caratteri!',
            'slug.min' => 'Il slug deve essere lungo almeno :min caratteri!',
            'slug.string' => 'Il slug deve essere una stringa',
            
        ];
    }
}
