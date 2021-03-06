<?php

namespace App\Http\Controllers;

use App\Message;
use App\Prime;
use App\Lib\PrimeLib;


class PrimeController extends Controller
{
    protected $primeLib;

    public function __construct(PrimeLib $primeLib)
    {
        $this->primeLib = $primeLib;
    }

    public function index()
    {
        return  response()->json(Prime::select([ 'value', 'times'])->get());
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
            $this->primeLib->isOverChecked($value);
            return response()->json(['message'=>'Yes your number is a prime number']);
        }
        else{
            return $this->primeLib->isOverChecked($value) ?
                response()->json(['message' => Message::where('id', 1)->value('text')]) :
                response()->json(['message' => 'No']);
        }
    }
}
