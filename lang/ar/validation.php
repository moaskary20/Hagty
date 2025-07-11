<?php

return [
    'validation' => [
        'accepted' => 'يجب قبول :attribute.',
        'accepted_if' => 'يجب قبول :attribute عندما يكون :other هو :value.',
        'active_url' => ':attribute ليس عنوان URL صالحًا.',
        'after' => 'يجب أن يكون :attribute تاريخًا بعد :date.',
        'after_or_equal' => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date.',
        'alpha' => 'يجب أن يحتوي :attribute على أحرف فقط.',
        'alpha_dash' => 'يجب أن يحتوي :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
        'alpha_num' => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط.',
        'array' => 'يجب أن يكون :attribute مصفوفة.',
        'ascii' => 'يجب أن يحتوي :attribute على أحرف أبجدية رقمية أحادية البايت ورموز فقط.',
        'before' => 'يجب أن يكون :attribute تاريخًا قبل :date.',
        'before_or_equal' => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date.',
        'between' => [
            'array' => 'يجب أن يحتوي :attribute على عناصر بين :min و :max.',
            'file' => 'يجب أن يكون :attribute بين :min و :max كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
            'string' => 'يجب أن يكون :attribute بين :min و :max أحرف.',
        ],
        'boolean' => 'يجب أن يكون حقل :attribute صحيح أو خطأ.',
        'confirmed' => 'تأكيد :attribute غير متطابق.',
        'current_password' => 'كلمة المرور غير صحيحة.',
        'date' => ':attribute ليس تاريخًا صالحًا.',
        'date_equals' => 'يجب أن يكون :attribute تاريخًا يساوي :date.',
        'date_format' => ':attribute لا يطابق التنسيق :format.',
        'decimal' => 'يجب أن يحتوي :attribute على :decimal منازل عشرية.',
        'declined' => 'يجب رفض :attribute.',
        'declined_if' => 'يجب رفض :attribute عندما يكون :other هو :value.',
        'different' => 'يجب أن يكون :attribute و :other مختلفين.',
        'digits' => 'يجب أن يكون :attribute :digits أرقام.',
        'digits_between' => 'يجب أن يكون :attribute بين :min و :max أرقام.',
        'dimensions' => ':attribute له أبعاد صورة غير صالحة.',
        'distinct' => 'حقل :attribute له قيمة مكررة.',
        'doesnt_end_with' => 'يجب ألا ينتهي :attribute بأحد القيم التالية: :values.',
        'doesnt_start_with' => 'يجب ألا يبدأ :attribute بأحد القيم التالية: :values.',
        'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح.',
        'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
        'enum' => ':attribute المحدد غير صالح.',
        'exists' => ':attribute المحدد غير صالح.',
        'file' => 'يجب أن يكون :attribute ملفًا.',
        'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
        'gt' => [
            'array' => 'يجب أن يحتوي :attribute على أكثر من :value عنصر.',
            'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
            'string' => 'يجب أن يكون :attribute أكبر من :value أحرف.',
        ],
        'gte' => [
            'array' => 'يجب أن يحتوي :attribute على :value عنصر أو أكثر.',
            'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
            'string' => 'يجب أن يكون :attribute أكبر من أو يساوي :value أحرف.',
        ],
        'image' => 'يجب أن يكون :attribute صورة.',
        'in' => ':attribute المحدد غير صالح.',
        'in_array' => 'حقل :attribute غير موجود في :other.',
        'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
        'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا.',
        'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
        'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
        'json' => 'يجب أن يكون :attribute نص JSON صالحًا.',
        'lowercase' => 'يجب أن يكون :attribute بأحرف صغيرة.',
        'lt' => [
            'array' => 'يجب أن يحتوي :attribute على أقل من :value عنصر.',
            'file' => 'يجب أن يكون :attribute أقل من :value كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute أقل من :value.',
            'string' => 'يجب أن يكون :attribute أقل من :value أحرف.',
        ],
        'lte' => [
            'array' => 'يجب ألا يحتوي :attribute على أكثر من :value عنصر.',
            'file' => 'يجب أن يكون :attribute أقل من أو يساوي :value كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value.',
            'string' => 'يجب أن يكون :attribute أقل من أو يساوي :value أحرف.',
        ],
        'mac_address' => 'يجب أن يكون :attribute عنوان MAC صالحًا.',
        'max' => [
            'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عنصر.',
            'file' => 'يجب ألا يكون :attribute أكبر من :max كيلوبايت.',
            'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
            'string' => 'يجب ألا يكون :attribute أكبر من :max أحرف.',
        ],
        'max_digits' => 'يجب ألا يحتوي :attribute على أكثر من :max رقم.',
        'mimes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
        'mimetypes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
        'min' => [
            'array' => 'يجب أن يحتوي :attribute على الأقل على :min عنصر.',
            'file' => 'يجب أن يكون :attribute على الأقل :min كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
            'string' => 'يجب أن يكون :attribute على الأقل :min أحرف.',
        ],
        'min_digits' => 'يجب أن يحتوي :attribute على الأقل على :min أرقام.',
        'missing' => 'يجب أن يكون حقل :attribute مفقودًا.',
        'missing_if' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :other هو :value.',
        'missing_unless' => 'يجب أن يكون حقل :attribute مفقودًا إلا إذا كان :other هو :value.',
        'missing_with' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :values موجودًا.',
        'missing_with_all' => 'يجب أن يكون حقل :attribute مفقودًا عندما تكون :values موجودة.',
        'multiple_of' => 'يجب أن يكون :attribute مضاعفًا لـ :value.',
        'not_in' => ':attribute المحدد غير صالح.',
        'not_regex' => 'تنسيق :attribute غير صالح.',
        'numeric' => 'يجب أن يكون :attribute رقمًا.',
        'password' => [
            'letters' => 'يجب أن يحتوي :attribute على حرف واحد على الأقل.',
            'mixed' => 'يجب أن يحتوي :attribute على حرف كبير وحرف صغير واحد على الأقل.',
            'numbers' => 'يجب أن يحتوي :attribute على رقم واحد على الأقل.',
            'symbols' => 'يجب أن يحتوي :attribute على رمز واحد على الأقل.',
            'uncompromised' => ':attribute المعطى ظهر في تسريب بيانات. يرجى اختيار :attribute مختلف.',
        ],
        'present' => 'يجب أن يكون حقل :attribute موجودًا.',
        'prohibited' => 'حقل :attribute محظور.',
        'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
        'prohibited_unless' => 'حقل :attribute محظور إلا إذا كان :other في :values.',
        'prohibits' => 'حقل :attribute يمنع وجود :other.',
        'regex' => 'تنسيق :attribute غير صالح.',
        'required' => 'حقل :attribute مطلوب.',
        'required_array_keys' => 'يجب أن يحتوي حقل :attribute على إدخالات لـ: :values.',
        'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
        'required_if_accepted' => 'حقل :attribute مطلوب عندما يتم قبول :other.',
        'required_unless' => 'حقل :attribute مطلوب إلا إذا كان :other في :values.',
        'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
        'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
        'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
        'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
        'same' => 'يجب أن يطابق :attribute و :other.',
        'size' => [
            'array' => 'يجب أن يحتوي :attribute على :size عنصر.',
            'file' => 'يجب أن يكون :attribute :size كيلوبايت.',
            'numeric' => 'يجب أن يكون :attribute :size.',
            'string' => 'يجب أن يكون :attribute :size أحرف.',
        ],
        'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
        'string' => 'يجب أن يكون :attribute نصًا.',
        'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة.',
        'unique' => 'تم أخذ :attribute بالفعل.',
        'uploaded' => 'فشل في تحميل :attribute.',
        'uppercase' => 'يجب أن يكون :attribute بأحرف كبيرة.',
        'url' => 'يجب أن يكون :attribute عنوان URL صالحًا.',
        'ulid' => 'يجب أن يكون :attribute ULID صالحًا.',
        'uuid' => 'يجب أن يكون :attribute UUID صالحًا.',
    ],
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],
    'attributes' => [
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'created_at' => 'تاريخ الإنشاء',
        'updated_at' => 'تاريخ التحديث',
    ],
];
