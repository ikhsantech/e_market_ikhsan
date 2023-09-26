<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatebarangRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'kode_barang' => 'required',
            'produks_id' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'ditarik' => 'required',
            'user_id' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'kode_barang.required' => 'Data Barang belum di isi!'
        ];
    }
}
