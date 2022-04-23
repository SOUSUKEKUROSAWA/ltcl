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
        <h3>{{Auth::user()->name}}</h3>
        <h1>Blog Name</h1>
        <div class='posts'>
            [<a href='/posts/create'>create</a>]
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    {{--<a href="">{{ $post->category->name }}</a>--}}
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    {{--<form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">--}}
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="buttonClick( {{$post->id}} )">delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        {{--<script>
            function buttonClick(){
                if (window.confirm('削除すると復元できません．\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>--}}
        <script>
            function buttonClick(PostId){
                if (window.confirm('削除すると復元できません．\n本当に削除しますか？')){
                    document.getElementById(`form_${PostId}`).submit();
                }
            }
        </script>
    </body>
    @endsection
</html>