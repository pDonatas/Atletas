<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Chat_Head;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return redirect(route('chats.index', app()->getLocale()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $chat = new Chat();
        $chat->fill([
            'chat_id' => $request->input('chat_id'),
            'text' => $request->input('text'),
            'who' => Auth::id()
        ]);
        $chat->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  $lang Locale
     * @param $chat_head Chat_Head
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($lang, $chat_head)
    {
        $chats = Chat::findAll($chat_head);
        return view('chats.view', [
            'chats' => $chats,
            'chatid' => $chat_head
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Chat $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Chat $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Chat $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
