<?php

namespace trapsnoteWeb\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('contraseña', function($attribute, $value, $parameters, $validator) {
            $password_repeat_field = $parameters[0];
            $data = $validator->getData();
            $password_repeat = $data[$password_repeat_field];

            //Compara las dos contraseña
            return $value == $password_repeat;
        });

        Validator::replacer('contraseña', function($message, $attribute, $rule, $parameters) {
            return str_replace(':field', $parameters[0], $message);
        });

        Validator::extend('mayoria', function($attribute, $value, $parameters, $validator) {
            $mes = $parameters[0];
            $data = $validator->getData();
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

            //Compara las dos contraseña
            return true;
        });
        Validator::replacer('mayoria', function($message, $attribute, $rule, $parameters) {
            return str_replace(':field', $parameters[0], 'Usted NO es mayor de edad');
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
