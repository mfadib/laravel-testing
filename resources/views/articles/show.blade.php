@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->content }}</p>
        <p>Article Creator: {{ $article->creator->name }}</p>
        @if($article->image)
            <img src="{{ asset($article->image) }}" alt="Article Image" class="img-fluid">
        @else
            <p>No image available.</p>
        @endif
    </div>
@endsection
