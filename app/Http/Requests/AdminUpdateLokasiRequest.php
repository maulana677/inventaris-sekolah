<?php

namespace App\Http\Requests;

use App\Models\Lokasi;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateLokasiRequest extends FormRequest
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
        $lokasi = Lokasi::find($this->route('lokasi')); // Ambil data lokasi dari database

        // Jika input kosong atau ada perubahan, terapkan validasi
        if (empty($this->nama_lokasi) || ($lokasi && $this->nama_lokasi !== $lokasi->nama_kategori)) {
            return [
                'nama_lokasi' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            'nama_lokasi.required' => 'Nama lokasi wajib diisi',
            'nama_lokasi.string' => 'Nama lokasi harus berupa teks',
            'nama_lokasi.max' => 'Nama lokasi maksimal 255 karakter',
        ];
    }
}
