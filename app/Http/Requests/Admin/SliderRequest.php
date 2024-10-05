<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SliderRequest extends FormRequest
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
    private function size()
    {
        $req_width = 1540;
        $req_height = 520;


        return ['width' => $req_width, 'height' => $req_height];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'color' => [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'
            ],
            'link' => 'required'

        ];
        // $rules['image'] = (isset($this->slider) ? 'sometimes' : 'required') .$mimes;
        
        $mimes = '|mimes:jpg,png,jpeg,webp';


        foreach (languages() as $lang) {
            $lang_rules = [
                'name_' . $lang->local => 'required',
                'image_' . $lang->local => (isset($this->slider) ? 'sometimes' : 'required') .$mimes,
            ];
            if (request('image_'.$lang->local)) {
                list($width, $height, $type, $attr) = getimagesize(request('image_'.$lang->local));

                if ($width != $this->size()['width'] ) {
                    $rules['width'] = 'required';
                }
                if ( $height != $this->size()['height']) {
                    $rules['height'] = 'required';
                }
            }
            $rules = array_merge($rules, $lang_rules);
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
            'image' => __('sliders.image'),
            'color' => __('sliders.color'),
        ];
        foreach (languages() as $lang) {
            $lang_attributes = [
                'name_' . $lang->local => __('sliders.title') . ' ' . $lang->local,

            ];
            $attributes = array_merge($attributes, $lang_attributes);
        }

        return $attributes;
    }
    /**
     * Get custom error messages for validation failures.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'width.required' => __('web.image_width_required', ['width' => $this->size()['width']]),
            'height.required' => __('web.image_height_required', ['height' => $this->size()['height']]),
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
            throw new HttpResponseException(response()->json(['errors' => $errors], 422));
        } else {
            // Do the original action of the Form request class
            parent::failedValidation($validator);
        }
    }
}
