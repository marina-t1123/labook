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
                        <h1>コメント編集</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('comments.update', $comment) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="sentence" class="form-label">内容</label>
                                <textarea class="form-control" id="sentence" name="sentence">{{ $comment->sentence }}</textarea>
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
