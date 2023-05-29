<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authファサードを読み込む
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        //送信された投稿の情報とログインユーザーのIDをもとにいいねを作成
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        //一覧画面にリダイレクト
        return to_route('post.index')->with('status', 'いいねの登録完了');
    }

    public function destroy(Post $post)
    {
        // dd($post);
        $like = $post->likes->where('user_id', Auth::id())->first();
        // dd($like);
        $like->delete();

        return to_route('post.index')->with('status', 'いいねの削除完了');
    }
}
