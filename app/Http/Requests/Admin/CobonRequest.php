<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class CobonRequest extends FormRequest
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
        $rules =[
            'type'=>'required|in:all,category,product',
            'status'=>'required|in:value,percentage',
            'code'=>'required',
            'discount'=>'required|numeric',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after:start_date',
            'product_ids.*'=>'required|exists:products,id',
            'category_ids.*'=>'required|exists:categories,id',
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
            'type' => __('cobons.type'),
            'code' => __('cobons.code'),
            'status' => __('cobons.status'),
            'discount' => __('cobons.discount'),
            'start_date' => __('cobons.start_date'),
            'end_date' => __('cobons.end_date'),
            'product_ids' => __('cobons.product'),
            'category_ids' => __('cobons.category'),
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
