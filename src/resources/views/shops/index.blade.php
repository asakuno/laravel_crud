@extends('shops.app')

@section('content')
    <div class="mx-5 my-5 bg-white" style="overflow-x: auto;">
        <div class="flex justify-center">
            <form action="{{ route('shops.index') }}" method="GET" id="searchForm">
                <select name="prefecture" class="mb-1 select select-ghost w-full max-w-xs">
                <option value="">選択</option>
                    <option value="北海道" {{ $prefecture === '北海道' ? 'selected' : '' }}>北海道</option>
                    <option value="青森県"{{ $prefecture === '青森県' ? 'selected' : '' }}>青森県</option>
                    <option value="岩手県" {{ $prefecture === '岩手県' ? 'selected' : '' }}>岩手県</option>
                    <option value="宮城県" {{ $prefecture === '宮城県' ? 'selected' : '' }}>宮城県</option>
                    <option value="秋田県" {{ $prefecture === '秋田県' ? 'selected' : '' }}>秋田県</option>
                    <option value="山形県" {{ $prefecture === '山形県' ? 'selected' : '' }}>山形県</option>
                    <option value="福島県" {{ $prefecture === '福島県' ? 'selected' : '' }}>福島県</option>
                    <option value="茨城県" {{ $prefecture === '茨城県' ? 'selected' : '' }}>茨城県</option>
                    <option value="栃木県" {{ $prefecture === '栃木県' ? 'selected' : '' }}>栃木県</option>
                    <option value="群馬県" {{ $prefecture === '群馬県' ? 'selected' : '' }}>群馬県</option>
                    <option value="埼玉県" {{ $prefecture === '埼玉県' ? 'selected' : '' }}>埼玉県</option>
                    <option value="千葉県" {{ $prefecture === '千葉県' ? 'selected' : '' }}>千葉県</option>
                    <option value="東京都" {{ $prefecture === '東京都' ? 'selected' : '' }}>東京都</option>
                    <option value="神奈川県" {{ $prefecture === '神奈川県' ? 'selected' : '' }}>神奈川県</option>
                    <option value="新潟県" {{ $prefecture === '新潟県' ? 'selected' : '' }}>新潟県</option>
                    <option value="富山県" {{ $prefecture === '富山県' ? 'selected' : '' }}>富山県</option>
                    <option value="石川県" {{ $prefecture === '石川県' ? 'selected' : '' }}>石川県</option>
                    <option value="福井県" {{ $prefecture === '福井県' ? 'selected' : '' }}>福井県</option>
                    <option value="山梨県" {{ $prefecture === '山梨県' ? 'selected' : '' }}>山梨県</option>
                    <option value="長野県" {{ $prefecture === '長野県' ? 'selected' : '' }}>長野県</option>
                    <option value="岐阜県" {{ $prefecture === '岐阜県' ? 'selected' : '' }}>岐阜県</option>
                    <option value="静岡県" {{ $prefecture === '静岡県' ? 'selected' : '' }}>静岡県</option>
                    <option value="愛知県" {{ $prefecture === '愛知県' ? 'selected' : '' }}>愛知県</option>
                    <option value="三重県" {{ $prefecture === '三重県' ? 'selected' : '' }}>三重県</option>
                    <option value="滋賀県" {{ $prefecture === '滋賀県' ? 'selected' : '' }}>滋賀県</option>
                    <option value="京都府" {{ $prefecture === '京都府' ? 'selected' : '' }}>京都府</option>
                    <option value="大阪府" {{ $prefecture === '大阪府' ? 'selected' : '' }}>大阪府</option>
                    <option value="兵庫県" {{ $prefecture === '兵庫県' ? 'selected' : '' }}>兵庫県</option>
                    <option value="奈良県" {{ $prefecture === '奈良県' ? 'selected' : '' }}>奈良県</option>
                    <option value="和歌山県" {{ $prefecture === '和歌山県' ? 'selected' : '' }}>和歌山県</option>
                    <option value="鳥取県" {{ $prefecture === '鳥取県' ? 'selected' : '' }}>鳥取県</option>
                    <option value="島根県" {{ $prefecture === '島根県' ? 'selected' : '' }}>島根県</option>
                    <option value="岡山県" {{ $prefecture === '岡山県' ? 'selected' : '' }}>岡山県</option>
                    <option value="広島県" {{ $prefecture === '広島県' ? 'selected' : '' }}>広島県</option>
                    <option value="山口県" {{ $prefecture === '山口県' ? 'selected' : '' }}>山口県</option>
                    <option value="徳島県" {{ $prefecture === '徳島県' ? 'selected' : '' }}>徳島県</option>
                    <option value="香川県" {{ $prefecture === '香川県' ? 'selected' : '' }}>香川県</option>
                    <option value="愛媛県" {{ $prefecture === '愛媛県' ? 'selected' : '' }}>愛媛県</option>
                    <option value="高知県" {{ $prefecture === '高知県' ? 'selected' : '' }}>高知県</option>
                    <option value="福岡県" {{ $prefecture === '福岡県' ? 'selected' : '' }}>福岡県</option>
                    <option value="佐賀県" {{ $prefecture === '佐賀県' ? 'selected' : '' }}>佐賀県</option>
                    <option value="長崎県" {{ $prefecture === '長崎県' ? 'selected' : '' }}>長崎県</option>
                    <option value="熊本県" {{ $prefecture === '熊本県' ? 'selected' : '' }}>熊本県</option>
                    <option value="大分県" {{ $prefecture === '大分県' ? 'selected' : '' }}>大分県</option>
                    <option value="宮崎県" {{ $prefecture === '宮崎県' ? 'selected' : '' }}>宮崎県</option>
                    <option value="鹿児島県" {{ $prefecture === '鹿児島県' ? 'selected' : '' }}>鹿児島県</option>
                    <option value="沖縄県" {{ $prefecture === '沖縄県' ? 'selected' : '' }}>沖縄県</option>
                </select>
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="書店名か住所で検索" class="input input-bordered bg-gray-100" />
                <button type="submit" value="検索" class="btn btn-outline btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
                <button type="button" onclick="resetForm()" class="btn btn-outline">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </form>
        </div>
        <div class="flex justify-center mt-3">
            <a href="{{ route('shops.map') }}" class="btn btn-outline btn-info mb-3 mr-4">MAP一覧</a>
            @auth
                <a href="{{ route('shop.create') }}" class="btn btn-outline btn-success mb-3">書店登録</a>
            @endauth
        </div>
        @auth
            <div class="flex justify-center">
        <div class="sidebar w-48 -translate-x-full transform bg-white p-4 transition-transform duration-150 ease-in md:translate-x-0 md:shadow-md px-4 mb-2">
            <div class="my-4 w-full border-b-4 border-indigo-100 text-center">
                @if(Auth::user()->profile)
                    <h2 class="mb-1">近くの書店</h2>
                    @if ($recommendedShop)
                        <p class="font-mono text-xl font-bold tracking-widest"><a href="{{ route('shop.show', $recommendedShop->id) }}">{{ $recommendedShop->name }}</a></p>
                        <p class="font-mono text-xl font-semibold tracking-widest">{{ $recommendedShop->address }}</p>
                    @else
                        <p class="font-mono text-xl font-semibold tracking-widest">同じ県の書店はありませんでした…</p>
                        <p class="font-mono text-xl font-semibold tracking-widest">一件目を<a href="{{ route('shop.create') }}" class="text-blue-500 underline">登録</a>してみませんか？</p>
                    @endif
                @else
                    <p class="font-mono text-xl font-bold tracking-widest">レコメンド機能を使うには</p>
                    <p class="font-mono text-xl font-semibold tracking-widest"><a href="{{ url('/profile') }}" class="text-blue-500 underline">現在地</a>を登録してください</p>
                @endif
            </div>
            <div class="my-4"></div>
        </div>
    </div>
        @endauth
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
<script>
    // 検索リセット機能
    function resetForm() {
        document.querySelector("input[name='keyword']").value = "";
        document.querySelector("select[name='prefecture']").value = "";
        document.getElementById("searchForm").submit();
    }
</script>