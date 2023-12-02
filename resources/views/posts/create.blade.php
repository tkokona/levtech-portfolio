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
             <a href='/posts'>投稿一覧</a>
             
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>投稿名</h2>
                    <input type="text" name="post[title]" placeholder="例）投稿➀"/>
                </div>
                <div class="date_and_time">
                    <h2>出発日時</h2>
                    <input type="text" name="post[departure_date_and_time]" placeholder="例）YY-MM-DD HH:MM:SS"/>
                </div>
                <div class="passengers">
                    <h2>乗車人数</h2>
                    <input type="text" name="post[number_of_passengers]" placeholder="例）3"/>
                </div>
                 <div class="rideable">
                    <h2>乗車可能人数</h2>
                    <input type="text" name="post[rideable_number_of_people]" placeholder="例）2"/>
                </div>
                <div class="departure">
                    <h2>出発地</h2>
                    <input type="text" name="post[departure_point]" placeholder="例）東京駅"/>
                </div>
                <div class="arrive">
                    <h2>到着地</h2>
                    <input type="text" name="post[arrive_point]" placeholder="例）東京スカイツリー"/>
                </div>
                <input type="submit" value="store"/>
            </form>
         </body>
    </x-app-layout>
</html>