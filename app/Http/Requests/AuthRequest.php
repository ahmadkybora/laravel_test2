<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AuthRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
                if(Route::currentRouteName() == 'login')
                    return [
                        'username' => ['bail', 'required', 'string', 'min:2', 'max:25'],
                        'password' => ['required', 'string', 'min:8', 'max:15'],
                    ];
                
                if(Route::currentRouteName() == 'register')
                    return [
                        //
                    ];
            break;
        }
    }
}
