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
            <div class="search_box">
                <form action="{{ url('/posts/search') }}" method="GET">
                    @csrf
                    <input type="text" name="departure_point" placeholder="出発地を入力">
                    <button type="submit">検索</button>
                </form>
            </div>
            
            <h1>投稿一覧</h1>
            <div class='posts'>
                @empty($posts)
                    <p>{{ $message }}</p>
                @else
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
                                <td class='date_and_time'>{{ $post->departure_date_and_time }}</td>
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
                        <div class='request'><a href="/wishes/request/{{ $post->id }}">申請</a></div>
                    @endforeach
                @endempty
            </div>
         </body>
    </x-app-layout>
</html>