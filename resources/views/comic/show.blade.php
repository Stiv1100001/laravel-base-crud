@extends('layouts.default')
@section('title', "Comic")
@section('main')
<main class="my-5">
    <div class="container d-flex border border-2">
        <div class="img">
            <img src="{{ $comic['thumb']}}" alt="">
        </div>
        <div class="info ms-2">
            <h5> {{ $comic['title'] }}</h5>
            <p>
                {{ $comic['description']}}
            </p>
            <h6>Price: {{ $comic->price}} &dollar;</h6>
            <h6>Type: {{ $comic->type}}</h6>
            <h6>Series: {{ $comic->series}}</h6>

        </div>
    </div>
</main>
@endsection
