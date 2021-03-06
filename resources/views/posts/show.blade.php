<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('layouts.app')

    @section('content')
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        {{--<h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>--}}
        
        <h1>Blog Name</h1>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <div class='post'>
            <h2 class='title'>{{ $post->title }}</h2>
            <p class='body'>{{ $post->body }}</p>
            {{--<a href="">{{ $post->category->name }}</a>--}}
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            <p class='updated_at'>{{ $post->updated_at }}</p>
        </div>
        <div class='back'>
            [<a href='/'>back</a>]
        </div>
    </body>
    @endsection
</html>