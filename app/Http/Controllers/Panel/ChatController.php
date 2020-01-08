<?php

namespace App\Http\Controllers\Panel;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\SendMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.chat.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SendMessage  $request
     * @return \Illuminate\Http\Response
     */
    public function send(SendMessage $request)
    {
        $user = Auth::user();
        $message = Message::create([
            'author'    =>  $user->name,
            'role_id'   =>  $user->role,
            'message'   =>  $request->input('message'),
        ]);
    }
    /**
     * Get dialog messages
     * @param Request $request
     * @return Response
     */
    public function messages(Request $request)
    {
        $data = Message::getMessages();
        $messages = [];
        foreach ($data as $message) {
            $messages[] = [
                'author'    =>  $message->author,
                'color'     =>  $message->role_id == User::ROLE_TEACHER ? 'bold' : 'regular',
                'time'      =>  $message->created_at->toDateTimeString(),
                'message'   =>  htmlspecialchars($message->message)
            ];
        }
        return response()->json($messages, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function countMessages()
    {
        return response()->json(count(Message::getMessages()));
    }
}
