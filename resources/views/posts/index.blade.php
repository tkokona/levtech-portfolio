<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>相乗りマッチング</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            相乗りマッチング
        </x-slot>
         <body>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>{{ $post->title }}</h2>
                        <div class='category'>
                            <p class='date_and_time'>{{ $post->departure_date_and_time }}</p>
                            <p class='passengers'>{{ $post->number_of_passengers }}人</p>
                            <p class='rideable'>{{ $post->rideable_number_of_people }}人</p>
                            <p class='departure'>{{ $post->departure_point }}</p>
                            <p class='arrive'>{{ $post->arrive_point }}</p>
                        </div>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            
            <script>
                function deletePost(id) {
                    'use strict'
                    
                    if (confirm('削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
         </body>
    </x-app-layout>
</html>