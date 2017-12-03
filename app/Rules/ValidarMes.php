<?php

namespace trapsnoteWeb\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarMayoria implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
      $mes=$hoy['month'];
        if($mes-$value <0)
          $error=$error+1;

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
