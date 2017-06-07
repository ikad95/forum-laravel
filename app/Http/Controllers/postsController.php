<?php

namespace moulikCTF\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use moulikCTF\forum_post;
use moulikCTF\comment;
use moulikCTF\User;
class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = forum_post::All()->sortByDesc("created_at");
        
        foreach ($contents as $k => $content) {
            $content->user = User::find($content->user_id);
            $content->comments = comment::select()->where('post_id',$content->id)->get();
            
            foreach ($content->comments as $comment) {
                $comment['user'] = User::find($comment->user_id)->name;
            }
        }
        return view('welcome',compact('contents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $post = new forum_post;
        $user = Auth::user();
        $post->content = $request->content;
        $post->title = $request->title;
        $post->user_id = $user->id;
        $post->save();
        // return $post;
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
