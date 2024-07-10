<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules=[
            'photo' => 'sometimes',
            'name'=> 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->member? $this->member->id : 0, 'id')
            ],
            'phone'=> [
                "required",
                "numeric",
                Rule::unique('users')->ignore($this->member? $this->member->id : 0, 'id')
            ],
        ];

        $mimes = '|mimes:jpg,png,jpeg';
        $rules['photo'] = (isset($this->member) ? 'sometimes' : 'required') .$mimes;
        $rules['password'] = (isset($this->member) ? 'sometimes' : 'required') ;

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $local = getCurrentLocale();
        $attributes= [
            'name'=>  __('users.name'),
            'phone'=>  __('users.phone'),
            'email'=> __('users.email'),
            'photo'=>  __('users.photo'),
            'password'=>  __('users.password'),
        ];
        return $attributes;
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
            throw new HttpResponseException(response()->json(['errors' => $errors], 422));
        } else {
            // Do the original action of the Form request class
            parent::failedValidation($validator);
        }
    }
}
