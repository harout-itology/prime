<?php

namespace App\Http\Controllers;

use App\Prime;
use App\Message;
use Illuminate\Http\Request;

class PrimeController extends Controller
{

    public function show(int $value)
    {
        if ($value === 1) {
            return response()->json($this->returnError($value));
        }

        for($i = 2; $i <= $value / 2; $i++) {
            if ($value % 2 === 0) {
                return response()->json($this->returnError($value));
            }
        }

        return response()->json(['isPrime'=>'yes']);
    }

    protected function returnError(int $value) : array
    {
        $message = Message::wherein('id',[1,2])->get();

        if(!$this->notPrime($value))
            return ['isPrime' => $message[1]->text];
        return ['isPrime' => $message[0]->text];
    }

    protected function notPrime(int $value) : bool
    {
        $prime = Prime::where('value', $value)->first();

        if(!$prime) {
            $prime = new Prime();
            $prime->value = $value;
        }
        else if($prime->times >= 3){
            return false;
        }
        else{
            $prime->times += 1;
        }

        $prime->save();
        return true;
    }

}
