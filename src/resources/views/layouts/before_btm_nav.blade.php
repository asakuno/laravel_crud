<div class="btm-nav">
    <a href="{{ url('/') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-house" style="color: #000000;"></i>
        <span class="btm-nav-label">ホーム</span>
    </a>
    <a href="{{ route('login') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-right-to-bracket" style="color: #050505;"></i>
        <span class="btm-nav-label">ログイン</span>
    </a>
    <a href="{{ route('register') }}" class="bg-orange-200 hover:bg-orange-300">
        <i class="fa-solid fa-user-plus"></i>
        <span class="btm-nav-label">新規登録</span>
    </a>
</div>