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
                background-image: url(/images/book_image.jpeg);
                background-size: 100% 100%;
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
            @if (Route::has('login'))
                <div class="text-right px-6 py-2">
                    @auth
                        @include('layouts.navigation')
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div>
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success shadow-lg mt-1" id="success-alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>
        @guest
            @include('layouts.before_btm_nav')
        @else
            @include('layouts.btm_nav')
        @endguest
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var closeButton = document.querySelector('#success-alert .close');
                console.log('aaa');
                if (closeButton) {
                    closeButton.addEventListener('click', function() {
                        var successAlert = document.querySelector('#success-alert');
                        if (successAlert) {
                            successAlert.style.display = 'none';
                        }
                    });
                }
            });
        </script>
    </body>
</html>