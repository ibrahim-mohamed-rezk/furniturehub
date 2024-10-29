<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {

        return Auth::check();
    }
    private function size(): array
    {
        $req_width = null;
        $req_height = null;

        switch ($this->banner->id) {
            case 8: case 10: case 13: case 14: case 17: case 18: case 21: case 22: case 25: case 26: case 29:
                $req_width = 956;
                $req_height = 303;
                break;
            case 7:
                $req_width = 738;
                $req_height = 267;
                break;
            case 9: case 11:case 12:case 15:case 16:case 19:case 20:case 23:case 24:case 27:case 28:
                $req_width = 568;
                $req_height = 303;
                break;
            case 56: case 57: case 84: case 85: case 86: case 91: case 94: case 95: case 96:
            case 97: case 98: case 99:
                $req_width = 1000;
                $req_height = 532;
                break;
            case 58: case 59: case 60: case 61: case 62: case 63: case 64: case 65: case 66:
            case 67: case 68: case 69: case 70: case 71: case 72: case 73: case 74: case 75:
            case 76: case 78: case 80: case 81: case 82: case 83:
                $req_width = 360;
                $req_height = 358;
                break;

            case 4: case 5:
                $req_width = 354;
                $req_height = 267;
                break;

            case 101: case 102: case 103: case 46:
                $req_width = 1000;
                $req_height = 650;
                break;

            case 34:
                $req_width = 600;
                $req_height = 637;
                break;

            case 33:
                $req_width = 1201;
                $req_height = 250;
                break;

            case 30: case 31:
                $req_width = 566;
                $req_height = 289;
                break;
            case 32:
                $req_width = 953;
                $req_height = 602;
                break;

            default:
                $req_width = 221;
                $req_height = 161;
                break;
        }

        return ['width' => $req_width, 'height' => $req_height];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'link' => 'required'

        ];
        $mimes = '|mimes:jpg,png,jpeg,webp';

        
        foreach (languages() as $lang) {
            $lang_rules = [
                'name_' . $lang->local => 'required',
                'description_' . $lang->local => 'sometimes',
                'image_'.$lang->local=>(isset($this->banner) ? 'sometimes' : 'required') . $mimes,
            ];
            $rules = array_merge($rules, $lang_rules);
            if (request('image_'.$lang->local)) {
                list($width, $height, $type, $attr) = getimagesize(request('image_'.$lang->local));

                if ($width != $this->size()['width']) {
                    $rules['width'] = 'required';
                }
                if ($height != $this->size()['height']) {
                    $rules['height'] = 'required';
                }
            }
        }
        return $rules;
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        $attributes = [
            'image' => __('sliders.image'),
            'color' => __('sliders.color'),
        ];
        foreach (languages() as $lang) {
            $lang_attributes = [
                'name_' . $lang->local => __('sliders.title') . ' ' . $lang->local,
                'description_' . $lang->local => __('sliders.description') . ' ' . $lang->local,

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
    public function messages(): array
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
