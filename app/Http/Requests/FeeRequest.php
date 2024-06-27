<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'student_id' => 'required',
            'payment_month' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'remaining_amount' => 'required',
            'payment_date' => 'required',
            'payment_status' => 'required',
        ];
    }
}
