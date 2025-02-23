<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Řádky pro validaci
    |--------------------------------------------------------------------------
    |
    | Následující řádky obsahují výchozí chybové zprávy pro validátor Laravelu.
    | Některé z těchto pravidel mají více verzí, například pravidla velikosti.
    | Klidně přizpůsobte tyto zprávy podle potřeby.
    |
    */

    'accepted' => 'Pole :attribute musí být přijato.',
    'active_url' => 'Pole :attribute není platná URL adresa.',
    'after' => 'Pole :attribute musí být datum po :date.',
    'after_or_equal' => 'Pole :attribute musí být datum :date nebo pozdější.',
    'alpha' => 'Pole :attribute může obsahovat pouze písmena.',
    'alpha_dash' => 'Pole :attribute může obsahovat pouze písmena, číslice, pomlčky a podtržítka.',
    'alpha_num' => 'Pole :attribute může obsahovat pouze písmena a číslice.',
    'array' => 'Pole :attribute musí být pole.',
    'before' => 'Pole :attribute musí být datum před :date.',
    'before_or_equal' => 'Pole :attribute musí být datum :date nebo dřívější.',
    'between' => [
        'numeric' => 'Pole :attribute musí být mezi :min a :max.',
        'file' => 'Pole :attribute musí mít velikost mezi :min a :max kilobajtů.',
        'string' => 'Pole :attribute musí mít délku mezi :min a :max znaků.',
        'array' => 'Pole :attribute musí mít mezi :min a :max položkami.',
    ],
    'boolean' => 'Pole :attribute musí být pravda nebo nepravda.',
    'confirmed' => 'Potvrzení pole :attribute se neshoduje.',
    'date' => 'Pole :attribute není platné datum.',
    'date_equals' => 'Pole :attribute musí být datum rovno :date.',
    'date_format' => 'Pole :attribute neodpovídá formátu :format.',
    'different' => 'Pole :attribute a :other se musí lišit.',
    'digits' => 'Pole :attribute musí obsahovat :digits číslic.',
    'digits_between' => 'Pole :attribute musí obsahovat mezi :min a :max číslicemi.',
    'dimensions' => 'Pole :attribute má neplatné rozměry obrázku.',
    'distinct' => 'Pole :attribute obsahuje duplicitní hodnotu.',
    'email' => 'Pole :attribute musí být platná emailová adresa.',
    'ends_with' => 'Pole :attribute musí končit jednou z následujících hodnot: :values.',
    'exists' => 'Vybrané pole :attribute je neplatné.',
    'file' => 'Pole :attribute musí být soubor.',
    'filled' => 'Pole :attribute musí být vyplněno.',
    'gt' => [
        'numeric' => 'Pole :attribute musí být větší než :value.',
        'file' => 'Pole :attribute musí mít více než :value kilobajtů.',
        'string' => 'Pole :attribute musí mít více než :value znaků.',
        'array' => 'Pole :attribute musí mít více než :value položek.',
    ],
    'gte' => [
        'numeric' => 'Pole :attribute musí být větší nebo rovno :value.',
        'file' => 'Pole :attribute musí mít alespoň :value kilobajtů.',
        'string' => 'Pole :attribute musí mít alespoň :value znaků.',
        'array' => 'Pole :attribute musí mít alespoň :value položek.',
    ],
    'image' => 'Pole :attribute musí být obrázek.',
    'in' => 'Vybrané pole :attribute je neplatné.',
    'in_array' => 'Pole :attribute neexistuje v :other.',
    'integer' => 'Pole :attribute musí být celé číslo.',
    'ip' => 'Pole :attribute musí být platná IP adresa.',
    'ipv4' => 'Pole :attribute musí být platná IPv4 adresa.',
    'ipv6' => 'Pole :attribute musí být platná IPv6 adresa.',
    'json' => 'Pole :attribute musí být platný JSON řetězec.',
    'lt' => [
        'numeric' => 'Pole :attribute musí být menší než :value.',
        'file' => 'Pole :attribute musí mít méně než :value kilobajtů.',
        'string' => 'Pole :attribute musí mít méně než :value znaků.',
        'array' => 'Pole :attribute musí mít méně než :value položek.',
    ],
    'lte' => [
        'numeric' => 'Pole :attribute musí být menší nebo rovno :value.',
        'file' => 'Pole :attribute musí mít nejvýše :value kilobajtů.',
        'string' => 'Pole :attribute musí mít nejvýše :value znaků.',
        'array' => 'Pole :attribute nesmí mít více než :value položek.',
    ],
    'max' => [
        'numeric' => 'Pole :attribute nesmí být větší než :max.',
        'file' => 'Pole :attribute nesmí mít více než :max kilobajtů.',
        'string' => 'Pole :attribute nesmí mít více než :max znaků.',
        'array' => 'Pole :attribute nesmí mít více než :max položek.',
    ],
    'mimes' => 'Pole :attribute musí být soubor typu: :values.',
    'mimetypes' => 'Pole :attribute musí být soubor typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musí být alespoň :min.',
        'file' => 'Pole :attribute musí mít alespoň :min kilobajtů.',
        'string' => 'Pole :attribute musí mít alespoň :min znaků.',
        'array' => 'Pole :attribute musí mít alespoň :min položek.',
    ],
    'not_in' => 'Vybrané pole :attribute je neplatné.',
    'not_regex' => 'Formát pole :attribute je neplatný.',
    'numeric' => 'Pole :attribute musí být číslo.',
    'password' => 'Heslo je nesprávné.',
    'present' => 'Pole :attribute musí být přítomno.',
    'regex' => 'Formát pole :attribute je neplatný.',
    'required' => 'Pole :attribute je povinné.',
    'required_if' => 'Pole :attribute je povinné, pokud :other je :value.',
    'required_unless' => 'Pole :attribute je povinné, pokud :other není v :values.',
    'required_with' => 'Pole :attribute je povinné, pokud je přítomno :values.',
    'required_with_all' => 'Pole :attribute je povinné, pokud jsou přítomny :values.',
    'required_without' => 'Pole :attribute je povinné, pokud není přítomno :values.',
    'required_without_all' => 'Pole :attribute je povinné, pokud není přítomno žádné z :values.',
    'same' => 'Pole :attribute a :other se musí shodovat.',
    'size' => [
        'numeric' => 'Pole :attribute musí být :size.',
        'file' => 'Pole :attribute musí mít :size kilobajtů.',
        'string' => 'Pole :attribute musí mít :size znaků.',
        'array' => 'Pole :attribute musí obsahovat :size položek.',
    ],
    'starts_with' => 'Pole :attribute musí začínat jednou z následujících hodnot: :values.',
    'string' => 'Pole :attribute musí být řetězec.',
    'timezone' => 'Pole :attribute musí být platná časová zóna.',
    'unique' => 'Pole :attribute již existuje.',
    'uploaded' => 'Nahrání pole :attribute se nezdařilo.',
    'url' => 'Formát pole :attribute je neplatný.',
    'uuid' => 'Pole :attribute musí být platné UUID.',

    /*
    |--------------------------------------------------------------------------
    | Přizpůsobení názvů atributů
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'name' => 'jméno',
        'email' => 'email',
        'password' => 'heslo',
        'password_confirmation' => 'potvrzení hesla',
    ],

];
