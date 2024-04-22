@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Article</h2>

            <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                </div>

                <!-- Content (using CKEditor) -->
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" required>{{ old('content', $article->content) }}</textarea>
                </div>

                <!-- Article Category -->
                <div class="form-group">
                    <label for="article_category_id">Category</label>
                    <select name="article_category_id" id="article_category_id" class="form-control" required>
                        @foreach ($articleCategories as $category)
                            <option value="{{ $category->id }}" {{ $category->id === $article->article_category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Cover Image (if exists) -->
                <div class="form-group">
                    <label for="cover_image">Cover Image</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                    @if ($article->cover_image)
                        <img src="{{ asset($article->cover_image) }}" alt="Cover Image" style="max-width: 200px;">
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<!-- Include CKEditor scripts -->
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

<script>
    // Initialize CKEditor on the content textarea
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
