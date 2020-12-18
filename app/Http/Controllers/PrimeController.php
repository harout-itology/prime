<?php

namespace App\Http\Controllers;

use App\Message;
use App\Lib\PrimeLib;


class PrimeController extends Controller
{
    protected $primeLib;

    public function __construct(PrimeLib $primeLib)
    {
        $this->primeLib = $primeLib;
    }

    public function showRange(int $from, int $to)
    {
        $primeList = [];

        for($i=$from; $i<=$to; $i++){
            if($this->primeLib->isPrimeNumber($i))
            {
                $primeList[] = $i;
            }
        }

        return response()->json(['message'=>$primeList]);

    }

    public function show(int $value)
    {
        if($this->primeLib->isPrimeNumber($value)) {
            return response()->json(['message'=>'Yes your number is a prime number']);
        }

        $message = Message::wherein('id',[1,2])->get();
        $index = $this->primeLib->isOverChecked($value) ?? 0;
        return response()->json(['message' => $message[$index]->text]);
    }



}
