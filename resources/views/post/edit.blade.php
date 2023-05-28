@extends('layouts.parent')

@section('content')
    <!-- メイン -->
    <main>
        {{-- <div class="col-8 mx-auto text-center my-5"> --}}
        <div class="container col-8 mt-5">
            <div class="row justify-content-center">

            </div>
            <div calss="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>投稿新規編集</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.update', $post)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">タイトル</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">コメント</label>
                                <textarea class="form-control" id="comment" name="comment">{{ $post->comment }}</textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary d-flex">送信</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center mt-2">
                            <a href="{{ route('post.index')}}" class="btn btn-primary">投稿一覧へ戻る</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
