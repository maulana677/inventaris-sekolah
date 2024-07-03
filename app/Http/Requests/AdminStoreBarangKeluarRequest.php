<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreBarangKeluarRequest extends FormRequest
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
            'jumlah' => 'required|integer',
            'tanggal_keluar' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'barang_id.required' => 'Barang harus dipilih.',
            'barang_id.exists' => 'Barang yang dipilih tidak valid.',
            'user_id.required' => 'Supplier harus dipilih.',
            'user_id.exists' => 'Supplier yang dipilih tidak valid.',
            'jumlah.required' => 'Jumlah barang harus diisi.',
            'jumlah.integer' => 'Jumlah barang harus berupa angka.',
            'jumlah.min' => 'Jumlah barang minimal 1.',
            'tanggal_keluar.required' => 'Tanggal keluar harus diisi.',
            'tanggal_keluar.date' => 'Tanggal keluar harus berupa tanggal yang valid.',
        ];
    }
}
