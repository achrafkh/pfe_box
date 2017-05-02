<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class UserRequest extends FormRequest
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
        if(isset($this->id))
        {
            $user = User::find($this->id);

            if($user->role->title == 'com')
            {
                $req = 'required|exists:showrooms,id';
            }
        }
        

        if($this->method() == 'POST')
        {
                return [
                    'fullname'      => 'required|min:3',
                    'username'      => 'required|min:3',
                    'password'      => 'required|min:6',
                    'email'         => 'required|email|max:255|unique:users',
                    'role_id'       => 'required',
                    'showroom_id'   => isset($req) ? $req : '',
                    
                    
                ];
        }
        if($this->method() == 'PATCH') 
        {
                return [
                    'fullname'      => 'required|min:3',
                    'username'      => 'required|min:3',
                    'password'      => '',
                    'email'         => 'required|email|max:255|unique:users,email,'.$user->id,
                    'role_id'       => 'required',
                    'showroom_id'   => isset($req) ? $req : '',
                ];
        }

    
    }
}
