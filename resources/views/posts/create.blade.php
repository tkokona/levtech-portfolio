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
             <a href='/posts'>投稿一覧</a>
             
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>投稿名</h2>
                    <input type="text" name="post[title]" placeholder="例）投稿➀"/>
                </div>
                <div class="date_and_time">
                    <h2>出発日時</h2>
                    <input type="text" name="post[departure_date_and_time]" placeholder="例）YY-MM-DD HH:MM"/>
                </div>
                <div class="passengers">
                    <h2>乗車人数</h2>
                    <input type="text" name="post[number_of_passengers]" placeholder="例）3"/>
                </div>
                 <div class="rideable">
                    <h2>乗車可能人数</h2>
                    <input type="text" name="post[rideable_number_of_people]" placeholder="例）2"/>
                </div>
                <!--<div class="departure">-->
                <!--    <h2>出発地</h2>-->
                <!--    <input type="text" name="post[departure_point]" placeholder="例）東京駅"/>-->
                <!--</div>-->
                <!--<div class="arrive">-->
                <!--    <h2>到着地</h2>-->
                <!--    <input type="text" name="post[arrive_point]" placeholder="例）東京スカイツリー"/>-->
                <!--</div>-->
                
                <div id="floating-panel">
                    <div class="departure">
                        <h2>出発地: </h2>
                        <input type="text" id="start" name="post[departure_point]" value="例）東京駅" />
                    </div>
                    <div class="arrive">
                        <h2>到着地: </h2>
                        <input type="text" id="end" name="post[arrive_point]" value="例）東京スカイツリー" />
                    </div>
                </div>
                <div id="map" style="height:500px; width:800px;"></div>
                <div id="infowindow-content">
                  <span id="place-name" class="title"></span><br />
                  <span id="place-address"></span>
                </div>
                <input type="submit" value="投稿"/>
            </form>
            
            <script src="{{ asset('/js/map.js') }}"></script> <!--jsを表示させるコード-->
            <!--↓APIを読み込むためのコード-->
            <!--<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAbU_jiQSWZOUpwKsj73ZAK3stt98aQ_fI&callback=initMap" async defer></script>-->
            <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAbU_jiQSWZOUpwKsj73ZAK3stt98aQ_fI&callback=initMap&libraries=places&v=weekly&solution_channel=GMP_CCS_autocomplete_v1" async defer></script>
            <!--&callback=initMap → APIを読み終わったあとに、initmapというcallback関数を実行。-->
            <!--async deferは非同期でスクリプトを読み込むために必要-->
         </body>
    </x-app-layout>
</html>