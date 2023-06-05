@extends('shops.app')

@section('content')
    <p class="my-5 flex justify-center text-2xl font-bold">お気に入り一覧</p>
    <div class="max-w-md mx-auto mt-10 ml-3">
        <a class="btn btn-outline mb-2" href="{{ url('/shops') }}">戻る</a>
    </div>
    @foreach ($shops as $shop)
        <div class="flex justify-center">
            <div class="card w-96 bg-base-100 shadow-xl mb-3">
                <div class="card-body">
                    <h2 class="card-title font-bold">
                        <a href="{{ route('shop.show', $shop->id) }}">
                            {{ $shop->name }}
                        </a>
                    </h2>
                    <p class="mb-2">{{ $shop->address }}</p>
                    <p class="font-medium italic">{{ $shop->user->name }}</p>
                    <div class="article-control">
                    @if(\Illuminate\Support\Facades\Auth::id() !== $shop->user_id)
                        @if (!\Illuminate\Support\Facades\Auth::user()->is_favorite($shop->id))
                        <form action="{{ route('favorite.store', $shop) }}" method="post">
                            @csrf
                            <button><i class="far fa-heart"></i></button>
                        </form>
                        @else
                        <form action="{{ route('favorite.destroy', $shop) }}" method="post">
                            @csrf
                            @method('delete')
                            <button><i class="fas fa-heart"></i></button>
                        </form>
                        @endif
                    @endif
                    </div>
                    <div class="card-actions justify-end">
                        @if(\Illuminate\Support\Facades\Auth::id() === $shop->user_id)
                            <a class="btn btn-outline btn-primary" href="{{ route('shop.edit', $shop->id) }}?page_id={{ $page_id }}">編集</a>
                            <form action="{{ route('shop.destroy', $shop->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline btn-error" onclick='return confirm("削除してもよろしいですか？")'>削除</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div> 
        </div>       
        @endforeach 
        <div class="flex justify-center mb-8">
            {!! $shops->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@endsection