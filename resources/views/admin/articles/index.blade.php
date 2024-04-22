@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center flex-column text-center">
        <div class="d-flex align-items-center mb-4">
            <h2>Articles</h2>
        </div>
        <div class="w-100">
         <a style="width: 300px" href="{{ route('admin.articles.create') }}" class="btn btn-primary">Create Article</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Cover Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><img src="{{ asset($article->cover_image) }}" alt="Cover Image" style="max-width: 100px;"></td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->articleCategory->name ?? 'Uncategorized' }}</td>
                        <td>{!! substr(strip_tags($article->content), 0, 200) . "..." !!}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
