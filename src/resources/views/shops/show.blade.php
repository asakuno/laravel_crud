@extends('shops.app')

@section('content')
    <div class="max-w-md mx-auto mt-10">
        <a class="btn btn-outline mb-2" href="{{ url('/shops') }}?page={{ $page_id }}">戻る</a>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="text-align-right">
                <div class="row">
                    <div class="col-12 mt-2 mb-2">
                        <div class="flex relative items-center text-lg">
                            <p class="font-bold tracking-wider">{{ $shop->name }}</p>
                        </div>
                    </div>

                    <div class="col-12 mt-2 mb-2">
                        <div class="mb-3">
                            <label for="description" class="font-bold">詳細</label>
                            @if($shop->description)
                                <p class="py-2">{{ $shop->description }}</p>
                            @else
                                <p class="py-2">詳細が登録されていません</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mt-2 mb-2 pb-5 border-y-2 border-gray-200">
                        <div class="mb-3 py-2">
                            <label for="address" class="font-bold">住所</label>
                            <p class="py-1">{{ $shop->address }}</p>
                        </div>
                        <div id="map" style="height: 300px; width: 380px;"></div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::id() === $shop->user_id)
                        <div class="flex justify-center mt-2 mb-2 pb-3 border-b-2 border-gray-200">
                            <td style="text-align:center">
                                <a class="btn btn-outline btn-primary mr-4" href="{{ route('shop.edit', $shop->id) }}">編集</a>
                            </td>
                            <td style="text-align:center">
                                <form action="{{ route('shop.destroy', $shop->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline btn-error ml-4" onclick='return confirm("削除してもよろしいですか？")'>削除</button>
                                </form>
                            </td>
                        </div>
                    @endif
                    <div class="col-12 mt-2 mb-2 pb-2 border-b-2 border-gray-200">
                        @if ($shop->image && $shop->image->image_path)
                            <img src="{{ url($shop->image->image_path) }}">
                        @else
                            <img src="{{ url('/images/no_image.jpg') }}">
                        @endif
                        @auth
                            @if(\Illuminate\Support\Facades\Auth::id() === $shop->user_id)
                                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex justify-center mt-4">
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                        <input type="file" name="image" class="file-input file-input-bordered file-input-success w-full max-w-xs"></br>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                        <button type="submit" class="btn btn-outline btn-success">アップロード</button>
                                    </div>
                                </form>
                            @endif
                        @endauth
                    </div>
                    @auth
                        <div class="col-12 mt-2 mb-2 pb-2 border-b-2 border-gray-200">
                            <form action="{{ route('comment.store', $shop->id) }}" method="POST">
                                @csrf
                                <input value="{{ $shop->id }}" type="hidden" name="shop_id" />
                                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                                <div class="flex flex-col">
                                <textarea class="w-full textarea textarea-secondary" placeholder="コメントを140文字以内で入力してください" autocomplete="off" type="text" name="comment"></textarea>
                                @error('comment')
                                    <span class="w-full mt-1" style="color:red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="flex justify-end mt-2">
                                    <button class="btn btn-outline btn-success">送信</button>
                                </div>
                            </form>
                        </div>
                    @endauth
                    <div class="col-12 mt-2 mb-2 pb-2 border-b-2 border-gray-200">
                        @if($shop->comments)
                            @foreach($shop->comments as $comment)
                                <div class="bg-white shadow rounded-lg p-4 my-3">
                                    <div class="flex items-center mb-4">
                                        <div class="ml-2">
                                            <div class="h-4 w-24">
                                                {{ $comment->user->name }}
                                            </div>
                                            <!--<div class="h-2 w-16 bg-gray-200 mt-1"></div> -->
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-2">
                                        <div class="h-18 overflow-hidden">
                                            <p class="text-sm">{{ $comment->comment }}</p>
                                        </div>
                                        <div class="flex justify-end">
                                            @if(\Illuminate\Support\Facades\Auth::id() === $comment->user_id)
                                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                    <button onclick='return confirm("削除してもよろしいですか？")'>
                                                        <i class="fas fa-trash-alt" style="color: #e00652;"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function initMap() {
    const mySpot = { lat: {{ $shop->latitude }}, lng: {{ $shop->longitude }} };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: mySpot,
    });
    const marker = new google.maps.Marker({
        position: mySpot,
        map: map,
    });
}

window.initMap = initMap;
</script>
@endsection