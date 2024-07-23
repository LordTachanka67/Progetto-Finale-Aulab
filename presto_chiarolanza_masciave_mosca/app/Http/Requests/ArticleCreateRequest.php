<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
            /* TITOLO */
            'title.required' => 'Il titolo è obbligatorio',
            'title.min:5' => 'Il titolo deve avere almeno 5 caratteri',

            /* DESCRIZIOME */
            'description.required' => 'La descrizione è obbligatoria',
            'description.text' => 'La descrizione deve essere un testo',
            'description.min:30' => 'La descrizione deve avere almeno 30 caratteri',

            /* PREZZO */
            'price.required' => 'Il prezzo è obbligatorio',
            'price.float' => 'Il prezzo deve essere un numero',
        ];
    }
}
