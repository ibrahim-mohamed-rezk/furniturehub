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
    private function size($type): array
    {
        if($type == 'image'){
            $req_width = 390;
            $req_height = 269;

        }elseif ($type == 'icon'){
            $req_width = 700;
            $req_height = 949;
        }elseif ($type == 'image_products_en')
        {
            $req_width = 1199;
            $req_height = 250;
        }elseif ($type == 'image_products_ar')
        {
            $req_width = 1200;
            $req_height = 250;
        }
        else{

            $req_width = 24;
            $req_height = 24;
        }

        return ['width' => $req_width, 'height' => $req_height];
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
        $rules['icon'] = ($this->category || $this->subcategory ? 'sometimes' : 'required') . '|mimes:jpg,png,jpeg,webp';
        $rules['icon_search'] = ($this->category || $this->subcategory ? 'sometimes' : 'required') . '|mimes:jpg,png,jpeg,webp';

        foreach (languages() as $lang)
        {
            $lang_rules=[
                'title_'.$lang->local=> 'required',
                'image_products_'.$lang->local=>($this->category || $this->subcategory ? 'sometimes' : 'required') . '|mimes:jpg,png,jpeg,webp'

            ];
            if (request('image_products_'.$lang->local)) {
                list($width, $height, $type, $attr) = getimagesize(request('image_products_'.$lang->local));

                if ($width != $this->size('image_products_'.$lang->local)['width']) {
                    $rules['width.image_products_'.$lang->local] = 'required';
                }
                if ($height != $this->size('image_products_'.$lang->local)['height']) {
                    $rules['height.image_products_'.$lang->local] = 'required';
                }
            }
            $rules= array_merge($rules, $lang_rules);
        }
        if (request('icon')) {
            list($width, $height, $type, $attr) = getimagesize(request('icon'));

            if ($width != $this->size('icon')['width']) {
                $rules['width.icon'] = 'required';
            }
            if ($height != $this->size('icon')['height']) {
                $rules['height.icon'] = 'required';
            }
        }
        if (request('image')) {
            list($width, $height, $type, $attr) = getimagesize(request('image'));

            if ($width != $this->size('image')['width']) {
                $rules['width.image'] = 'required';
            }
            if ($height != $this->size('image')['height']) {
                $rules['height.image'] = 'required';
            }
        }
        if (request('icon_search')) {
            list($width, $height, $type, $attr) = getimagesize(request('icon_search'));

            if ($width != $this->size('icon_search')['width']) {
                $rules['width.icon_search'] = 'required';
            }
            if ($height != $this->size('icon_search')['height']) {
                $rules['height.icon_search'] = 'required';
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
            'category_id'=>__('categories.category_id'),
            'image'=>__('categories.image'),
            'icon'=>__('categories.icon'),
            'icon_search'=>__('categories.icon_search'),
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
     * Get custom error messages for validation failures.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'width.icon.required' => __('web.icon_width_required', ['width' => $this->size('icon')['width']]),
            'height.icon.required' => __('web.icon_height_required', ['height' => $this->size('icon')['height']]),
            'width.image.required' => __('web.image_width_required', ['width' => $this->size('image')['width']]),
            'height.image.required' => __('web.image_height_required', ['height' => $this->size('image')['height']]),
            'width.icon_search.required' => __('web.icon_search_width_required', ['width' => $this->size('icon_search')['width']]),
            'height.icon_search.required' => __('web.icon_search_height_required', ['height' => $this->size('icon_search')['height']]),

            'width.image_products_en.required' => __('web.image_products_en_width_required', ['width' => $this->size('image_products_en')['width']]),
            'height.image_products_en.required' => __('web.image_products_en_height_required', ['height' => $this->size('image_products_en')['height']]),
            'width.image_products_ar.required' => __('web.image_products_ar_width_required', ['width' => $this->size('image_products_ar')['width']]),
            'height.image_products_ar.required' => __('web.image_products_ar_height_required', ['height' => $this->size('image_products_ar')['height']]),
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
