@extends('shops.app')

@section('content')
    <div class="mx-5 my-5 bg-white" style="overflow-x: auto;">
        <div class="flex justify-center">
            <form action="{{ route('shops.index') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="書店名 住所" class="input input-bordered bg-gray-100" />
                <button type="submit" value="検索" class="btn btn-outline btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </form>
        </div>
        @auth
            <a href="{{ route('shop.create') }}" class="btn btn-outline btn-success mb-3">書店登録</a>
        @endauth
            <a href="{{ route('shops.map') }}" class="btn btn-outline btn-success mb-3">MAP一覧</a>
        <table class="table table-bordered table-responsive">
            <tr>
                <th>作成者</th>
                <th>書店名</th>
                <th>住所</th>
                <th>緯度</th>
                <th>経度</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($shops as $shop)
                <tr>
                    <td style="text-align:right">{{ $shop->user->name }}</td>
                    <td style="text-align:left">
                        <a  href="{{ route('shop.show', $shop->id) }}?page_id={{ $page_id }}">
                            {{ $shop->name }}
                        </a>
                    </td>
                    <td style="text-align:right">{{ $shop->address }}</td>
                    <td style="text-align:right">{{ $shop->latitude }}</td>
                    <td style="text-align:left">{{ $shop->longitude }}</td>
                    @if(\Illuminate\Support\Facades\Auth::id() === $shop->user_id)
                        <td style="text-align:center">
                            <a class="btn btn-primary" href="{{ route('shop.edit', $shop->id) }}">編集</a>
                        </td>
                        <td style="text-align:center">
                            <form action="{{ route('shop.destroy', $shop->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-error" onclick='return confirm("削除してもよろしいですか？")'>削除</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
        <div class="flex justify-center">
            {!! $shops->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@endsection