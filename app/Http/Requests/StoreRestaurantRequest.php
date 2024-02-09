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
            'slug' => ['required', 'max:255', 'unique'],
            'image' => ['required', 'image'],
            'user_id' => ['required', 'exists:users,id'],
            'address' => ['required', 'max:255'],
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'vat.required' =>'Il vat è obbligatorio',
            'vat.max' =>'Il vat deve avere massimo :max caratteri',
            'slug.required' => 'Il slug è obbligatorio',
            'slug.max' => 'Il slug deve avere massimo :max caratteri',
            'slug.unique' => 'Il slug deve essere unico',
            'image.required' => 'La immagine è obbligatoria',
            'image.image' => 'La immagine deve essere un immagine',
            'user_id.required' => 'L\'utente è obbligatorio',
            'user_id.exists' => 'L\'utente deve esistere',
            'address.required' => 'L\'indirizzo è obbligatorio',
            'address.max' => 'L\'indirizzo deve avere massimo :max caratteri',
        ];
    }
}
