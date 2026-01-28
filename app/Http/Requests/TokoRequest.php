<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TokoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->route('id') !== null;

        return [

            'nama_toko' => 'required|string|max:255',

            'email_toko' => $isUpdate
                ? 'required|email|max:255'
                : 'required|email|max:255|unique:toko,email_toko',

            'no_hp_toko' => 'required|string|max:20',

            'alamat_toko' => 'required|string',

            'foto' => $isUpdate
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',

        ];
    }

    public function messages(): array
    {
        return [


            'nama_toko.required' => 'Nama toko wajib diisi.',
            'nama_toko.max'      => 'Nama toko maksimal 255 karakter.',

            'email_toko.required' => 'Email toko wajib diisi.',
            'email_toko.email'    => 'Format email toko tidak valid.',
            'email_toko.unique'   => 'Email toko sudah terdaftar.',

            'no_hp_toko.required' => 'No HP toko wajib diisi.',

            'alamat_toko.required' => 'Alamat toko wajib diisi.',

            'foto.required' => 'Foto toko wajib diupload.',
            'foto.image'    => 'File harus berupa gambar.',
            'foto.mimes'    => 'Format foto harus jpg, jpeg, atau png.',
            'foto.max'      => 'Ukuran foto maksimal 2MB.',

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
