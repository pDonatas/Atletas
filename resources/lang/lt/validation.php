<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute privalo būti patvirtintas.',
    'active_url' => ':attribute nėra teisinga nuoroda.',
    'after' => ':attribute privalo būti data po :date.',
    'after_or_equal' => ':attribute privalo būti data nuo :date.',
    'alpha' => ':attribute privalo būti tik raidės.',
    'alpha_dash' => ':attribute gali turėti tik skaičius, raides, brūkšnius.',
    'alpha_num' => ':attribute gali turėti tik raides ir skaičius.',
    'array' => ':attribute privalo būti masyvas.',
    'before' => ':attribute privalo būti data prieš :date.',
    'before_or_equal' => ':attribute privalo būti data iki :date.',
    'between' => [
        'numeric' => ':attribute privalo būti tarp :min ir :max.',
        'file' => ':attribute privalo būti nuo :min iki :max kb.',
        'string' => ':attribute privalo būti nuo :min iki :max simbolių.',
        'array' => ':attribute privalo būti nuo :min iki :max pasirinkimų.',
    ],
    'boolean' => ':attribute privalo būti tiesa arba melas.',
    'confirmed' => ':attribute patvirtinimas netinkamas.',
    'date' => ':attribute nėra teisinga data.',
    'date_equals' => ':attribute privalo būti lygu :date.',
    'date_format' => ':attribute netinkamo formato (:format).',
    'different' => ':attribute ir :other privalo skirtis.',
    'digits' => ':attribute privalo būti :digits ilgio.',
    'digits_between' => ':attribute privalo būti tarp :min ir :max skaitmenų.',
    'dimensions' => ':attribute netinkamas dydis.',
    'distinct' => ':attribute laukas turi kopijuotą tekstą.',
    'email' => ':attribute privalo būti tinkamas el. pašto adresas.',
    'ends_with' => ':attribute privalo baigtis vienu iš šių variantų: :values.',
    'exists' => 'pasirinktas :attribute yra netinkamas.',
    'file' => ':attribute privalo būti failas.',
    'filled' => ':attribute privalo būti įrašytas.',
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
    'image' => ':attribute must be an image.',
    'in' => 'selected :attribute is invalid.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer' => ':attribute must be an integer.',
    'ip' => ':attribute must be a valid IP address.',
    'ipv4' => ':attribute must be a valid IPv4 address.',
    'ipv6' => ':attribute must be a valid IPv6 address.',
    'json' => ':attribute must be a valid JSON string.',
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
        'string' => ':attribute may not be greater than :max characters.',
        'array' => ':attribute may not have more than :max items.',
    ],
    'mimes' => ':attribute must be a file of type: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute privalo būti bent :min.',
        'file' => ':attribute privalo būti bent :min kb.',
        'string' => ':attribute privalo būti bent :min simbolių ilgio.',
        'array' => ':attribute privalo turėti bent :min pasirinkimų.',
    ],
    'not_in' => 'selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute must be a number.',
    'password' => 'password is incorrect.',
    'present' => ':attribute field must be present.',
    'regex' => ':attribute format is invalid.',
    'required' => 'Laukas :attribute privalomas.',
    'required_if' => ':attribute field is required when :other is :value.',
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
    'starts_with' => ':attribute must start with one of following: :values.',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid zone.',
    'unique' => ':attribute has already been taken.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute format is invalid.',
    'uuid' => ':attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'submit' => 'Patvirtinti'
];
