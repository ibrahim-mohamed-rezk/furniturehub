<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
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
            'category_id'=>'nullable|exists:categories,id',
        ];

        $rules['image'] = ($this->category || $this->subcategory ? 'sometimes' : 'required') . '|mimes:jpg,png,jpeg,webp';
        $rules['banner'] = ($this->category || $this->subcategory ? 'sometimes' : 'required') . '|mimes:jpg,png,jpeg,webp';

        foreach (languages() as $lang)
        {
            $lang_rules=[
                'title_'.$lang->local=> 'required',
            ];
            $rules= array_merge($rules, $lang_rules);
        }
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
            'category_id'=>__('categories.category_id'),
            'image'=>__('categories.image'),
            'banner'=>__('categories.banner'),
        ];
        foreach (languages() as $lang)
        {
            $lang_attributes=[
                'title_'.$lang->local => __('categories.title').' '.$lang->local,
            ];
            $attributes= array_merge($attributes, $lang_attributes);
        }

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
