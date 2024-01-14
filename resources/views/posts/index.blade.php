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
                <h2 style="font-size: larger; margin-left: 50px;">投稿履歴</h2>
                <div class='posts' style="padding: 20px 100px;">
                    @foreach ($posts as $post)
                        <div style="border: solid gray 1px; border-radius: 20px; background-color: white; padding: 20px; margin-top: 30px;">
                            <table class='post' style="margin: 0 auto; border-collapse: separate; border-spacing: 30px 10px;">
                                <tr style="font-size: larger;">
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
                                <tr>
                                    <td class='rideable' style="border: solid gray 1px; text-align: center; padding: 0 8px;">{{ $post->rideable_number_of_people }}人</td>
                                </tr>
                            </table>
                        </div>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #ff0000; width: 50px; margin: 8px;">
                                <div class="px-2 text-white">
                                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                                </div>
                            </div>
                        </form>
                        <div>
                            @foreach ($wishes as $wish)
                                @if($wish->post_id===$post->id && $wish->status===0)
                                    <div class="shadow sm:rounded-lg" style="background-color: #87cefa; width: 55px; margin: 8px;">
                                        <a href='/posts/check/{{ $post->id }}/{{ $wish->id }}'>！申請</a>
                                    </div>
                                @elseif($wish->post_id===$post->id && $wish->status===1)
                                    <a href='/wishes/show/{{ $post->id }}/{{ $wish->id }}' style="margin: 8px;">[詳細]</a>
                                @endif
                            @endforeach
                        </div>
                        
                    @endforeach
                </div>
            </div>
            <script>
                function deletePost(id) {
                    'use strict'
                    
                    if (confirm('削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </div>
    </x-app-layout>
</html>