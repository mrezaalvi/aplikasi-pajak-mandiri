<?php
    namespace App\Traits;
    
    use Illuminate\Support\Str;

    trait HasLocaleCurrency{
        public function setIntCurrencyFormat($value):float
        {
            if(!$value)
                $value = 0.00;
            if(!is_numeric($value))
                $value = floatval(Str::replace(',','.',Str::replace('.','',$value)));
            return $value;
        } 

        public function setLocaleCurrencyFormat($value, $decimals=2): string
        {
            $decimalsSep = ',';
            $thousandsSep = '.';

            return number_format($value, $decimals, $decimalsSep, $thousandsSep);
        }
    }