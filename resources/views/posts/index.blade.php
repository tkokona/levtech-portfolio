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
                    <table class='post'>
                        <tr>
                             <th class='title'>{{ $post->title }}</th>
                        </tr>
                        
                        <tr>
                            <td>出発日時</td>
                            <td>出発地</td>
                        </tr>
                        <tr>
                            <td class='date_and_time'>{{ $post->departure_date_and_time->format('Y-m-d H:i') }}</td>
                            <td class='departure'>{{ $post->departure_point }}</td>
                        </tr>
                        
                        <tr>
                            <td>乗車人数</td>
                            <td>到着地</td>
                        </tr>
                        <tr>
                            <td class='passengers'>{{ $post->number_of_passengers }}人</td>
                            <td class='arrive'>{{ $post->arrive_point }}</td>
                        </tr>
                        
                        <tr>
                            <td>乗車可能人数</td>
                        </tr>
                        <tr>
                            <td class='rideable'>{{ $post->rideable_number_of_people }}人</td>
                        </tr>
                    </table>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                    </form>
                    <div>
                        @foreach ($wishes as $wish)
                            @if($wish->post_id===$post->id)
                                <a href='/posts/check/{{ $post->id }}/{{ $wish->id }}'>！申請</a>
                                </br>
                            @endif
                        @endforeach
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