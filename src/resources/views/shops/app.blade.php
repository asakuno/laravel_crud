<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style type="text/css">
            body {
                font-family: "Helvetica Neue",
                Arial,
                "Hiragino Kaku Gothic Pron",
                "Hiragio Sans",
                Meiryo,
                sans-serif;
            }
        </style>
        <title>book_shop</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <div class="bg-orange-200 py-2 sm:pt-0 flex justify-between">
        <div class="text-left px-6 py-2 sm:block w-1/2">
            <a href="{{ url('/') }}" class="text-2xl hover:text-orange-400 text-orange-800 font-bold">📚みんなの本屋さん📚</a>
        </div>
        <div class="text-right px-6 py-2">
            @include('layouts.navigation')
        </div>
    </div>
    <div>
        @yield('content')
    </div>
    @include('layouts.before_btm_nav')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>