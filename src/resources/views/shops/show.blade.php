@extends('shops.app')

@section('content')
    <div class="max-w-md mx-auto mt-10">
        <a class="btn btn-success" href="{{ url('/shops') }}?page={{ $page_id }}">戻る</a>
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