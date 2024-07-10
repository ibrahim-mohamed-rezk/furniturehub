<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ArticleRequest extends FormRequest
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
        $mimes = '|mimes:jpg,png,jpeg,webp';

        $rules =[
            'type_id' => 'required|exists:types,id'
        ];
        foreach (languages() as $lang)
        {
            $lang_rules=[
                'image_logo_'.$lang->local => (isset($this->article) ? 'sometimes' : 'required') .$mimes,
                'image_'.$lang->local => (isset($this->article) ? 'sometimes' : 'required') .$mimes,
                'image_two_'.$lang->local => (isset($this->article) ? 'sometimes' : 'required') .$mimes,
                'user_image_'.$lang->local => (isset($this->article) ? 'sometimes' : 'required') .$mimes,
                'title_'.$lang->local=> 'required',
                'user_'.$lang->local=> 'required',
                'slug_'.$lang->local=> 'required',
                'meta_description_'.$lang->local=> 'required',
                'description_'.$lang->local=> 'required',
                'keywords_'.$lang->local=> 'required',

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
            'image_logo' => __('articles.image_logo'),
            'image' => __('articles.image'),
            'user_image' => __('articles.user_image'),
            'image_two' => __('articles.user_image'),
            'type_id' => __('articles.type'),
        ];
        foreach (languages() as $lang)
        {
            $lang_attributes=[
                'image_logo_'.$lang->local => __('articles.image_logo').' '.$lang->local,
                'image_'.$lang->local => __('articles.image').' '.$lang->local,
                'user_image_'.$lang->local => __('articles.user_image').' '.$lang->local,
                'image_two_'.$lang->local => __('articles.user_image').' '.$lang->local,
                'title_'.$lang->local => __('articles.title').' '.$lang->local,
                'user_'.$lang->local => __('articles.user').' '.$lang->local,
                'slug_'.$lang->local => __('articles.slug').' '.$lang->local,
                'meta_description_'.$lang->local => __('articles.meta_description').' '.$lang->local,
                'description_'.$lang->local => __('articles.description').' '.$lang->local,
                'keywords_'.$lang->local => __('articles.keywords').' '.$lang->local,
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
