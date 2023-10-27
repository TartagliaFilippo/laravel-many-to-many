<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'url' => ['required', 'url'],
            'content' => ['nullable', 'string'],
            'type_id' => ['nullable', 'exists:types,id'],
            'tecnologies' => ['nullable', 'exists:tecnologies,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',

            'url.required' => 'I\'url è obbligatorio',
            'url.url' => 'I\'url deve essere un link',

            'content.string' => 'Il contenuto deve essere una stringa',

            'type_id.exists' => 'La tipologia inserita non è valida',

            'tecnologies.exists' => 'Le tecnologie inserite non sono valide',
        ];
    }
}