<?php

namespace App\Http\Controllers;

use App\Prime;
use App\Message;
use Illuminate\Http\Request;

class PrimeController extends Controller
{

    public function showRange(int $from, int $to)
    {
        $primeList = [];

        for($i=$from; $i<=$to; $i++){
            if($this->isPrimeNumber($i))
            {
                $primeList[] = $i;
            }
        }

        return response()->json(['message'=>$primeList]);

    }

    public function show(int $value)
    {
        if($this->isPrimeNumber($value)) {
            return response()->json(['message'=>'Yes your number is a prime number']);
        }

        $message = Message::wherein('id',[1,2])->get();
        $index = $this->isOverChecked($value) ? 1 : 0;
        return response()->json(['message' => $message[$index]->text]);
    }

    protected function isPrimeNumber(int $value) : bool
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

    protected function isOverChecked(int $value) : bool
    {
        $prime = Prime::where('value', $value)->first();

        if(!$prime) {
            $prime = new Prime();
            $prime->value = $value;
        }
        else if($prime->times >= 3){
            return true;
        }
        else{
            $prime->times += 1;
        }

        $prime->save();
        return false;
    }

}
