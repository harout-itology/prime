<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Message $message)
    {
        //
    }

    public function edit(Message $message)
    {
        //
    }

    public function update(MessageRequest $request, Message $message)
    {
        $message->text = $request->text;
        $message->save();
        return response()->json(['message'=>'Successfully updated']);
    }

    public function destroy(Message $message)
    {
        //
    }
}
