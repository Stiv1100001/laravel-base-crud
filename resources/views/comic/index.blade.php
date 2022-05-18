@extends('layouts.default')

@section('title', "Home")

@section('main')
<main class="container my-5">
    <div class="row row-cols-4 g-3">
        @foreach ($comics as $comic)
        <div class="col">
            <div class="card h-100">
                <img class="card-img-top img-fluid" src="{{$comic->thumb}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic["title"]}}</h5>
                    <p class="card-text">{{ $comic["series"]}}</p>
                    <a href="{{ route('comic.show', $comic->id)}}" class="btn btn-primary">Mostra</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="my-3">
        <a href="{{ route('comic.create')}}" class="btn btn-secondary">Add comic</a>
    </div>
</main>
@endsection
