<?php

namespace App\Lib;

use App\Prime;
use App\Message;

class PrimeLib
{
    public function isPrimeNumber(int $value) : bool
    {
        if ($value === 1) {
            return false;
        }

        for($i = 2; $i <= $value / 2; $i++) {
            if ($value % 2 === 0) {
                return false;
            }
        }

        return true;
    }

    public function isOverChecked(int $value) : bool
    {
        $prime = Prime::where('value', $value)->first();

        if(!$prime) {
            $prime = new Prime();
            $prime->value = $value;
        }
        else if($prime->times >= Message::where('id',2)->value('frequency')){
            return true;
        }
        else{
            $prime->times += 1;
        }

        $prime->save();
        return false;
    }
}
