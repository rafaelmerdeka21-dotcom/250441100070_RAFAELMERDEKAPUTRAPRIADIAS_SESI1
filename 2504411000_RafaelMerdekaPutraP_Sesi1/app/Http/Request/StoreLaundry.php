<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaundryRequest extends FormRequest
{
    /**
     * Request diperbolehkan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rule validasi (dalam bentuk array supaya mudah dimodifikasi
     * oleh UpdateBukuRequest yang mewarisi class ini).
     */
    public function rules(): array
    {
        return [
            'kategori_id'  => ['required', 'exists:kategoris,id'],
            'nama_layanan '    => ['required', 'string', 'min:3', 'max:150'],
            'jenis '      => ['required', 'string', 'min:3', 'max:20'],
            'tarif_per_satuan ' => ['required', '10000', 'max:100'],
        ];
    }

    /**
     * Pesan error kustom (Bahasa Indonesia).
     */
    public function messages(): array
    {
        return [
            'kategori_id.required' => 'Kategori wajib diisi.',
            'kategori_id.exists'   => 'Kategori yang dipilih tidak valid.',

            'nama.required' => 'Nama mahasiswa wajib diisi.',
            'nama.string'   => 'Nama mahasiswa harus berupa teks.',
            'nama.min'      => 'Nama mahasiswa minimal 3 karakter',
            'nama.max'      => 'Nama mahasiswa maksimal 150 karakter',

            'nim.required' => 'NIM wajib diisi.',
            'nim.string'   => 'NIM harus berupa teks.',
            'nim.min'      => 'NIM minimal 3 karakter',
            'nim.max'      => 'NIM maksimal 20 karakter',

            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Email tidak valid.',
            'email.max'      => 'Email maksimal 100 karakter',
        ];
    }

    /**
     * Nama atribut yang ramah.
     */
    public function attributes(): array
    {
        return [
            'kategori_id'  => 'kategori',
            'nama'        => 'nama',
            'nim'      => 'nim',
            'email' => 'email',
        ];
    }
}
