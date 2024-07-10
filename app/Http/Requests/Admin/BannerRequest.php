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
            'color' => [
                'required',
                'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'
            ],
            'link' => 'required'

        ];
        $mimes = '|mimes:jpg,png,jpeg,webp';
        // $rules['image'] = (isset($this->banner) ? 'sometimes' : 'required') . $mimes;
        if (in_array($this->banner->id, [ 7,8,9,10,13,14, 15, 16,18,31,32,33,34,35,36,37,38,39,40,41,48,49,50,51,11,12,19,22, 24, 26, 28, 30,17,53,54,55])) {
            $req_width =  1000;
            $req_height = 809;
        }elseif(in_array($this->banner->id, [56,57,84,85,86,91])){
            $req_width =  1000;
            $req_height = 532;
        }elseif(in_array($this->banner->id, [58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,78,80,81,82,83])){
            $req_width =  360;
            $req_height = 358;
        }
        elseif (in_array($this->banner->id, [4, 5])) {
            $req_width =  481;
            $req_height = 841;
        }elseif (in_array($this->banner->id, [42, 44,45,46])) {
            $req_width =  1000;
            $req_height = 650;
        } elseif ($this->banner->id == 43) {
            $req_width =  1536;
            $req_height = 2010;
        } elseif (in_array($this->banner->id, [ 20,52])) {
            $req_width =  1269;
            $req_height = 269;
        } elseif (in_array($this->banner->id, [21, 23,])) {
            $req_width =  269;
            $req_height = 1269;
        } elseif (in_array($this->banner->id, [27, 29])) {
            $req_width =  196;
            $req_height = 193;
        } elseif (in_array($this->banner->id, [25])) {
            $req_width =  856;
            $req_height = 181;

        } elseif($this->banner->id == 47){
            $req_width =  1320;
            $req_height = 290;
        }else {
            $req_width =  221;
            $req_height = 161;
        }
        
        foreach (languages() as $lang) {
            $lang_rules = [
                'name_' . $lang->local => 'required',
                'description_' . $lang->local => 'sometimes',
                'image_'.$lang->local=>(isset($this->banner) ? 'sometimes' : 'required') . $mimes,
            ];
            $rules = array_merge($rules, $lang_rules);
        }
        if (request('image_'.$lang->local)) {
            list($width, $height, $type, $attr) = getimagesize(request('image_'.$lang->local));

            if ($width != $req_width) {
                $rules['width'] = 'required';
            }
            if ($height != $req_height) {
                $rules['height'] = 'required';
            }
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
                'description_' . $lang->local => __('sliders.description') . ' ' . $lang->local,

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
