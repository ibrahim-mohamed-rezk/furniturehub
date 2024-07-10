<?php

namespace App\Http\Requests\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
        $rules = [
            'name' => 'required',//first_name
            'address_1' => 'required',
            'post_code' => 'required',

            'email' => [
                'required',
                'email',
                Rule::unique('users')
            ],
            'phone' => [
                "required",
                "numeric",
                Rule::unique('users')
            ],
            'password' => 'required|confirmed',
            'confirm' => 'nullable',
            'gevernorate_id' => 'required|exists:governorates,id'
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
        $attributes = [
            'name' => __('web.name'),
            'email' => __('web.email'),
            'phone' => __('web.phone'),
            'address_1' => __('web.address'),
            'post_code' => __('web.postCode_ZIP'),
            'password' => __('web.password'),
            'password_confirmation' => __('web.password_confirmation'),
            'confirm' => __('web.confirm'),
            'gevernorate_id' => __('web.gevernorate')
        ];
        return $attributes;
    }
    public function messages()
    {
        return [
            'name.required' => __('web.required'),
            'email.required' => __('web.enter_email'),
            'email.email' => __('web.valid_email'),
            'email.unique' => __('web.account_exists'),
            'phone.required' => __('web.enter_phone'),
            'phone.numeric' => __('web.valid_phone'),
            'phone.unique' => __('web.phone_exists'),
            'password.required' => __('web.enter_password'),
            'password.confirmed' => __('web.password_mismatch'),
            'confirm.nullable' => __('web.confirmation_mismatch'),
            'gevernorate_id.required' => __('web.choose_governorate'),
            'gevernorate_id.exists' => __('web.invalid_governorate'),
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
        if (Request::wantsJson()) {
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
