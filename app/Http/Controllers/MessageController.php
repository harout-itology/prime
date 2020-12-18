<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{

    public function update(MessageRequest $request, Message $message)
    {
        $message->text = $request->text;
        $message->frequency = $request->frequency;
        $message->save();
        return response()->json(['message'=>'Successfully updated']);
    }

}
