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
            'title_update'         => 'required|min:3',
            'notes_update'         => 'min:6',
            'client_id_update'     => 'required|numeric',
            'showroom_id_update'   => 'required|numeric',
            'start_time_update'      => 'required|before:end_at|date',
            'end_time_update'        => 'required|after:start_at|date',
        ];
    }
}
