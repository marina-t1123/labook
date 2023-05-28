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
                            @if(Auth::id() === $post->user_id)
                                <div class="d-flex justify-content-evenly">
                                    <a href="{{ route('post.edit', $post) }}" class="btn btn-dark">編集</a>
                                    <form action="{{ route('post.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-dark" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>
                                </div>
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
