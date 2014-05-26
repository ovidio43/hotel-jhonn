<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines contain the default error messages used
      | by the validator class. Some of the rules contain multiple versions,
      | such as the size (max, min, between) rules. These versions are used
      | for different input types such as strings and files.
      |
      | These language lines may be easily changed to provide custom error
      | messages in your application. Error messages for custom validation
      | rules may also be added to this file.
      |
     */

    "accepted" => " :attribute debe ser aceptado.",
    "active_url" => " :attribute no es una URL v�lida.",
    "after" => " :attribute debe ser una fecha posterior a :date.",
    "alpha" => " :attribute s�lo puede contener letras.",
    "alpha_dash" => " :attribute s�lo puede contener letras, n�meros y guiones.",
    "alpha_num" => " :attribute s�lo puede contener letras y n�meros.",
    "before" => " :attribute debe ser una fecha anterior a :date.",
    "between" => array(
        "numeric" => " :attribute debe estar entre :min - :max.",
        "file" => " :attribute debe estar entre :min - :max kilobytes.",
        "string" => " :attribute debe estar entre :min - :max caracteres.",
    ),
    "confirmed" => "La :attribute confirmaci�n no coincide.",
    "different" => " :attribute and :other debe ser diferentes.",
    "email" => " formato del :attribute es inv�lido.",
    "exists" => " :attribute seleccionado es inv�lido.",
    "image" => " :attribute debe ser una imagen.",
    "in" => " :attribute seleccionado es inv�lido.",
    "integer" => " :attribute debe ser un entero.",
    "ip" => " :attribute Debe ser una direcci�n IP v�lida.",
    "match" => " formato :attribute es inv�lido.",
    "max" => array(
        "numeric" => " :attribute debe ser menor que :max.",
        "file" => " :attribute debe ser menor que :max kilobytes.",
        "string" => " :attribute debe ser menor que :max caracteres.",
    ),
    "mimes" => " :attribute debe ser un archivo de tipo :values.",
    "min" => array(
        "numeric" => " :attribute debe tener al menos :min.",
        "file" => " :attribute debe tener al menos :min kilobytes.",
        "string" => " :attribute debe tener al menos :min caracteres.",
    ),
    "not_in" => " :attribute seleccionado es inv�lido.",
    "numeric" => " :attribute debe ser un n�mero.",
    "required" => " :attribute es requerido",
    "same" => " :attribute y :other debe coincidir.",
    "size" => array(
        "numeric" => " :attribute must be :size.",
        "file" => " :attribute must be :size kilobyte.",
        "string" => " :attribute must be :size caracteres.",
    ),
    "unique" => " :attribute esta siendo usado.",
    "url" => " formato de :attribute es inv�lido.",
    /*
      |--------------------------------------------------------------------------
      | Custom Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | Here you may specify custom validation messages for attributes using the
      | convention "attribute_rule" to name the lines. This helps keep your
      | custom validation clean and tidy.
      |
      | So, say you want to use a custom validation message when validating that
      | the "email" attribute is unique. Just add "email_unique" to this array
      | with your custom message. The Validator will handle the rest!
      |
     */

//	'custom' => array(),
    'custom' => array(
        'attribute-name' => array(
            'rule-name' => 'custom-message',
        ),
    ),
    /*
      |--------------------------------------------------------------------------
      | Validation Attributes
      |--------------------------------------------------------------------------
      |
      | The following language lines are used to swap attribute place-holders
      | with something more reader friendly such as "E-Mail Address" instead
      | of "email". Your users will thank you.
      |
      | The Validator class will automatically search this array of lines it
      | is attempting to replace the :attribute place-holder in messages.
      | It's pretty slick. We think you'll like it.
      |
     */
    'attributes' => array(),
);
