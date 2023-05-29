@extends('layouts.parent')

@section('content')
<div class="container my-3">
    <h1 class="text-center">掲示板一覧</h1>
    <div class="d-flex justify-content-center my-5">
        <a href="{{ route('post.create')}}" class="btn btn-dark test-center">投稿新規作成</a>
    </div>
    <div class="row justify-content-center">
        @if($posts->isNotEmpty())
            @foreach($posts as $post)
                <!-- Replace with your actual data -->
                <div class="col-6 mb-5">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at }}</h6>
                            <p class="card-text">{{ $post->comment }}</p>
                            <div class="d-flex justify-content-evenly">
                                <!-- 編集・削除ボタン -->
                                @if(Auth::id() === $post->user_id)
                                    <a href="{{ route('post.edit', $post) }}" class="btn btn-dark">編集</a>
                                    <form action="{{ route('post.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-dark" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>
                                @endif
                                <!-- いいねボタン -->
                                <!-- 作成ボタン -->
                                @if( $post->likes->isNotEmpty() || $post->likes->where('user_id', Auth::id())->isNotEmpty() )
                                    <form action="{{ route('like.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('like.store', $post) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-dark">Like</button>
                                    </form>
                                @endif
                                {{-- @@php
                                    $likes = $post->likes->where('user_id', Auth::id());
                                    ddd($likes);
                                @endphp --}}
                                {{-- @if($post->likes->where('user_id', Auth::id())) --}}

                                <!-- 返信作成 -->
                                <a href="{{ route('post.comments.create', $post) }}" class="btn btn-dark">コメント作成</a>
                                <!-- 返信一覧表示-->
                                @if($post->comments->isNotEmpty())
                                    <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        コメント一覧
                                    </button>
                                @endif
                            </div>
                            <!-- コメント表示 -->

                            @if($post->comments->isNotEmpty())
                                @foreach( $post->comments as $comment)
                                    <div class="collapse my-4" id="collapseExample">
                                        <div class="card card-body">
                                            <!-- 内容 -->
                                            <p>{{ $comment->sentence }}</p>
                                            @auth
                                                @if($post->user_id === Auth::id())
                                                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-dark my-2">編集</a>
                                                    <form action="{{ route('comments.destroy', $comment)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-dark w-max" onclick="return confirm('本当に削除しますか？')">削除</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <!-- More entries... -->
    </div>
</div>

@endsection
