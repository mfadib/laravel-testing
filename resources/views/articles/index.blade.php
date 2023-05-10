@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Article List</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
