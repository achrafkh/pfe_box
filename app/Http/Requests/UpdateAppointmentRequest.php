<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|min:3',
            'notes'         => 'min:6',
            'client_id'     => 'required|numeric',
            'showroom_id'   => 'required|numeric',
            'start_at'      => 'required',
            'end_at'        => 'required',
        ];
    }
}
