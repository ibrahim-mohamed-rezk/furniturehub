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
        return [
            'full_name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'phone' => ['required', 'numeric', 'digits_between:8,15'], // Adjust the digits according to your needs
            'governorate_id' => 'required|exists:governorates,id',
            'city_id' => 'required|exists:cities,id',
            'email' => 'required|email|max:255',
            'website_url' => 'nullable|url',
            'specialization_id' => 'required|exists:specializations,id',
            'other_specializations' => 'nullable|string|max:255',
            'question_one' => 'required|in:yes,no',
            'question_two' => 'required|in:yes,no',
            'number_of_branches' => 'required|numeric|min:1',

            // Validate images if they are uploaded
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,png,jpeg|max:2048', // Max file size set to 2MB

            // Validate social media pages
            'social_media_pages' => 'nullable|array',
            'social_media_pages.*.url' => 'nullable|url',
            'social_media_pages.*.position' => 'nullable|string|max:255',

            // Validate branches if they are added
            'branches' => 'nullable|array',
            'branches.*.name' => 'required|string|max:255',
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'full_name' => __('web.full_name'),
            'brand_name' => __('web.brand_name'),
            'phone' => __('web.phone'),
            'governorate_id' => __('web.governorate'),
            'city_id' => __('web.city'),
            'email' => __('web.email'),
            'website_url' => __('web.website_url'),
            'specialization_id' => __('web.specialization'),
            'other_specializations' => __('web.other_specializations'),
            'question_one' => __('web.question_one'),
            'question_two' => __('web.question_two'),
            'number_of_branches' => __('web.number_of_branches'),
            'images' => __('web.images'),
            'social_media_pages' => __('web.social_media_pages'),
            'branches' => __('web.branches'),
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
            throw new HttpResponseException(response()->json(['errors' => $errors], 422));
        } else {
            // Do the original action of the Form request class
            parent::failedValidation($validator);
        }
    }
}
