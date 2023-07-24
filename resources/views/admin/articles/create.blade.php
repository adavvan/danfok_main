@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control-file" id="cover_image" name="cover_image">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="article_category_id">Article Category</label>
            <select class="form-control" id="article_category_id" name="article_category_id">
                @foreach($articleCategories as $articleCategory)
                <option value="{{ $articleCategory->id }}">{{ $articleCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Article Content</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Include CKEditor scripts -->
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

<script>
   CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
