@extends('layouts.guest')
@section('title', 'Hír - Dánfok')

@section('content')
<div class="wrapper pt-20">
    <div class="container">
        <h1>{{ $article->title }}</h1>
        {!! $article->content !!}
    </div>   
</div>
@endsection
