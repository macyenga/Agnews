<?php

declare(strict_types=1);

return [
    'accepted' => ':Attribute igomba kwemerewe.',
    'accepted_if' => ':Attribute igomba kwemerewe igihe :other ihuye na :value.',
    'active_url' => ':Attribute si adiresi yemewe.',
    'after' => ':Attribute igomba kuba itariki nyuma ya :date.',
    'after_or_equal' => ':Attribute igomba kuba itariki nyuma ya :date cyangwa ihuye nayo.',
    'alpha' => ':Attribute igomba kuba inyuguti gusa.',
    'alpha_dash' => ':Attribute igomba kuba inyuguti, imibare, umurongo muto na underscore gusa.',
    'alpha_num' => ':Attribute igomba kuba inyuguti n’imibare gusa.',
    'array' => ':Attribute igomba kuba urutonde.',
    'ascii' => ':Attribute igomba kuba ibimenyetso bya ASCII gusa.',
    'before' => ':Attribute igomba kuba itariki mbere ya :date.',
    'before_or_equal' => ':Attribute igomba kuba itariki mbere ya :date cyangwa ihuye nayo.',
    'between' => [
        'array' => ':Attribute igomba kuba hagati ya :min na :max ibintu.',
        'file' => ':Attribute igomba kuba hagati ya :min na :max kilobytes.',
        'numeric' => ':Attribute igomba kuba hagati ya :min na :max.',
        'string' => ':Attribute igomba kuba hagati ya :min na :max inyuguti.',
    ],
    'boolean' => 'Ikibuga :attribute gishobora kuba true cyangwa false gusa.',
    'can' => 'Ikibuga :attribute gifite agaciro katemewe.',
    'confirmed' => ':Attribute ntihuye n’ishuri ry’igihe.',
    'current_password' => 'Ijambobanga ni irikosa.',
    'date' => ':Attribute si itariki yemewe.',
    'date_equals' => ':Attribute igomba kuba itariki ihuye na :date.',
    'date_format' => ':Attribute ntihuye n’isura :format.',
    'decimal' => ':Attribute igomba kuba ifite :decimal decimal.',
    'declined' => ':Attribute igomba kuba yaranzwe.',
    'declined_if' => ':Attribute igomba kuba yaranzwe igihe :other ihuye na :value.',
    'different' => ':Attribute na :other bigomba kuba bitandukanye.',
    'digits' => ':Attribute igomba kuba ifite :digits imibare.',
    'digits_between' => ':Attribute igomba kuba hagati ya :min na :max imibare.',
    'dimensions' => 'Ingano y’ishusho :attribute ntiyemewe.',
    'distinct' => 'Ikibuga :attribute gifite agaciro kasubirwaho.',
    'doesnt_end_with' => 'Agaciro :attribute ntigomba kurangira na ibi bintu : :values.',
    'doesnt_start_with' => 'Agaciro :attribute ntigomba gutangirira ku ibi bintu : :values.',
    'email' => ':Attribute igomba kuba email yemewe.',
    'ends_with' => 'Ikibuga :attribute kigomba kurangira na imwe mu byiciro bikurikira: :values',
    'enum' => ':Attribute yatoranyijwe niyo itariyo.',
    'exists' => ':Attribute yatoranyijwe ntibikurikire.',
    'extensions' => 'Ikibuga :attribute kigomba kuba gifite umwe mu ma file extensions akurikira: :values.',
    'file' => ':Attribute igomba kuba file yemewe.',
    'filled' => 'Ikibuga :attribute kigomba kuba gifite agaciro.',
    'gt' => [
        'array' => ':Attribute igomba kuba ifite ibintu birenze :value.',
        'file' => ':Attribute igomba kuba ifite ubunini burenze :value kilobytes.',
        'numeric' => ':Attribute igomba kuba ifite agaciro karenze :value.',
        'string' => ':Attribute igomba kuba ifite inyuguti zirenga :value.',
    ],
    'gte' => [
        'array' => ':Attribute igomba kuba ifite ibintu biri hejuru cyangwa bingana na :value.',
        'file' => ':Attribute igomba kuba ifite ubunini buri hejuru cyangwa bingana na :value kilobytes.',
        'numeric' => ':Attribute igomba kuba ifite agaciro kiri hejuru cyangwa kingana na :value.',
        'string' => ':Attribute igomba kuba ifite inyuguti ziri hejuru cyangwa zingana na :value.',
    ],
    'hex_color' => ':attribute igomba kuba ibara HEX yemewe.',
    'image' => ':Attribute igomba kuba ishusho yemewe.',
    'in' => ':Attribute yatoranyijwe ntibikurikire.',
    'in_array' => 'Ikibuga :attribute ntikirimo mu rutonde :other.',
    'integer' => ':Attribute igomba kuba umubare wuzuye.',
    'ip' => ':Attribute igomba kuba adiresi IP yemewe.',
    'ipv4' => ':Attribute igomba kuba adiresi yemewe ya IPv4.',
    'ipv6' => ':Attribute igomba kuba adiresi yemewe ya IPv6.',
    'json' => 'Ikibuga :attribute kigomba kuba umurongo wa JSON.',
    'lowercase' => 'Ikibuga :attribute kigomba kuba n’amagambo matoya.',
    'lt' => [
        'array' => ':Attribute igomba kuba ifite ibintu biri munsi ya :value.',
        'file' => ':Attribute igomba kuba ifite ubunini buri munsi ya :value kilobytes.',
        'numeric' => ':Attribute igomba kuba ifite agaciro kari munsi ya :value.',
        'string' => ':Attribute igomba kuba ifite inyuguti ziri munsi ya :value.',
    ],
    'lte' => [
        'array' => ':Attribute igomba kuba ifite ibintu biri munsi cyangwa bingana na :value.',
        'file' => ':Attribute igomba kuba ifite ubunini buri munsi cyangwa bingana na :value kilobytes.',
        'numeric' => ':Attribute igomba kuba ifite agaciro kari munsi cyangwa kingana na :value.',
        'string' => ':Attribute igomba kuba ifite inyuguti ziri munsi cyangwa zingana na :value.',
    ],
    'mac_address' => ':Attribute igomba kuba mac adiresi yemewe.',
    'max' => [
        'array' => ':Attribute ntigomba kugira ibintu birenze :max.',
        'file' => ':Attribute ntigomba kugira ubunini burenze :max kilobytes.',
        'numeric' => ':Attribute ntigomba kugira agaciro karenze :max.',
        'string' => ':Attribute ntigomba kugira inyuguti zirenge :max.',
    ],
    'max_digits' => ':Attribute ntigomba kugira imibare irenze :max.',
    'mimes' => 'Ibyiciro byemewe bya file ni: :values.',
    'mimetypes' => 'Ibyiciro byemewe bya file ni: :values.',
    'min' => [
        'array' => ':Attribute ntigomba kugira ibintu bito kurenza :min.',
        'file' => ':Attribute ntigomba kugira ubunini bito kurenza :min kilobytes.',
        'numeric' => ':Attribute ntigomba kugira agaciro gato kurenza :min.',
        'string' => ':Attribute ntigomba kugira inyuguti ziri munsi ya :min.',
    ],
    'min_digits' => ':Attribute igomba kugira imibare nibura :min.',
    'missing' => ':Attribute igomba kuba ishyizweho.',
    'missing_if' => ':Attribute igomba kuba ishyizweho igihe :other ihuye na :value.',
    'missing_unless' => ':Attribute igomba kuba ishyizweho usibye igihe :other ihuye na :value.',
    'missing_with' => ':Attribute igomba kuba ishyizweho igihe :values ifite agaciro.',
    'missing_with_all' => ':Attribute igomba kuba ishyizweho igihe :values ifite agaciro.',
    'multiple_of' => 'Agaciro :attribute kigomba kuba inyongera ya :value.',
    'not_in' => ':Attribute yatoranyijwe ntibikurikire.',
    'not_regex' => 'Isura ya :attribute ntibikurikire.',
    'numeric' => ':Attribute igomba kuba umubare cyangwa umurongo w’imibare.',
    'password' => [
        'letters' => ':Attribute igomba kugira nibura inyuguti imwe.',
        'mixed' => ':Attribute igomba kugira nibura inyuguti nkuru n’inyuguti nto.',
        'numbers' => ':Attribute igomba kugira nibura umubare umwe.',
        'symbols' => ':Attribute igomba kugira nibura ikimenyetso kimwe.',
        'uncompromised' => ':Attribute yatangajwe mu mishinga yo kwinjira mu makuru. Nyamuneka hitamo :attribute itandukanye.',
    ],
    'present' => 'Ikibuga :attribute kigomba kuba kiri mu byoherejwe.',
    'present_if' => 'Ikibuga :attribute kigomba kuba kiri igihe :other ari :value.',
    'present_unless' => 'Ikibuga :attribute kigomba kuba kiri usibye igihe :other ari :value.',
    'present_with' => 'Ikibuga :attribute kigomba kuba kiri igihe :values iriho.',
    'present_with_all' => 'Ikibuga :attribute kigomba kuba kiri igihe :values iriho.',
    'prohibited' => 'Ikibuga :attribute ntikibemererwa.',
    'prohibited_if' => 'Ikibuga :attribute ntikibemererwa igihe :other ari :value.',
    'prohibited_unless' => 'Ikibuga :attribute ntikibemererwa usibye igihe :other iri mu :values.',
    'prohibits' => 'Ikibuga :attribute ntikireka ikibuga :other.',
    'regex' => 'Isura ya :attribute ntibikurikire.',
    'required' => 'Ikibuga :attribute kirakenewe.',
    'required_array_keys' => 'Ikibuga :attribute kigomba kugira imfunguzo ziri: :values.',
    'required_if' => 'Ikibuga :attribute kirakenewe igihe :other ari :value.',
    'required_if_accepted' => 'Ikibuga :attribute kirakenewe igihe :other yemerewe.',
    'required_unless' => 'Ikibuga :attribute kirakenewe usibye igihe :other ari muri :values.',
    'required_with' => 'Ikibuga :attribute kirakenewe igihe :values ifite agaciro.',
    'required_with_all' => 'Ikibuga :attribute kirakenewe igihe :values ifite agaciro.',
    'required_without' => 'Ikibuga :attribute kirakenewe igihe :values itagira agaciro.',
    'required_without_all' => 'Ikibuga :attribute kirakenewe igihe nta kintu muri :values gifite agaciro.',
    'same' => ':Attribute na :other bigomba kuba bihuye.',
    'size' => [
        'array' => ':Attribute igomba kuba ifite ibintu :size.',
        'file' => ':Attribute igomba kuba ifite ubunini bwa :size kilobytes.',
        'numeric' => ':Attribute igomba kuba ifite agaciro ka :size.',
        'string' => ':Attribute igomba kuba ifite inyuguti :size.',
    ],
    'starts_with' => ':Attribute igomba gutangirira ku bintu bikurikira: :values',
    'string' => ':Attribute igomba kuba umurongo w’inyuguti.',
    'timezone' => ':Attribute igomba kuba igihe cyemewe.',
    'ulid' => ':Attribute igomba kuba ULID yemewe.',
    'unique' => ':Attribute yamaze gukoreshwa.',
    'uploaded' => ':Attribute ntishoboye gupakirwa.',
    'uppercase' => 'Ikibuga :attribute kigomba kuba n’amagambo manini.',
    'url' => ':Attribute si isura yemewe.',
    'uuid' => ':Attribute igomba kuba UUID yemewe.',
    'attributes' => [
        'address' => 'Aderesi',
        'affiliate_url' => 'URL y’ubufatanye',
        'age' => 'Imyaka',
        'amount' => 'Umubare',
        'area' => 'Akarere',
        'available' => 'Bihari',
        'birthday' => 'Itariki y’amavuko',
        'body' => 'Umubiri',
        'city' => 'Umujyi',
        'content' => 'Ibikubiye muri',
        'country' => 'Igihugu',
        'created_at' => 'Yakozwe kuwa',
        'creator' => 'Umuremyi',
        'currency' => 'Munyenga',
        'current_password' => 'Ijambobanga ryo ubu',
        'customer' => 'Umukiriya',
        'date' => 'Itariki',
        'date_of_birth' => 'Itariki y’amavuko',
        'day' => 'Umunsi',
        'deleted_at' => 'Yahinduwe kuwa',
        'description' => 'Ibisobanuro',
        'district' => 'Akarere',
        'duration' => 'Igihe',
        'email' => 'Imeyili',
        'excerpt' => 'Gufata',
        'filter' => 'Guhitamo',
        'first_name' => 'Izina rya mbere',
        'gender' => 'Igitsina',
        'group' => 'Itsinda',
        'hour' => 'Isaha',
        'image' => 'Ifoto',
        'is_subscribed' => 'Yiyandikishije',
        'items' => 'Ibintu',
        'last_name' => 'Izina rya nyuma',
        'lesson' => 'Isomo',
        'line_address_1' => 'Aderesi 1',
        'line_address_2' => 'Aderesi 2',
        'message' => 'Ubutumwa',
        'middle_name' => 'Izina hagati',
        'minute' => 'Igihembwe',
        'mobile' => 'Numero y’akagari',
        'month' => 'Ukwezi',
        'name' => 'Izina',
        'national_code' => 'Kode y’igihugu',
        'number' => 'Numero',
        'password' => 'Ijambobanga',
        'password_confirmation' => 'Kwemeza ijambobanga',
        'phone' => 'Numero y’itumanaho',
        'photo' => 'Ifoto',
        'postal_code' => 'Kode y’iposita',
        'preview' => 'Gusubiramo',
        'price' => 'Igiciro',
        'product_id' => 'ID y’ibicuruzwa',
        'product_uid' => 'UID y’ibicuruzwa',
        'product_uuid' => 'UUID y’ibicuruzwa',
        'promo_code' => 'Kode y’igurisha',
        'province' => 'Intara',
        'quantity' => 'Umunota',
        'recaptcha_response_field' => 'Ikibuga cy’inyuma ya reCAPTCHA',
        'remember' => 'Kwibuka',
        'restored_at' => 'Yongeweho kuwa',
        'result_text_under_image' => 'Ibaruwa y’inyuma y’ishusho',
        'role' => 'Umwanya',
        'second' => 'Akarere',
        'sex' => 'Igitsina',
        'shipment' => 'Itumanaho',
        'short_text' => 'Ubutumwa bugufi',
        'size' => 'Ingano',
        'state' => 'Intara',
        'street' => 'Umuhanda',
        'student' => 'Umwigishwa',
        'subject' => 'Inyandiko',
        'teacher' => 'Mwigisha',
        'terms' => 'Amategeko',
        'test_description' => 'Ibisobanuro by’igerageza',
        'test_locale' => 'Akarere k’igerageza',
        'test_name' => 'Izina ry’igerageza',
        'text' => 'Ubutumwa',
        'time' => 'Igihe',
        'title' => 'Umutwe',
        'updated_at' => 'Yavuguruwe kuwa',
        'user' => 'Umukoresha',
        'username' => 'Izina ry’umukoresha',
        'year' => 'Umwaka',
    ],
];
