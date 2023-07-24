@extends('layouts.guest')
@section('title', 'Hírek - Dánfok')
@section('content')
<link rel="stylesheet" href="css/article.css"/>

<div class="wrapper">

    <section class="titleh container-fluid pb-5 pt-20">
        <h1 class="pb-2">Hírek</h1>
        <div class="sargahullam"><img src="svg/hullam_sarga-03.svg"></div>
    </section>
        @foreach ($articles as $article)
        <div class="container d-flex justify-content-center">
            <div class="post mb-5 d-flex flex-column flex-md-row flex-lg-row">
                    <div class="post-img" style="background-image: url({{ asset('storage/' . $article->cover_image) }})">
                    </div>
                    <div class="post-body">
                        <h3 class="post-title"><a href="{{ route('guest.hir', $article->id) }}">{{ $article->title }}</a></h3>
                        <p>{{ strip_tags(substr($article->content, 0, 200)) . "..." }}</p>
                        <span class="post-date">
                            {{$article->created_at}} 
                        </span>
                        <a href="" class="details">Bővebben...</a> 
                    </div>
                </div>  
            </div>
        @endforeach
</div>
@endsection
