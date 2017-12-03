<?php

namespace trapsnoteWeb\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarMayoria implements Rule
{
public $mes;
public $dia;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($month,$day)
    {
 $mes=$month;
 $dia=$day;
    }

    /**
     * Determine if the validation rule passes.
     *
     *@param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */


    public function passes($attribute, $value){
      $hoy=getdate();
      $error=0;
      $año=$hoy['year'];
        if($año-$value >18)
          $error=$error+1;
          if($año-$value ==18){
            if($mes-$hoy['mon']<0)
              $error=$error+1;
          }
        if ($error == 0 ){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Usted No es mayor de edad';
    }
}
