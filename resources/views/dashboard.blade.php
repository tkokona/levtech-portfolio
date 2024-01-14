
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin: 20px;">
                <div class="p-6 text-gray-900">
                    <a href='/posts'>投稿履歴へ</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin: 20px;">
                <div class="p-6 text-gray-900">
                    <a href='/wishes'>申請履歴へ</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
