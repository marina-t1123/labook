@extends('layouts.parent')

@section('content')
    <div id="carouselExampleControls" class="carousel slide w-75 mx-auto my-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/top1.png') }}" class="d-block w-100 h-75" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/top2.png') }}" class="d-block w-100 h-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- メイン -->
    <main>
        <div class="col-8 mx-auto text-center my-5">
            <h1 class="fs-1">Lobook</h1>
            <p>Lobook（ラブック）は、お気に入りの本を紹介していく掲示板です。</p>
        </div>

        <!-- 一覧 -->


    </main>
@endsection
