<div class="btm-nav">
    <a href="{{ url('/') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-house" style="color: #000000;"></i>
        <span class="btm-nav-label">ホーム</span>
    </a>
    <a href="{{ route('shop.create') }}" class="bg-orange-200 hover:bg-orange-300">
    <i class="fa-solid fa-book"></i>
        <span class="btm-nav-label">書店登録</span>
    </a>
    <a href="{{ route('register') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-user-plus"></i>
        <span class="btm-nav-label">新規登録</span>
    </a>
</div>