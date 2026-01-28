<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->route('id') !== null;

        return [
            'id_kategori' => 'required|uuid|exists:kategori,id',
            'id_toko'     => 'required|uuid|exists:toko,id',

            'nama_produk' => 'required|string|max:255',

            'harga'       => 'required|integer|min:0',

            'status_stok' => 'required|in:tersedia,kosong',

            // biasanya tidak diinput manual
            'jumlah_terjual' => 'nullable|integer|min:0',
        ];
    }


    public function messages(): array
    {
        return [
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'id_kategori.uuid'     => 'Format kategori tidak valid.',
            'id_kategori.exists'   => 'Kategori tidak ditemukan.',

            'id_toko.required' => 'Toko wajib dipilih.',
            'id_toko.uuid'     => 'Format toko tidak valid.',
            'id_toko.exists'   => 'Toko tidak ditemukan.',

            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string'   => 'Nama produk harus berupa teks.',
            'nama_produk.max'      => 'Nama produk maksimal 255 karakter.',

            'harga.required' => 'Harga wajib diisi.',
            'harga.integer'  => 'Harga harus berupa angka.',
            'harga.min'      => 'Harga tidak boleh kurang dari 0.',

            'status_stok.required' => 'Status stok wajib dipilih.',
            'status_stok.in'       => 'Status stok harus tersedia atau kosong.',

            'jumlah_terjual.integer' => 'Jumlah terjual harus berupa angka.',
            'jumlah_terjual.min'     => 'Jumlah terjual tidak boleh negatif.',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'code'    => 422,
                'status'  => 'validation_failed',
                'message' => 'Check your input data',
                'data'    => $validator->errors(),
            ], 422)
        );
    }
}
