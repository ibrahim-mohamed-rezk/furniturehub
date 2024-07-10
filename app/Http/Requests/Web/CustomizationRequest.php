<?php

namespace App\Http\Requests\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
class CustomizationRequest extends FormRequest
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
            'fullname'=>'required',
            'state'=>'required',
            'phone'=> [
                "required",
                "numeric"
            ],
            'address'=>'required',

            'sizes'=>'nullable|in:false,true',


            'pdf' =>'nullable|mimes:pdf',
            'cost_state'=>'required|in:low,medium,high',
            'receiving_date'=>'required|date',
            
        ];

        $mimes = '|mimes:jpg,png,jpeg,webp';
        $rules['image'] =  'required|image'.$mimes;
        $rules['images.*'] = 'sometimes'.$mimes;

        $rules['dimension'] = 'required';
        $rules['dimensions.*'] = 'sometimes';

        $rules['rooms.0.image_extensions'] = 'sometimes'.$mimes;
        $rules['rooms.0.dimensions_extensions'] = 'sometimes';

        $rules['rooms.*.image_extensions'] = 'sometimes'.$mimes;
        $rules['rooms.*.dimensions_extensions'] = 'sometimes';
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
            'fullname'=>__('web.full_name'),
            'state'=>__('web.state'),
            'phone'=>__('web.phone'),
            'address'=>__('web.address'),
            'image'=>__('web.image_for_room'),
            'dimensions'=>__('web.dimensions'),
            'pdf'=>__('web.upload_PDF'),
            'cost_state'=>__('web.select_cost'),
            'receiving_date'=>__('web.receiving_date'),
            'image_extensions'=>__('web.image_for_room_extensions'),
            'dimensions_extensions'=>__('web.dimensions_for_Room_extensions'),
            'sizes'=>__('web.sizes'),
            '2D_drawing'=>__('web.2D_drawing'),
            '3D_drawing'=>__('web.3D_drawing'),
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
