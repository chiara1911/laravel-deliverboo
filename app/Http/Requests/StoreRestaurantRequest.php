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
            'vat' => ['required', 'max:11', 'unique:restaurants'],
            'image' => ['image', 'max:4000', 'mimes:jpg'],
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
            'vat.unique' => 'Il numero della P.Iva è già registrato nel nostro database.',
            'vat.required' =>'Il numero della P.Iva è obbligatorio',
            'vat.max' =>'Il numero della P.Iva deve avere massimo :max caratteri',
            'image.required' => 'L\' immagine è obbligatoria',
            'image.image' => 'Il file deve essere di tipo immagine',
            'image.max' => 'Il file deve pesare massimo 4mb',
            'image.mimes' => 'Il file deve essere di tipo jpg',
            'address.required' => 'L\'indirizzo è obbligatorio',
            'address.max' => 'L\'indirizzo deve avere massimo :max caratteri',
            'types.required' => 'Seleziona almeno una tipologia per il tuo ristorante',
        ];
    }
}
