<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'idJenis' => 'required', // Adjust the validation rule for idJenis
            'namaBarang' => 'required', // Adjust the validation rule for namaBarang
            'harga' => 'required', // Adjust the validation rule for harga
            'stok' => 'required', // Adjust the validation rule for stok
            'img_produk' => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}