<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->middleware('admin')) {
            return view('admin.news');
        }
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'text' => 'required'
        ]);
        $news = new News;
        $news->title = $request->input('title');
        $news->category = $request->input('category');
        $news->author = Auth::user()->id;
        $news->slug = str_replace(' ', '_', substr($news->title, 0, 10));
        $news->text = $request->input('text');
        $news->created_at = date("Y-m-d H:i:s");
        $news->updated_at = date("Y-m-d H:i:s");
        $news->save();

        $image = $request->file('image');
        if (!empty($image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();

            $image = '/img/news/' . $imageName;

            request()->image->move(public_path('img/news'), $imageName);

            $news->update([
                'image' => $image
            ]);
        }
        return redirect(url()->previous());
    }

    public function write(Request $request)
    {
        if ($this->middleware('admin')) {
            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'text' => 'required'
            ]);
            $news = new News;
            $news->title = $request->input('title');
            $news->category = $request->input('category');
            $news->author = Auth::user()->id;
            $news->slug = str_replace(' ', '_', substr($news->title, 0, 10));
            $news->text = $request->input('text');
            $news->created_at = date("Y-m-d H:i:s");
            $news->updated_at = date("Y-m-d H:i:s");
            $news->submited = true;
            $news->save();

            $image = $request->file('image');
            if (!empty($image)) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();

                $image = '/img/news/' . $imageName;

                request()->image->move(public_path('img/news'), $imageName);

                $news->update([
                    'image' => $image
                ]);
            }
            return redirect(url()->previous());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->fill($request->all());

        $image = $request->file('image');
        if (!empty($image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();

            $image = '/img/news/' . $imageName;

            request()->image->move(public_path('img/news'), $imageName);

            $news->update([
                'image' => $image
            ]);
        }

        $news->save();
        return view('admin.news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->middleware('admin')) {
            $news = News::findOrFail($id);
            $news->delete();
            return view('admin.news');
        }
    }

    public function submit($id)
    {
        if ($this->middleware('admin')) {
            $news = News::findOrFail($id);
            $news->update([
                'submited' => 1
            ]);
            $news->save();

            return view('admin.news');
        }
    }
}
