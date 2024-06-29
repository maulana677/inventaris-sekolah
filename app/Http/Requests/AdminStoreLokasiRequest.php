<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreLokasiRequest extends FormRequest
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
            'nama_lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'nama_lokasi.required' => 'Nama Lokasi wajib diisi',
            'nama_lokasi.string' => 'Nama Lokasi harus berupa teks',
            'nama_lokasi.max' => 'Nama Lokasi maksimal 100 karakter',
        ];
    }
}
