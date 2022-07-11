<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::check();
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
            'name' => 'required',
            'email' => 'required|email',
            'msg' => 'required',
            'g-recaptcha-response' => 'required | captcha',
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => " Check the box to the left of 'I am not a robot'. ",
            'g-recaptcha-response.captcha' => ' The check result of "I am not a robot" could not be confirmed. ',
        ];
    }
}
