<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PageRequest extends FormRequest
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
        $rules = [
            'image' => 'sometimes|mimes:jpg,jpeg,png',
        ];

        $req_width = 221;
        $req_height = 161;

        if (in_array($this->page->id, [1, 2, 3, 4, 5])) {
            $req_width = 48;
            $req_height = 48;
        } elseif ($this->page->id == 6) {
            $req_width = 430;
            $req_height = 149;
        } elseif (in_array($this->page->id, [8, 9, 10])) {
            $req_width = 1200;
            $req_height = 429;
        }

        if (request('image')) {
            list($width, $height, $type, $attr) = getimagesize(request('image'));

            if ($width != $req_width) {
                $rules['image'] .= '|dimensions:width=' . $req_width . ',height=' . $req_height;
            }
        }

        foreach (languages() as $lang) {
            $lang_rules = [
                'title_' . $lang->local => 'required',
                'slug_' . $lang->local => 'required',
                'meta_description_' . $lang->local => 'required',
                'description_' . $lang->local => 'required',
                'keywords_' . $lang->local => 'required',
            ];
            $rules = array_merge($rules, $lang_rules);
        }

        return $rules;
    }

    public function attributes()
    {
        $req_width = 221; 
        $req_height = 161;

        if (in_array($this->page->id, [1, 2, 3, 4, 5])) {
            $req_width = 48;
            $req_height = 48;
        } elseif ($this->page->id == 6) {
            $req_width = 430;
            $req_height = 149;
        } elseif (in_array($this->page->id, [8, 9, 10])) {
            $req_width = 1200;
            $req_height = 429;
        }

        $attributes = [
            'image' => __('pages.image') . " ($req_width x $req_height pixels)",
        ];

        foreach (languages() as $lang) {
            $lang_attributes = [
                'title_' . $lang->local => __('pages.title') . ' ' . $lang->local,
                'slug_' . $lang->local => __('pages.slug') . ' ' . $lang->local,
                'meta_description_' . $lang->local => __('pages.meta_description') . ' ' . $lang->local,
                'description_' . $lang->local => __('pages.description') . ' ' . $lang->local,
                'keywords_' . $lang->local => __('pages.keywords') . ' ' . $lang->local,
            ];
            $attributes = array_merge($attributes, $lang_attributes);
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
        if (Request::wantsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(response()->json(['errors' => $errors], 422));
        } else {
            // Do the original action of the Form request class
            parent::failedValidation($validator);
        }
    }
}
