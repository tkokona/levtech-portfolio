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
                        <a href='/posts'>投稿履歴へ</a>
                    </div>
                </div>
                    <form action="/posts" method="POST">
                        @csrf
                        <div class="title">
                            <h2>投稿名</h2>
                            <input type="text" name="post[title]" placeholder="例）投稿➀" value="{{ old('post.title') }}" style="margin-bottom: 10px;">
                            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                        </div>
                        <div class="date_and_time">
                            <h2>出発日時</h2>
                            <input type="text" name="post[departure_date_and_time]" placeholder="例）YY-MM-DD HH:MM" value="{{ old('post.departure_date_and_time') }}" style="margin-bottom: 10px;"/>
                            <p class="date_and_time__error" style="color:red">{{ $errors->first('post.departure_date_and_time') }}</p>
                        </div>
                        <div class="passengers">
                            <h2>乗車人数</h2>
                            <input type="text" name="post[number_of_passengers]" placeholder="例）3" value="{{ old('post.number_of_passengers') }}" style="margin-bottom: 10px;"/>
                            <p class="passengers__error" style="color:red">{{ $errors->first('post.number_of_passengers') }}</p>
                        </div>
                         <div class="rideable">
                            <h2>乗せることが出来る人数</h2>
                            <input type="text" name="post[rideable_number_of_people]" placeholder="例）2" value="{{ old('post.rideable_number_of_people') }}" style="margin-bottom: 10px;"/>
                            <p class="rideable__error" style="color:red">{{ $errors->first('post.rideable_number_of_people') }}</p>
                        </div>
                        
                        <div id="floating-panel">
                            <div class="departure">
                                <h2>(A)出発地 </h2>
                                <input type="text" id="start" name="post[departure_point]" value="例）東京駅" value="{{ old('post.departure_point') }}" style="margin-bottom: 10px;"/>
                                <p class="departure__error" style="color:red">{{ $errors->first('post.departure_point') }}</p>
                            </div>
                            <div class="arrive">
                                <h2>(B)到着地 </h2>
                                <input type="text" id="end" name="post[arrive_point]" value="例）東京スカイツリー" value="{{ old('post.arrive_point') }}" style="margin-bottom: 10px;"/>
                                <p class="arrive__error" style="color:red">{{ $errors->first('post.arrive_point') }}</p>
                            </div>
                        </div>
                        <div id="map" style="height:500px; width:800px;"></div>
                        <div id="infowindow-content">
                          <span id="place-name" class="title"></span><br />
                          <span id="place-address"></span>
                        </div>
                        <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #0D50BB; width: 50px; margin-bottom: 30px">
                            <div class="p-2 text-white">
                                <input type="submit" value="投稿"/>
                            </div>
                        </div>
                    </form>
                    
                    <script src="{{ asset('/js/map.js') }}"></script> <!--jsを表示させるコード-->
                    <!--↓APIを読み込むためのコード-->
                    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.key')}}&callback=initMap&libraries=places&v=weekly&solution_channel=GMP_CCS_autocomplete_v1" async defer></script>
                    <!--&callback=initMap → APIを読み終わったあとに、initmapというcallback関数を実行。-->
                    <!--async deferは非同期でスクリプトを読み込むために必要-->
            </div>
        </div>
    </x-app-layout>
</html>
