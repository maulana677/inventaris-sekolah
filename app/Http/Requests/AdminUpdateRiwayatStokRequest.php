<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRiwayatStokRequest extends FormRequest
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
        return [
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
            'jenis' => 'required|in:masuk,keluar',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'barang_id.required' => 'Barang harus dipilih.',
            'barang_id.exists' => 'Barang yang dipilih tidak valid.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'jumlah.required' => 'Jumlah harus diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'jenis.required' => 'Jenis transaksi harus dipilih.',
            'jenis.in' => 'Jenis transaksi tidak valid.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];
    }
}
