<div class="btm-nav">
    <a href="{{ url('/') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-house" style="color: #000000;"></i>
        <span class="btm-nav-label">ホーム</span>
    </a>
    <a href="{{ route('shop.create') }}" class="bg-orange-200 hover:bg-orange-300">
    <i class="fa-solid fa-book"></i>
        <span class="btm-nav-label">書店登録</span>
    </a>
    <a href="{{ route('shops.map') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-map-location-dot"></i>
        <span class="btm-nav-label">一覧マップ</span>
    </a>
</div>