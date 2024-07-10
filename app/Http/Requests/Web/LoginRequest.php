<?php

namespace App\Http\Requests\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email'=>'required|email',
            'password'=>'required',
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $attributes= [
            'email'=>__('web.email'),
            'password'=>__('web.password'),
        ];
        return $attributes;
    }
    public function messages()
    {
        return [
            'email.required' => __('web.enter_email'),
            'email.email' => __('web.valid_email'),
            'password.required' => __('web.enter_password'),
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * Override the parent method action if the request is for AJAX
     *
     * @param Validator $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        // Change response attitude if the request done via Ajax requests like API requests
        if(Request::wantsJson()){
            $errors = (new ValidationException($validator))->errors();
            $firstError = reset($errors); // Get the first error
            throw new HttpResponseException(response()->json([
                'status_code' => false,
                'message' => $firstError[0],
                'errors' => $errors
            ], 422));
        } else {
            // Do the original action of the Form request class
            parent::failedValidation($validator);
        }
    }
}
