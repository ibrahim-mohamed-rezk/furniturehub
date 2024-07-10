<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute لا بد أن يكون.',
    'active_url' => ':attribute ليس رابط صالح.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute must be a date after or equal to :date.',
    'alpha' => ':attribute may only contain letters.',
    'alpha_dash' => ':attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':attribute may only contain letters and numbers.',
    'array' => ':attribute must be an array.',
    'before' => ':attribute يجب أن يكون تاريخ قبل :date.',
    'before_or_equal' => ':attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute must be between :min and :max.',
        'file' => ':attribute must be between :min and :max kilobytes.',
        'string' => ':attribute must be between :min and :max characters.',
        'array' => ':attribute must have between :min and :max items.',
    ],
    'boolean' => ':attribute field must be true or false.',
    'confirmed' => ':attribute غير متطابقة.',
    'date' => ':attribute ليس تاريخ صالح.',
    'date_equals' => ':attribute must be a date equal to :date.',
    'date_format' => ':attribute does not match the format :format.',
    'different' => ':attribute and :other must be different.',
    'digits' => ':attribute must be :digits digits.',
    'digits_between' => ':attribute لا بد أن يكون بين :min إلى :max رقم.',
    'dimensions' => ':attribute has invalid image dimensions.',
    'distinct' => ':attribute field has a duplicate value.',
    'email' => ':attribute لا بد أن يكون صيغة بريد إلكتروني.',
    'ends_with' => ':attribute must end with one of the following: :values.',
    'exists' => ':attribute غير صالح.',
    'file' => ':attribute لا بد أن يكون ملف.',
    'filled' => ':attribute لا بد أن يكون له قيمة.',
    'gt' => [
        'numeric' => ':attribute must be greater than :value.',
        'file' => ':attribute must be greater than :value kilobytes.',
        'string' => ':attribute must be greater than :value characters.',
        'array' => ':attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute must be greater than or equal :value.',
        'file' => ':attribute must be greater than or equal :value kilobytes.',
        'string' => ':attribute must be greater than or equal :value characters.',
        'array' => ':attribute must have :value items or more.',
    ],
    'image' => ':attribute لا بد أن تكون صورة.',
    'in' => ':attribute غير صالح.',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => ':attribute لا بد أن يكون رقمي.',
    'ip' => ':attribute لا بد أن يكون عنوان Ip صالح.',
    'ipv4' => ':attribute لا بد أن يكون عنوان IPv4 صالح.',
    'ipv6' => ':attribute لا بد أن يكون عنوان IPv6 صالح.',
    'json' => ':attribute  لا بد أن يكون نص JSON.',
    'lt' => [
        'numeric' => ':attribute must be less than :value.',
        'file' => ':attribute must be less than :value kilobytes.',
        'string' => ':attribute must be less than :value characters.',
        'array' => ':attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute must be less than or equal :value.',
        'file' => ':attribute must be less than or equal :value kilobytes.',
        'string' => ':attribute must be less than or equal :value characters.',
        'array' => ':attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute may not be greater than :max.',
        'file' => ':attribute may not be greater than :max kilobytes.',
        'string' => ':attribute لا يمكن ان يكون اكبر من :max حرف.',
        'array' => ':attribute may not have more than :max items.',
    ],
    'mimes' => ':attribute لا بد أن يكون ملف من نوع: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute أقل عدد حروف :min.',
        'file' => ':attribute must be at least :min kilobytes.',
        'string' => ':attribute لا يقل عن عدد :min أحرف.',
        'array' => ':attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute لا بد أن يكون رقمي.',
    'password' => 'password غير صحيح.',
    'present' => ':attribute field must be present.',
    'regex' => ':attribute صيغة غير صحيحة.',
    'required' => ':attribute مطلوب.',
    'required_if' => ':attribute مطلوب عندما يكون :other له :value.',
    'required_unless' => ':attribute field is required unless :other is in :values.',
    'required_with' => ':attribute field is required when :values is present.',
    'required_with_all' => ':attribute field is required when :values are present.',
    'required_without' => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same' => ':attribute and :other must match.',
    'size' => [
        'numeric' => ':attribute must be :size.',
        'file' => ':attribute must be :size kilobytes.',
        'string' => ':attribute must be :size characters.',
        'array' => ':attribute must contain :size items.',
    ],
    'starts_with' => ':attribute must start with one of the following: :values.',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid zone.',
    'unique' => ':attribute تم أخذه بالفعل مسبقاً.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute صيغة رابط غير صالحة.',
    'uuid' => ':attribute must be a valid UUID.',



    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
