<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authファサードを読み込む
use App\Models\User;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();
        return view('post.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ログインユーザーのIDを取得する
        $id = Auth::id();
        //リクエスト送信された内容とIDを登録する
        Post::create([
            'user_id' => $id,
            'title' => $request->title,
            'comment' => $request->comment,
        ]);

        //投稿一覧画面にリダイレクト
        return to_route('post.index')->with('status', '投稿登録完了');
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
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //リクエスト送信された値をDBに保存
        $post->title = $request->title;
        $post->comment = $request->comment;
        $post->save();

        //編集ページにリダイレクトして、メッセージを表示
        return back()->with('status', '投稿を編集しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //対象の投稿を削除する
        $post->delete();

        //一覧画面に戻る
        return to_route('post.index')->with('status', '投稿を削除しました');

    }
}
