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
            <form action="/wishes/{{ $post->id }}" method="POST">
                @csrf
                <div class="date_and_time">
                    <h2>出発希望日時</h2>
                    <input type="text" name="wish[desired_departure_date_and_time]" placeholder="例）YY-MM-DD HH:MM:SS"/>
                </div>
                <div class="passengers">
                    <h2>乗車希望人数</h2>
                    <input type="text" name="wish[desired_number_of_passengers]" placeholder="例）3"/>
                </div>
                <div class="departure">
                    <h2>出発希望地</h2>
                    <input type="text" name="wish[desired_departure_point]" placeholder="例）東京駅"/>
                </div>
                <div class="arrive">
                    <h2>到着希望地</h2>
                    <input type="text" name="wish[desired_arrive_point]" placeholder="例）東京スカイツリー"/>
                </div>
                <input type="submit" value="希望登録"/>
                <input type="hidden" name="wish[post_id]" value="{{ $post->id }}">
                <input type="hidden" name="wish[post_user_id]" value="{{ $post->user_id }}">
            </form>
         </body>
    </x-app-layout>
</html>