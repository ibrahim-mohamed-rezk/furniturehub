<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ProductRequest extends FormRequest
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
            'count' => 'required|numeric',
            'cost' => 'required|numeric',
            'cost_discount' => 'nullable|numeric',
            'seller_id' => 'nullable|exists:sellers,id',
            'category_id' => 'required|exists:categories,id',
            'sku_code'=>(isset($this->product) ? 'sometimes' : 'required|unique:products,sku_code'),
            'page_offer'=>'required'


        ];
        $mimes = '|mimes:jpg,png,jpeg,webp';
        $rules['image'] = (isset($this->product) ? 'sometimes' : 'required') .'|max:500'.$mimes;
        $rules['tags.*.image'] = (isset($this->product) ? 'sometimes' : 'sometimes') .'|max:500'.$mimes;
        $rules['images.*.image'] = (isset($this->product) ? 'sometimes' : 'required') .'|max:500'.$mimes;
        if(request('image'))
        {
            list($width, $height, $type, $attr) = getimagesize(request('image'));

            $req_width =  [1024,1500];
            $req_height = [682,1500];
            if(!in_array($width,$req_width))
            {
                $rules['width'] = 'required';
            }
            if(!in_array($height,$req_height))
            {
                $rules['height'] = 'required';
            }
        }
        if(request('images'))
        {
            foreach (request('images') as $image)
            {
                if(isset($image['image']))
                {
                    list($width, $height, $type, $attr) = getimagesize($image['image']);

                    $req_width =  [1024,1500];
                    $req_height = [682,1500];
                    if(!in_array($width,$req_width))
                    {
                        $rules['width'] = 'required';
                    }
                    if(!in_array($height,$req_height))
                    {
                        $rules['height'] = 'required';
                    }
                }
            }
        }

        foreach (languages() as $lang)
        {
            $lang_rules=[
                'items.*.name_'.$lang->local=> 'required',
                'points.*.key_'.$lang->local=> 'required',
                'points.*.value_'.$lang->local=> 'required',
                'sections.*.key_'.$lang->local=> 'required',
                'sections.*.value_'.$lang->local=> 'required',
                'tags.*.name_'.$lang->local=> 'required',
                'tags.*.description_'.$lang->local=> 'required',
                'name_'.$lang->local=> 'required',
                'slug_'.$lang->local=> 'nullable',
                'keywords_'.$lang->local=> 'required',
                'description_'.$lang->local=> 'required',
                'meta_description_'.$lang->local=> 'required',
                'material_'.$lang->local=> 'required',
                'dimensions_'.$lang->local=> 'required',
                'color_'.$lang->local=> 'required',
                'delivery_'.$lang->local=> 'required',
                'made_in_'.$lang->local=> 'required',
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
            'image' => __('products.image'),
            'count' => __('products.count'),
            'cost' => __('products.cost'),
            'seller_id'=> __('products.seller_id'),
            'category_id'=> __('products.country_id'),
            'sku_code'=> __('products.sku_code'),
            'page_offer'=> __('products.page_offer'),
            'cost_discount'=> __('products.cost_discount'),

        ];
        foreach (languages() as $lang)
        {
            $lang_attributes=[
                'title_'.$lang->local => __('products.title').' '.$lang->local,
                'user_'.$lang->local => __('products.user').' '.$lang->local,
                'slug_'.$lang->local => __('products.slug').' '.$lang->local,
                'meta_description_'.$lang->local => __('products.meta_description').' '.$lang->local,
                'description_'.$lang->local => __('products.description').' '.$lang->local,
                'keywords_'.$lang->local => __('products.keywords').' '.$lang->local,
                'material_'.$lang->local => __('products.material').' '.$lang->local,
                'dimensions_'.$lang->local => __('products.dimensions').' '.$lang->local,
                'color_'.$lang->local => __('products.color').' '.$lang->local,
                'delivery_'.$lang->local => __('products.delivery').' '.$lang->local,
                'made_in_'.$lang->local => __('products.made_in').' '.$lang->local,
            ];
            $attributes= array_merge($attributes, $lang_attributes);
        }

        $images = request('images');
        if($images)
        {
            foreach ($images as $key => $value)
            {
                $serial = ($key + 1);
                $lang_attributes=[
                    'images.'.$key.'.image' => __('products.image').' '.$serial,
                ];
                $attributes= array_merge($attributes, $lang_attributes);

            }

        }

        $items = request('items');
        if($items)
        {
            foreach ($items as $key => $value)
            {
                $serial = ($key + 1);
                foreach (languages() as $lang)
                {
                    $lang_attributes = [
                        'items.'.$key.'.name_'.$lang->local => __('products.name').' '.$serial.' '.$lang->local,
                    ];
                    $attributes = array_merge($attributes, $lang_attributes);
                }
            }
        }

        $points = request('points');
        if($points)
        {
            foreach ($points as $key => $value)
            {
                $serial = ($key + 1);
                foreach (languages() as $lang)
                {
                    $lang_attributes = [
                        'points.'.$key.'.key_'.$lang->local => __('products.key').' '.$serial.' '.$lang->local,
                        'points.'.$key.'.value_'.$lang->local => __('products.value').' '.$serial.' '.$lang->local,
                    ];
                    $attributes = array_merge($attributes, $lang_attributes);
                }
            }
        }

        $sections = request('sections');
        if($sections)
        {
            foreach ($sections as $key => $value)
            {
                $serial = ($key + 1);
                foreach (languages() as $lang)
                {
                    $lang_attributes = [
                        'sections.'.$key.'.key_'.$lang->local => __('products.key').' '.$serial.' '.$lang->local,
                        'sections.'.$key.'.value_'.$lang->local => __('products.value').' '.$serial.' '.$lang->local,
                    ];
                    $attributes = array_merge($attributes, $lang_attributes);
                }
            }
        }

        $tags = request('tags');
        if($tags)
        {
            foreach ($tags as $key => $value)
            {
                $serial = ($key + 1);
                $lang_attributes = [
                    'tags.'.$key.'.image' => __('products.image').' '.$serial,
                ];
                $attributes = array_merge($attributes, $lang_attributes);
                foreach (languages() as $lang)
                {
                    $lang_attributes = [
                        'tags.'.$key.'.name_'.$lang->local => __('products.name').' '.$serial.' '.$lang->local,
                        'tags.'.$key.'.description_'.$lang->local => __('products.description').' '.$serial.' '.$lang->local,
                    ];
                    $attributes = array_merge($attributes, $lang_attributes);
                }
            }
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
