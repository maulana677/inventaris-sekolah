<?php

namespace App\Http\Requests;

use App\Models\Barang;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateBarangRequest extends FormRequest
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
        $barang = Barang::find($this->route('barang')); // Ambil data barang dari ID

        // Jika input kosong atau ada perubahan, terapkan validasi
        if ($this->filled('nama_barang') && $this->nama_barang !== optional($barang)->nama_barang) {
            return [
                'nama_barang' => 'required|string|max:100',
                'deskripsi' => 'nullable|string',
                'kategori_id' => 'required|exists:kategoris,id',
                'lokasi_id' => 'required|exists:lokasis,id',
                'jumlah' => 'required|integer',
                'tanggal_masuk' => 'required|date',
                'kondisi' => 'required|in:baik,rusak',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Nama barang harus diisi.',
            'nama_barang.string' => 'Nama barang harus berupa string.',
            'nama_barang.max' => 'Nama barang maksimal 100 karakter.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'kategori_id.required' => 'Kategori harus dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'lokasi_id.required' => 'Lokasi harus dipilih.',
            'lokasi_id.exists' => 'Lokasi yang dipilih tidak valid.',
            'jumlah.required' => 'Jumlah harus diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'tanggal_masuk.required' => 'Tanggal masuk harus diisi.',
            'tanggal_masuk.date' => 'Tanggal masuk harus berupa tanggal yang valid.',
            'kondisi.required' => 'Kondisi harus dipilih.',
            'kondisi.in' => 'Kondisi yang dipilih tidak valid.',
        ];
    }
}
