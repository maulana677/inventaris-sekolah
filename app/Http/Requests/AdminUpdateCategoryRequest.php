<?php

namespace App\Http\Requests;

use App\Models\Kategori;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateCategoryRequest extends FormRequest
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
    public function rules()
    {
        $kategori = Kategori::find($this->route('kategori')); // Ambil data kategori dari database

        // Jika input kosong atau ada perubahan, terapkan validasi
        if (empty($this->nama_kategori) || ($kategori && $this->nama_kategori !== $kategori->nama_kategori)) {
            return [
                'nama_kategori' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.string' => 'Nama kategori harus berupa teks',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter',
        ];
    }
}
