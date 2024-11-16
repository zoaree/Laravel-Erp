<?php

return [
    'accepted' => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL olmalıdır.',
    'after' => ':attribute, :date tarihinden sonra olmalıdır.',
    'after_or_equal' => ':attribute, :date tarihinden sonra veya ona eşit olmalıdır.',
    'alpha' => ':attribute yalnızca harf içerebilir.',
    'alpha_dash' => ':attribute yalnızca harf, rakam ve tire içerebilir.',
    'alpha_num' => ':attribute yalnızca harf ve rakam içerebilir.',
    'array' => ':attribute bir dizi olmalıdır.',
    'before' => ':attribute, :date tarihinden önce olmalıdır.',
    'before_or_equal' => ':attribute, :date tarihinden önce veya ona eşit olmalıdır.',

    'between' => [
        'numeric' => ':attribute :min ile :max arasında olmalıdır.',
        'file' => ':attribute :min ile :max kilobayt arasında olmalıdır.',
        'string' => ':attribute :min ile :max karakter arasında olmalıdır.',
        'array' => ':attribute :min ile :max öğe arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı doğru ya da yanlış olmalıdır.',
    'confirmed' => ':attribute onaylaması eşleşmiyor.',
    'date' => ':attribute geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute, :date tarihine eşit olmalıdır.',
    'date_format' => ':attribute, :format formatına uymalıdır.',
    'different' => ':attribute ve :other farklı olmalıdır.',
    'digits' => ':attribute :digits basamaktan oluşmalıdır.',
    'digits_between' => ':attribute :min ile :max basamak arasında olmalıdır.',
    'dimensions' => ':attribute geçersiz resim boyutlarına sahip.',
    'distinct' => ':attribute alanında tekrarlayan bir değer var.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'exists' => 'Seçilen :attribute geçerli değil.',
    'file' => ':attribute bir dosya olmalıdır.',
    'filled' => ':attribute alanı dolu olmalıdır.',
    'gt' => [
        'numeric' => ':attribute :value değerinden büyük olmalıdır.',
        'file' => ':attribute :value kilobayttan büyük olmalıdır.',
        'string' => ':attribute :value karakterden uzun olmalıdır.',
        'array' => ':attribute :value öğeden fazla olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute :value değerine eşit veya ondan büyük olmalıdır.',
        'file' => ':attribute :value kilobayta eşit veya ondan büyük olmalıdır.',
        'string' => ':attribute :value karaktere eşit veya ondan uzun olmalıdır.',
        'array' => ':attribute :value öğeden fazla veya eşit olmalıdır.',
    ],
    'in' => 'Seçilen :attribute geçerli değil.',
    'in_array' => ':attribute, :other içinde mevcut değil.',
    'integer' => ':attribute bir tam sayı olmalıdır.',
    'ip' => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute geçerli bir JSON formatında olmalıdır.',
    'lt' => [
        'numeric' => ':attribute :value değerinden küçük olmalıdır.',
        'file' => ':attribute :value kilobayttan küçük olmalıdır.',
        'string' => ':attribute :value karakterden kısa olmalıdır.',
        'array' => ':attribute :value öğeden az olmalıdır.',
    ],
    'lte' => [
        'numeric' => ':attribute :value değerine eşit veya ondan küçük olmalıdır.',
        'file' => ':attribute :value kilobayta eşit veya ondan küçük olmalıdır.',
        'string' => ':attribute :value karaktere eşit veya ondan kısa olmalıdır.',
        'array' => ':attribute :value öğeden fazla olmamalıdır.',
    ],
    'max' => [
        'numeric' => ':attribute en fazla :max olmalıdır.',
        'file' => ':attribute en fazla :max kilobayt olabilir.',
        'string' => ':attribute en fazla :max karakter uzunluğunda olabilir.',
        'array' => ':attribute en fazla :max öğe içerebilir.',
    ],
    'mimes' => 'Dosya yalnızca :values türlerinde dosyalar olmalıdır.',
    'mimetypes' => ':attribute yalnızca :values türlerinde dosyalar olmalıdır.',
    'min' => [
        'numeric' => ':attribute en az :min olmalıdır.',
        'file' => ':attribute en az :min kilobayt olmalıdır.',
        'string' => ':attribute en az :min karakter uzunluğunda olmalıdır.',
        'array' => ':attribute en az :min öğe içermelidir.',
    ],
    'not_in' => 'Seçilen :attribute geçerli değil.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'present' => ':attribute alanı mevcut olmalıdır.',
    'regex' => ':attribute formatı geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_if' => ':attribute alanı :other :value olduğunda gereklidir.',
    'required_unless' => ':attribute alanı :other :values içinde olmadıkça gereklidir.',
    'required_with' => ':attribute alanı :values mevcut olduğunda gereklidir.',
    'required_with_all' => ':attribute alanı :values mevcut olduğunda gereklidir.',
    'required_without' => ':attribute alanı :values mevcut olmadığında gereklidir.',
    'required_without_all' => ':attribute alanı :values hiçbiri mevcut olmadığında gereklidir.',
    'same' => ':attribute ve :other eşleşmelidir.',
    'size' => [
        'numeric' => ':attribute :size olmalıdır.',
        'file' => ':attribute :size kilobayt olmalıdır.',
        'string' => ':attribute :size karakter uzunluğunda olmalıdır.',
        'array' => ':attribute :size öğe içermelidir.',
    ],
    'string' => ':attribute bir metin olmalıdır.',
    'timezone' => ':attribute geçerli bir zaman dilimi olmalıdır.',
    'unique' => ':attribute daha önce alınmış.',
    'uploaded' => ':attribute yüklenemedi.',
    'url' => ':attribute geçerli bir URL formatında olmalıdır.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',
];
