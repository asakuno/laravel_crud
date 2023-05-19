@extends('shops.app')

@section('content')
<div class="flex grow">
    <section class="min-h-96 flex flex-1 shrink-0 items-center justify-center overflow-hidden rounded-lg py-16 md:py-20 xl:py-48">
        <div class="flex flex-col items-center p-4 sm:max-w-xl">
            <h1 class="mb-5 text-center text-4xl font-bold text-gray-200 sm:text-5xl md:mb-12 md:text-5xl">
                書店が好きな方に
            </h1>
            <h1 class="mb-5 text-center text-4xl font-bold text-gray-200 sm:text-5xl md:mb-12 md:text-5xl">
                あなたのおすすめの書店を紹介してみませんか？
            </h1>
            <div class="flex justify-center">
                <button class="btn btn-primary">試しに使ってみる</button>
            </div>
        </div>
    </section>
</div>
@endsection