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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('相乗りマッチング') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <h2 style="font-size: larger; margin: 0 0 20px 50px;">申請履歴</h2>
                @foreach ($wishes as $wish)
                    <div class='wishes' style="padding: 10px 70px; margin: 0 40px; border: solid gray 1px">
                        <div style="border: solid gray 1px; border-radius: 20px; background-color: white; padding: 20px;">
                            <table class='wish' style="margin: 0 auto; border-collapse: separate; border-spacing: 30px 10px;">
                                <tr style="font-size: larger;">
                                    <td>出発希望日時</td>
                                    <td>出発希望地</td>
                                </tr>
                                <tr style="font-size: larger;">
                                    <td class='desired_date_and_time' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $wish->desired_departure_date_and_time->format('Y-m-d H:i') }}</td>
                                    <td class='desires_departure' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $wish->desired_departure_point }}</td>
                                </tr>
                                        
                                <tr style="font-size: larger;">
                                    <td>乗車希望人数</td>
                                    <td>到着希望地</td>
                                </tr>
                                <tr style="font-size: larger;">
                                    <td class='desired_passengers' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $wish->desired_number_of_passengers }}人</td>
                                    <td class='arrive' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $wish->desired_arrive_point }}</td>
                                </tr>
                            </table>
                        </div>
                        <h1 style="font-size: 60px; text-align: center;">▽</h1>
                        
                        @foreach($posts as $post)
                            @if($post->id===$wish->post_id)
                                <div style="border: solid gray 1px; border-radius: 20px; background-color: white; padding: 20px;">
                                    <table class='post' style="margin: 0 auto; border-collapse: separate; border-spacing: 30px 10px;">
                                        <tr style="font-size: larger;">
                                            <th class='title'>{{ $post->title }}</th>
                                        </tr>
                                        <tr style="font-size: larger;">
                                            <td>出発日時</td>
                                            <td>出発地</td>
                                        </tr>
                                        <tr style="font-size: larger;">
                                            <td class='date_and_time' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->departure_date_and_time->format('Y-m-d H:i') }}</td>
                                            <td class='departure' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->departure_point }}</td>
                                        </tr>
                                            
                                        <tr style="font-size: larger;">
                                            <td>乗車人数</td>
                                            <td>到着地</td>
                                        </tr>
                                        <tr style="font-size: larger;">
                                            <td class='passengers' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->number_of_passengers }}人</td>
                                            <td class='arrive' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->arrive_point }}</td>
                                        </tr>
                                            
                                        <tr style="font-size: larger;">
                                            <td>乗車可能人数</td>
                                        </tr>
                                        <tr style="font-size: larger;">
                                            <td class='rideable' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->rideable_number_of_people }}人</td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div style="margin: 15px 0 40px 45px;">
                        <a href='/wishes/show/{{ $wish->post_id }}/{{ $wish->id }}' style=" font-size: larger; margin: 15px 0 40px 30px;">[詳細]</a>
                        <form action="/wishes/{{ $wish->id }}" id="form_{{ $wish->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #ff0000; width: 50px; margin: 15px 0 40px 30px;">
                            <div class="px-2 text-white">
                                <button type="button" onclick="deleteWish({{ $wish->id }})">削除</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    
                @endforeach
            </div>
            <script>
                function deleteWish(id) {
                    'use strict'
                    
                    if (confirm('削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </div>
    </x-app-layout>
</html>