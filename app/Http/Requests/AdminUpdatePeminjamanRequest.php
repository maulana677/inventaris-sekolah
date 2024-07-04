<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdatePeminjamanRequest extends FormRequest
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
            'status' => [
                'required',
                Rule::in(['dipinjam', 'dikembalikan', 'belum dikembalikan']),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'barang_id.required' => 'Kolom Barang harus diisi.',
            'barang_id.exists' => 'Barang yang dipilih tidak valid.',
            'user_id.required' => 'Kolom User harus diisi.',
            'user_id.exists' => 'User yang dipilih tidak valid.',
            'tanggal_pinjam.required' => 'Kolom Tanggal Pinjam harus diisi.',
            'tanggal_pinjam.date' => 'Kolom Tanggal Pinjam harus berupa tanggal yang valid.',
            'tanggal_kembali.date' => 'Kolom Tanggal Kembali harus berupa tanggal yang valid.',
            'tanggal_kembali.after_or_equal' => 'Tanggal Kembali harus setelah atau sama dengan Tanggal Pinjam.',
            'status.required' => 'Kolom Status harus diisi.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ];
    }
}
