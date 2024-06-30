<?php

namespace App\Http\Requests;

use App\Models\BarangMasuk;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateBarangMasukRequest extends FormRequest
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
        $barangMasuk = BarangMasuk::find($this->route('barang_masuk')); // Ambil data barang masuk dari ID

        // Jika input kosong atau ada perubahan, terapkan validasi
        if ($this->filled('barang_id') && $this->barang_id !== optional($barangMasuk)->barang_id) {
            return [
                'barang_id' => 'required|exists:barangs,id',
                'supplier_id' => 'required|exists:suppliers,id',
                'jumlah' => 'required|integer',
                'tanggal_masuk' => 'required|date',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            'barang_id.required' => 'Barang wajib diisi.',
            'barang_id.exists' => 'Barang tidak ditemukan.',
            'supplier_id.required' => 'Supplier wajib diisi.',
            'supplier_id.exists' => 'Supplier tidak ditemukan.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'tanggal_masuk.required' => 'Tanggal masuk wajib diisi.',
            'tanggal_masuk.date' => 'Tanggal masuk harus berupa tanggal yang valid.',
        ];
    }
}
