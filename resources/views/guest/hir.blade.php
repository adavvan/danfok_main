@extends('layouts.guest')
@section('title', 'Hír - Dánfok')

@section('content')
<div class="wrapper pt-20">
    <div class="container article-c">
        <h1 class="text-center pb-5">{{ $article->title }}</h1>
        {!! $article->content !!}
    </div>
</div>
@endsection
