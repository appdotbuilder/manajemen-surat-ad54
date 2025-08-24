<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomingLetterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'letter_number' => 'required|string|max:100',
            'internal_number' => 'required|string|max:100|unique:incoming_letters,internal_number',
            'subject' => 'required|string|max:500',
            'sender' => 'required|string|max:255',
            'sender_address' => 'nullable|string',
            'letter_date' => 'required|date',
            'received_date' => 'required|date|after_or_equal:letter_date',
            'category_id' => 'required|exists:letter_categories,id',
            'letter_type_id' => 'required|exists:letter_types,id',
            'received_by' => 'required|exists:employees,id',
            'notes' => 'nullable|string',
            'status' => 'required|in:received,processed,archived',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'letter_number.required' => 'Nomor surat wajib diisi.',
            'internal_number.required' => 'Nomor registrasi internal wajib diisi.',
            'internal_number.unique' => 'Nomor registrasi internal sudah digunakan.',
            'subject.required' => 'Perihal surat wajib diisi.',
            'sender.required' => 'Pengirim surat wajib diisi.',
            'letter_date.required' => 'Tanggal surat wajib diisi.',
            'received_date.required' => 'Tanggal diterima wajib diisi.',
            'received_date.after_or_equal' => 'Tanggal diterima tidak boleh sebelum tanggal surat.',
            'category_id.required' => 'Kategori surat wajib dipilih.',
            'letter_type_id.required' => 'Sifat surat wajib dipilih.',
            'received_by.required' => 'Penerima surat wajib dipilih.',
        ];
    }
}