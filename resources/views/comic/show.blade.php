@extends('layouts.default')
@section('title', "Comic")
@section('main')
<main class="my-5">
    <div class="container d-flex border border-2">
        <div class="img w-50">
            <img src="{{ $comic->thumb }}" alt="" class=" img-fluid">
        </div>
        <div class="info ms-2">
            <h5> {{ $comic->title }}</h5>
            <p>
                {{ $comic->description}}
            </p>
            <h6>Price: {{ $comic->price}} &dollar;</h6>
            <h6>Type: {{ $comic->type}}</h6>
            <h6>Series: {{ $comic->series}}</h6>

        </div>
    </div>
    <div class="container my-5">
        <a href="{{ route('comic.edit', ['comic' => $comic])}}" class="btn btn-warning">Modifica</a>
        <form action="{{ route('comic.destroy', ['comic' => $comic]) }}" method="POST" class="d-inline">
            @method('DELETE')
            <input type="submit" class="d-inline btn btn-danger" value="Elimina">
        </form>
        <a href="{{ route('comic.index')}}" class="btn btn-primary">Home</a>
    </div>
</main>
@endsection
