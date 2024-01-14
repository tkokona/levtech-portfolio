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
            <div class="mx-auto sm:px-6 lg:px-8"  style="padding: 0px 100px;">
                <h2 style="font-size: larger; margin-left: 50px;">申請詳細</h2>
                <div style="border: solid gray 1px; border-radius: 20px; background-color: white; padding: 20px; margin-top: 30px;">
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
                <div style="display: inline-flex; text-align: center;">
                    <form action="/posts/check/{{ $post->id }}/{{ $wish->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #4169e1; width: 60px; margin: 8px;">
                            <div class="px-2 text-white">
                                <input type="submit" value="承諾">
                            </div>
                        </div>
                    </form>
                    
                    <form action="/posts/check/reject/{{ $post->id }}/{{ $wish->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #ff0000; width: 60px; margin: 8px;">
                            <div class="px-2 text-white">
                                <input type="submit" value="拒否">
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</html>