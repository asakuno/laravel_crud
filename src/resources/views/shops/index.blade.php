@extends('shops.app')

@section('content')
    <div class="mx-5 my-5 bg-white" style="overflow-x: auto;">
        <div class="flex justify-center">
            <form action="{{ route('shops.index') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="書店名か住所で検索" class="input input-bordered bg-gray-100" />
                <button type="submit" value="検索" class="btn btn-outline btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </form>
        </div>
        <div class="flex justify-center mt-3">
            <a href="{{ route('shops.map') }}" class="btn btn-outline btn-info mb-3 mr-4">MAP一覧</a>
            @auth
                <a href="{{ route('shop.create') }}" class="btn btn-outline btn-success mb-3">書店登録</a>
            @endauth
        </div>
        @foreach ($shops as $shop)
        <div class="flex justify-center">
            <div class="card w-96 bg-base-100 shadow-xl mb-3">
                <div class="card-body">
                    <h2 class="card-title font-bold">
                        <a href="{{ route('shop.show', $shop->id) }}?page_id={{ $page_id }}">
                            {{ $shop->name }}
                        </a>
                    </h2>
                    <p class="mb-2">{{ $shop->address }}</p>
                    <p class="font-medium italic">{{ $shop->user->name }}</p>
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