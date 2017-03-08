<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateClientRequest extends FormRequest
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
            'firstname' => 'required|min:5',
            'lastname'  => 'required|min:5',
            'phone'     => 'required|numeric|unique:clients|min:8',
            'address'   => 'required|min:5',
            'email'     => 'required|unique:clients',
            'city'      => 'required',
            'state'     => 'required',
            'birthdate' => 'required|before:'.Carbon::now(),
        ];
    }
}
