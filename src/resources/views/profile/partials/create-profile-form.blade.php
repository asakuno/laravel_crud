<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('現在地') }}
        </h2>
    </header>
    @if(!$profile)
        <form method="post" action="{{ route('profile.store') }}" class="mt-6 space-y-6">
            @csrf

            <div>
                <x-input-label for="current_address" :value="__('現在地')" />
                <select id="current_address" name="current_address" class="mt-1 block w-full" required autocomplete="current-address">
                    <option value="">選択してください</option>
                    <option value="岩手県">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('current_address')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('保存') }}</x-primary-button>
            </div>
        </form>
    @else
        <form method="post" action="{{ route('profile.profile_update') }}" class="mt-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="current_address" :value="__('現在地')" />
                <select id="current_address" name="current_address" class="mt-1 block w-full" required autocomplete="current-address">
                    <option value="">選択</option>
                    <option value="北海道" {{ old('current_address', $user->profile->current_address) === '北海道' ? 'selected' : '' }}>北海道</option>
                    <option value="青森県"{{ old('current_address', $user->profile->current_address) === '青森県' ? 'selected' : '' }}>青森県</option>
                    <option value="岩手県" {{ old('current_address', $user->profile->current_address) === '岩手県' ? 'selected' : '' }}>岩手県</option>
                    <option value="宮城県" {{ old('current_address', $user->profile->current_address) === '宮城県' ? 'selected' : '' }}>宮城県</option>
                    <option value="秋田県" {{ old('current_address', $user->profile->current_address) === '秋田県' ? 'selected' : '' }}>秋田県</option>
                    <option value="山形県" {{ old('current_address', $user->profile->current_address) === '山形県' ? 'selected' : '' }}>山形県</option>
                    <option value="福島県" {{ old('current_address', $user->profile->current_address) === '福島県' ? 'selected' : '' }}>福島県</option>
                    <option value="茨城県" {{ old('current_address', $user->profile->current_address) === '茨城県' ? 'selected' : '' }}>茨城県</option>
                    <option value="栃木県" {{ old('current_address', $user->profile->current_address) === '栃木県' ? 'selected' : '' }}>栃木県</option>
                    <option value="群馬県" {{ old('current_address', $user->profile->current_address) === '群馬県' ? 'selected' : '' }}>群馬県</option>
                    <option value="埼玉県" {{ old('current_address', $user->profile->current_address) === '埼玉県' ? 'selected' : '' }}>埼玉県</option>
                    <option value="千葉県" {{ old('current_address', $user->profile->current_address) === '千葉県' ? 'selected' : '' }}>千葉県</option>
                    <option value="東京都" {{ old('current_address', $user->profile->current_address) === '東京都' ? 'selected' : '' }}>東京都</option>
                    <option value="神奈川県" {{ old('current_address', $user->profile->current_address) === '神奈川県' ? 'selected' : '' }}>神奈川県</option>
                    <option value="新潟県" {{ old('current_address', $user->profile->current_address) === '新潟県' ? 'selected' : '' }}>新潟県</option>
                    <option value="富山県" {{ old('current_address', $user->profile->current_address) === '富山県' ? 'selected' : '' }}>富山県</option>
                    <option value="石川県" {{ old('current_address', $user->profile->current_address) === '石川県' ? 'selected' : '' }}>石川県</option>
                    <option value="福井県" {{ old('current_address', $user->profile->current_address) === '福井県' ? 'selected' : '' }}>福井県</option>
                    <option value="山梨県" {{ old('current_address', $user->profile->current_address) === '山梨県' ? 'selected' : '' }}>山梨県</option>
                    <option value="長野県" {{ old('current_address', $user->profile->current_address) === '長野県' ? 'selected' : '' }}>長野県</option>
                    <option value="岐阜県" {{ old('current_address', $user->profile->current_address) === '岐阜県' ? 'selected' : '' }}>岐阜県</option>
                    <option value="静岡県" {{ old('current_address', $user->profile->current_address) === '静岡県' ? 'selected' : '' }}>静岡県</option>
                    <option value="愛知県" {{ old('current_address', $user->profile->current_address) === '愛知県' ? 'selected' : '' }}>愛知県</option>
                    <option value="三重県" {{ old('current_address', $user->profile->current_address) === '三重県' ? 'selected' : '' }}>三重県</option>
                    <option value="滋賀県" {{ old('current_address', $user->profile->current_address) === '滋賀県' ? 'selected' : '' }}>滋賀県</option>
                    <option value="京都府" {{ old('current_address', $user->profile->current_address) === '京都府' ? 'selected' : '' }}>京都府</option>
                    <option value="大阪府" {{ old('current_address', $user->profile->current_address) === '大阪府' ? 'selected' : '' }}>大阪府</option>
                    <option value="兵庫県" {{ old('current_address', $user->profile->current_address) === '兵庫県' ? 'selected' : '' }}>兵庫県</option>
                    <option value="奈良県" {{ old('current_address', $user->profile->current_address) === '奈良県' ? 'selected' : '' }}>奈良県</option>
                    <option value="和歌山県" {{ old('current_address', $user->profile->current_address) === '和歌山県' ? 'selected' : '' }}>和歌山県</option>
                    <option value="鳥取県" {{ old('current_address', $user->profile->current_address) === '鳥取県' ? 'selected' : '' }}>鳥取県</option>
                    <option value="島根県" {{ old('current_address', $user->profile->current_address) === '島根県' ? 'selected' : '' }}>島根県</option>
                    <option value="岡山県" {{ old('current_address', $user->profile->current_address) === '岡山県' ? 'selected' : '' }}>岡山県</option>
                    <option value="広島県" {{ old('current_address', $user->profile->current_address) === '広島県' ? 'selected' : '' }}>広島県</option>
                    <option value="山口県" {{ old('current_address', $user->profile->current_address) === '山口県' ? 'selected' : '' }}>山口県</option>
                    <option value="徳島県" {{ old('current_address', $user->profile->current_address) === '徳島県' ? 'selected' : '' }}>徳島県</option>
                    <option value="香川県" {{ old('current_address', $user->profile->current_address) === '香川県' ? 'selected' : '' }}>香川県</option>
                    <option value="愛媛県" {{ old('current_address', $user->profile->current_address) === '愛媛県' ? 'selected' : '' }}>愛媛県</option>
                    <option value="高知県" {{ old('current_address', $user->profile->current_address) === '高知県' ? 'selected' : '' }}>高知県</option>
                    <option value="福岡県" {{ old('current_address', $user->profile->current_address) === '福岡県' ? 'selected' : '' }}>福岡県</option>
                    <option value="佐賀県" {{ old('current_address', $user->profile->current_address) === '佐賀県' ? 'selected' : '' }}>佐賀県</option>
                    <option value="長崎県" {{ old('current_address', $user->profile->current_address) === '長崎県' ? 'selected' : '' }}>長崎県</option>
                    <option value="熊本県" {{ old('current_address', $user->profile->current_address) === '熊本県' ? 'selected' : '' }}>熊本県</option>
                    <option value="大分県" {{ old('current_address', $user->profile->current_address) === '大分県' ? 'selected' : '' }}>大分県</option>
                    <option value="宮崎県" {{ old('current_address', $user->profile->current_address) === '宮崎県' ? 'selected' : '' }}>宮崎県</option>
                    <option value="鹿児島県" {{ old('current_address', $user->profile->current_address) === '鹿児島県' ? 'selected' : '' }}>鹿児島県</option>
                    <option value="沖縄県" {{ old('current_address', $user->profile->current_address) === '沖縄県' ? 'selected' : '' }}>沖縄県</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('current_address')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('保存') }}</x-primary-button>
            </div>
        </form>
    @endif
</section>