@extends('layouts.default')

@section('title', "Edit")

@section('main')
<main class="container my-5">
    <h1>Edit comic</h1>
    <form action="{{ route('comic.update', ['comic' => $comic]) }}" method="POST" class="d-flex flex-column">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" class="mb-3" value="{{ $comic->title }}">

        <label for="description">Description</label>
        <textarea name="description" class="mb-3">{{ $comic->description }}</textarea>

        <label for="thumb">Thumb</label>
        <input type="text" class="mb-3" name="thumb" value="{{ $comic->thumb }}">

        <label for="type">Type</label>
        <input type="text" class="mb-3" name="type" value="{{ $comic->type }}">

        <label for="series">Series</label>
        <input type="text" class="mb-3" name="series" value="{{ $comic->series }}">

        <label for="price">Price</label>
        <input type="number" class="mb-3" name="price" step="0.1" min="0" value="{{ $comic->price }}">

        <label for="sale_date">Sale Date</label>
        <input type="text" class="mb-3" name="sale_date" value="{{ $comic->sale_date }}">

        <input type="submit" class="btn btn-primary" value="Add">
    </form>
</main>
@endsection
