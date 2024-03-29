<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'visible' => ['required', 'boolean'],
            'description' => ['nullable'],
            'ingredients' => ['required'],
            'image' => ['nullable', 'max:4000', 'mimes:jpg']
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'visible.required' => 'La visibilità è obbligatoria',
            'visible.boolean' => 'La visibilità deve essere true o false',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'ingredients.required' => 'Gli ingredienti sono obbligatori',
            'image.max' => 'Il file deve pesare massimo 4mb',
            'image.mimes' => 'Il file deve essere di tipo jpg',
        ];
    }
}
