<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:200|min:3',
            'image' => 'nullable|image|max:1024',
            'content' => 'required|max:255',
            'user_id' => 'nullable|exists:users,id',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio!',
            'title.unique:posts' => 'Questo titolo esiste già!',
            'title.max' => 'Il titolo deve essere lungo massimo :max caratteri!',
            'title.min' => 'Il titolo deve essere lungo almeno :min caratteri!',
            'image.max' => 'll peso  dell\'immagine non deve superare 1MB!',
            'image.image' => 'Il file non è un\'immagine!',
            'content.max' => 'Il contenuto deve essere lungo massimo :max caratteri!',
            'content.required' => 'Il contenuto è obbligatorio!',
            'user_id.exists' => 'L\'utente selezionato non esiste',
            'category_id.exists' => 'La categoria selezionata non esiste',
            'tags.exists' => 'Il tag selezionato non esiste'
            
        ];
    }
}