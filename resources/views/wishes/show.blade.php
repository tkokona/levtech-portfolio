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
        <body>
            <table class='wish'>
                <form action="/wishes/{{ $wish->id }}" id="form_{{ $wish->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteWish({{ $wish->id }})">削除</button>
                    </form>
                <tr>
                    <td>出発希望日時</td>
                    <td>出発希望地</td>
                </tr>
                <tr>
                    <td class='desired_date_and_time'>{{ $wish->desired_departure_date_and_time->format('Y-m-d H:i') }}</td>
                    <td class='desires_departure'>{{ $wish->desired_departure_point }}</td>
                </tr>
                        
                <tr>
                    <td>乗車希望人数</td>
                    <td>到着希望地</td>
                </tr>
                <tr>
                    <td class='desired_passengers'>{{ $wish->desired_number_of_passengers }}人</td>
                    <td class='arrive'>{{ $wish->desired_arrive_point }}</td>
                </tr>
            </table>
            
            @if($wish->status===1)
                <h1>マッチング</h1>
            @elseif($wish->status===2)
                <h1>マッチング失敗</h1>
            @else
                <h1>申請中</h1>
            @endif
            
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
            
            <script>
                function deleteWish(id) {
                    'use strict'
                    
                    if (confirm('削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
    </x-app-layout>
</html>