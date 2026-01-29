<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeskripsiprodukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'produk_id' => 'required|uuid|exists:produk,id',

            'deskripsi' => 'nullable|string',

            // jika gambar berupa path / nama file
            'gambar'    => 'nullable|string|max:255',

            // kalau upload file, ganti ke:
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'bahan'     => 'nullable|string|max:100',

            'ukuran'    => 'nullable|string|max:50',

            'kondisi'   => 'nullable|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'produk_id.required' => 'Produk wajib dipilih.',
            'produk_id.uuid'     => 'Format produk tidak valid.',
            'produk_id.exists'   => 'Produk tidak ditemukan.',

            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'gambar.string' => 'Gambar harus berupa teks.',
            'gambar.max'    => 'Nama file gambar terlalu panjang.',

            // jika upload file
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'gambar.max'   => 'Ukuran gambar maksimal 2MB.',

            'bahan.string' => 'Bahan harus berupa teks.',
            'bahan.max'    => 'Bahan maksimal 100 karakter.',

            'ukuran.string' => 'Ukuran harus berupa teks.',
            'ukuran.max'    => 'Ukuran maksimal 50 karakter.',

            'kondisi.string' => 'Kondisi harus berupa teks.',
            'kondisi.max'    => 'Kondisi maksimal 50 karakter.',
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
