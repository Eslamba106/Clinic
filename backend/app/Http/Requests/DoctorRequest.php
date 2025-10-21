<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name'            => 'required|string|max:255',
            'specialization'  => 'required|string|max:255',
            'license_number'  => 'required|string|max:100|unique:doctors,license_number,' . $this->route('doctor'),
            'clinic_id'       => 'nullable|exists:clinics,id',
            'email'           => 'nullable|email|max:255',
            'phone'           => 'nullable|string|max:20',
        ];
    }
}
