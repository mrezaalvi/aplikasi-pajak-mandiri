<?php 
    namespace App\Traits;

    class CalcTax{
        public function setCurrencyValue($value):float
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

            return number_format($value, $desimals, $decimalSep,);
        }

        
    }
    