<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'access_token' => 'required|min:5',
            'page_id'  => 'required|min:5',
            'app_sercret'     => 'required|min:5',
            'app_id'     => 'required|min:5',

        ];
    }
}
