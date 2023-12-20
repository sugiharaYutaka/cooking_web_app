<?php

return [

    'accepted' => ':attributeは承認されている必要があります。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeは:date以降の値である必要があります。',
    'after_or_equal' => ':attributeは:date以降の日付である必要があります。',
    'alpha' => ':attributeはアルファベットのみ使用できます。',
    'alpha_dash' => ':attributeはアルファベット、数字、ダッシュ、アンダースコアのみ使用できます。',
    'alpha_num' => ':attributeはアルファベットと数字のみ使用できます。',
    'array' => ':attributeは配列でなければなりません。',
    'before' => ':attributeは:dateより前の日付である必要があります。',
    'before_or_equal' => ':attributeは:date以前の日付であるか、同日である必要があります。',
    'between' => [
        'numeric' => ':attributeは:minから:maxの間でなければなりません。',
        'file' => ':attributeは:min KBから:max KBの間でなければなりません。',
        'string' => ':attributeは:min文字から:max文字の間でなければなりません。',
        'array' => ':attributeは:minから:maxのアイテムを持っていなければなりません。',
    ],
    'boolean' => ':attributeフィールドは true または false でなければなりません。',
    'confirmed' => ':attributeの確認が一致しません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付である必要があります。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'different' => ':attributeと:otherは異なる必要があります。',
    'digits' => ':attributeは:digits桁でなければなりません。',
    'digits_between' => ':attributeは:min桁から:max桁の間でなければなりません。',
    'dimensions' => ':attributeは無効な画像サイズです。',
    'distinct' => ':attributeフィールドには重複した値があります。',
    'email' => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with' => ':attributeは次のいずれかで終わる必要があります: :values。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeフィールドは必須です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file' => ':attributeは:value KBより大きくなければなりません。',
        'string' => ':attributeは:value文字より大きくなければなりません。',
        'array' => ':attributeは:value以上のアイテムを持っていなければなりません。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file' => ':attributeは:value KB以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
        'array' => ':attributeは:value以上のアイテムを持っていなければなりません。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeフィールドは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file' => ':attributeは:value KBより小さくなければなりません。',
        'string' => ':attributeは:value文字より小さくなければなりません。',
        'array' => ':attributeは:value未満のアイテムを持っていなければなりません。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file' => ':attributeは:value KB以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
        'array' => ':attributeは:value以下のアイテムを持っていなければなりません。',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下でなければなりません。',
        'file' => ':attributeは:max KB以下でなければなりません。',
        'string' => ':attributeは:max文字以下でなければなりません。',
        'array' => ':attributeは:max以下のアイテムを持っていなければなりません。',
    ],
    'mimes' => ':attributeは以下のタイプのファイルでなければなりません: :values。',
    'mimetypes' => ':attributeは以下のタイプのファイルでなければなりません: :values。',
    'min' => [
        'numeric' => ':attributeは:min以上でなければなりません。',
        'file' => ':attributeは:min KB以上でなければなりません。',
        'string' => ':attributeは:min文字以上でなければなりません。',
        'array' => ':attributeは:min以上のアイテムを持っていなければなりません。',
    ],
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeの形式は無効です。',
    'numeric' => ':attributeは数値でなければなりません。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeフィールドは存在していなければなりません。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeフィールドは必須です。',
    'required_if' => ':otherが:valueの場合、:attributeフィールドは必須です。',
    'required_unless' => ':otherが:valuesでない限り、:attributeフィールドは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_with_all' => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'required_without_all' => ':valuesがすべて存在しない場合、:attributeフィールドは必須です。',
    'same' => ':attributeと:otherは一致しなければなりません。',
    'size' => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file' => ':attributeは:size KBでなければなりません。',
        'string' => ':attributeは:size文字でなければなりません。',
        'array' => ':attributeには:sizeの項目が必要です。',

    ],
    'starts_with' => ':attributeは以下のいずれかで始まる必要があります: :values。',
    'string' => ':attributeは文字列である必要があります。',
    'timezone' => ':attributeは有効なタイムゾーンである必要があります。',
    'unique' => ':attributeは既に使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeの形式が正しくありません。',
    'uuid' => ':attributeは有効なUUIDである必要があります。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
