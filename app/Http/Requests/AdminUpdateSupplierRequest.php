<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateSupplierRequest extends FormRequest
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
        $supplier = Supplier::find($this->route('supplier'));

        return [
            'nama_supplier' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'telepon' => 'sometimes|required|string|max:15',
        ];
    }

    public function messages()
    {
        return [
            'nama_supplier.required' => 'Nama supplier wajib diisi',
            'nama_supplier.string' => 'Nama supplier harus berupa teks',
            'nama_supplier.max' => 'Nama supplier maksimal 255 karakter',
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.string' => 'Alamat harus berupa teks',
            'telepon.required' => 'Nomor telepon wajib diisi',
            'telepon.string' => 'Nomor telepon harus berupa teks',
            'telepon.max' => 'Nomor telepon maksimal 15 karakter',
        ];
    }
}
