<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            //
            'name' => ['required', 'max:255'],
            'vat' => ['required', 'max:11'],
            'image' => ['required', 'image'],
            'address' => ['required', 'max:255'],
            'types'=> ['required', 'exists:types,id'],
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome del tuo ristorante deve avere massimo :max caratteri',
            'vat.required' =>'Il vat è obbligatorio',
            'vat.max' =>'Il vat deve avere massimo :max caratteri',
            'image.required' => 'La immagine è obbligatoria',
            'image.image' => 'La immagine deve essere un immagine',
            'address.required' => 'L\'indirizzo è obbligatorio',
            'address.max' => 'L\'indirizzo deve avere massimo :max caratteri',
            'types.required' => 'Seleziona almeno una tipologia per il tuo ristorante',
        ];
    }
}
