<?php

namespace App\Http\Controllers;

use App\Chat_Head;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('chats.index', [
            'chats' => Chat_Head::user(Auth::id())
        ]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Chat_Head $chat_Head
     * @return \Illuminate\Http\Response
     */
    public function show(Chat_Head $chat_Head)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Chat_Head $chat_Head
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat_Head $chat_Head)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Chat_Head $chat_Head
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat_Head $chat_Head)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Chat_Head $chat_Head
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat_Head $chat_Head)
    {
        //
    }
}
