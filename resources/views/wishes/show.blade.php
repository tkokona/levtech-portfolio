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
                @if($wish->status===1)
                    <h1 style="background-color: #87cefa; color: white; font-size: larger; font-weight: bold; margin: 8px; padding: 8px 5px">マッチング</h1>
                @elseif($wish->status===2)
                    <h1 style="background-color: #ff7f50; color: white; font-size: larger; font-weight: bold; margin: 8px; padding: 8px 5px">マッチング失敗</h1>
                @else
                    <h1 style="background-color: #dcdcdc; font-size: larger; font-weight: bold; margin: 8px; padding: 8px 5px">申請中</h1>
                @endif
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
            </div>
        </div>
    </x-app-layout>
</html>