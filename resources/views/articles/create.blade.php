@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Article</h1>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required>
                <input type="hidden" name="creator_id" value="{{ auth()->user()->id }}">
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" required></textarea>
                @if ($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}">
                @if ($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
