<?php

namespace App\Http\Requests\Web;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class SellerRequest extends FormRequest
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
            'name'=>'required',
            'brand_name'=>'required',
            'city'=>'required|exists:governorates,id',
            'email'=>'required|email',
            'website_link'=>'sometimes',
            'social_media_page'=>'sometimes',
            'phone'=> [
                "required",
                "numeric"
            ],
            'section'=>'required',

            'question'=>'required|in:yes,no',



            
        ];

        $mimes = '|mimes:jpg,png,jpeg';
        $rules['image'] =  'required|image'.$mimes;
        $rules['images.*'] = 'sometimes'.$mimes;

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
            'name'=>__('web.name'),
            'phone'=>__('web.phone'),
            'brand_name'=>__('web.brand_name'),
            'city'=>__('web.city'),
            'image'=>__('web.image_for_room'),
            'section'=>__('web.section'),
            'email'=>__('web.email'),
            'website_link'=>__('web.website_link'),
            'social_media_page'=>__('web.social_media_page'),
            'question'=>__('web.question'),

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
