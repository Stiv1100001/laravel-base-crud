@extends('layouts.default')

@section('title', "Comic")

@section('main')
<main class="my-5">
    <div class="container d-flex">
        <div class="img">
            <img src="{{ $comic['thumb']}}" alt="">
        </div>
    </div>
</main>
@endcomponent
