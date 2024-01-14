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
        <div class="py-10">
            <div class="mx-auto sm:px-6 lg:px-8" style="margin: 60px 60px 0 60px;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"style="margin: 20px;">
                    <div class="p-6 text-gray-900">
                       <a href='/wishes'>申請履歴へ</a> 
                    </div>
                </div>
                <div class="search_box" style="margin: 10px 100px 10px 100px; font-size: larger">
                    <form action="{{ url('/posts/search') }}" method="GET">
                        @csrf
                        <input type="text" name="departure_point" placeholder="出発地を入力">
                        <button type="submit">検索</button>
                    </form>
                </div>
                
                <div class='posts' style="padding: 20px 100px;">
                    @empty($posts)
                        <p>{{ $message }}</p>
                    @else
                        @foreach ($posts as $post)
                            <div style="border: solid gray 1px; border-radius: 20px; background-color: white; padding: 20px; margin-top: 30px;">
                                <table class='post' style="margin: 0 auto; border-collapse: separate; border-spacing: 30px 10px;">
                                    <tr style="font-size: larger">
                                         <th class='title'>{{ $post->title }}</th>
                                    </tr>
                                    
                                    <tr style="font-size: larger">
                                        <td>出発日時</td>
                                        <td>出発地</td>
                                    </tr>
                                    <tr style="font-size: larger">
                                        <td class='date_and_time' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->departure_date_and_time->format('Y-m-d H:i') }}</td>
                                        <td class='departure' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->departure_point }}</td>
                                    </tr>
                                    
                                    <tr style="font-size: larger">
                                        <td>乗車人数</td>
                                        <td>到着地</td>
                                    </tr>
                                    <tr style="font-size: larger">
                                        <td class='passengers' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->number_of_passengers }}人</td>
                                        <td class='arrive' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->arrive_point }}</td>
                                    </tr>
                                    
                                    <tr style="font-size: larger">
                                        <td>乗車可能人数</td>
                                    </tr>
                                    <tr style="font-size: larger">
                                        <td class='rideable' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->rideable_number_of_people }}人</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="shadow sm:rounded-lg" style="background-color: #87cefa; width: 55px; margin: 8px; text-align: center;">
                                <a href="/posts/{{ $post->id }}/wishes/request">申請</a>
                            </div>
                        @endforeach
                    @endempty
                </div>
            </div>
        </div>
    </x-app-layout>
</html>