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
                            <p class="py-2">{{ $shop->description }}</p>
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
                                <a class="btn btn-primary mr-4" href="{{ route('shop.edit', $shop->id) }}">編集</a>
                            </td>
                            <td style="text-align:center">
                                <form action="{{ route('shop.destroy', $shop->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-error ml-4" onclick='return confirm("削除してもよろしいですか？")'>削除</button>
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