<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStorePeminjamanRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan,belum dikembalikan',
        ];
    }

    public function messages()
    {
        return [
            'barang_id.required' => 'Kolom barang wajib diisi.',
            'barang_id.exists' => 'Barang yang dipilih tidak valid.',
            'user_id.required' => 'Kolom pengguna wajib diisi.',
            'user_id.exists' => 'Pengguna yang dipilih tidak valid.',
            'tanggal_pinjam.required' => 'Kolom tanggal pinjam wajib diisi.',
            'tanggal_pinjam.date' => 'Format tanggal pinjam tidak valid.',
            'tanggal_kembali.date' => 'Format tanggal kembali tidak valid.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali harus setelah atau sama dengan tanggal pinjam.',
            'status.required' => 'Kolom status wajib diisi.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ];
    }
}
