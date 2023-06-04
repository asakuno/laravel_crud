@extends('shops.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <a class="btn btn-outline mb-2" href="{{ url('/shops') }}">戻る</a>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h1 class="text-3xl font-bold underline">書店登録</h1>
        </div>
        <div class="text-align-right">
            <form action="{{ route('shop.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12 mt-2 mb-2">
                        <div class="form-group">
                            <label for="name">書店名</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="書店名を入力してください" value="{{ old('name') }}">
                            @error('name')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mt-2 mb-2">
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="住所を入力してください" value="{{ old('address') }}">
                            @error('address')
                                <span style="color:red;">{{ $message }}</span><br>
                            @enderror
                            <span style="color:red;" name="validate-address" id="validate-address"></span>
                        </div>
                    </div>
                    <div id="map"></div>

                    <div class="col-12 mt-2 mb-2">
                        <div class="form-group">
                            <label for="description">詳細</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="詳細を140文字以内で入力してください">{{ old('description') }}</textarea>
                            @error('description')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <input style="display:none;" type="text" id="latitude" name="latitude" value=""><br>

                    <input style="display:none;" type="text" id="longitude" name="longitude" value=""><br>


                    <div class="col-12 mt-2 mb-2">
                        <button type="submit" id="submit-btn" class="btn btn-primary w-100" disabled>登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function ChangeAddress() {
    // geocoderを利用して位置情報を取得
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById("address").value;
    var name = document.getElementById("name").value;

    geocoder.geocode({ 'address': address }, function(results, status) {
        // 住所が存在する場合
        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();

            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;
            document.getElementById("validate-address").textContent = "";
        } else {
            alert('存在しない住所です ' + status); // 住所が存在しない場合
            document.getElementById("validate-address").textContent = "存在する住所を入れてください。";
        }
    });

    if (name && address && latitude && longitude) {
        document.getElementById("submit-btn").disabled = false;
    } else {
        document.getElementById("submit-btn").disabled = true;
    }
}

function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15, // 地図の尺度
        mapTypeId: google.maps.MapTypeId.ROADMAP, // マップタイプ（ROADMAPはデフォルトのもの）
    });
}

// 住所フィールドの値が変更されたときにChangeAddress()を呼び出す
document.getElementById("address").addEventListener("change", ChangeAddress);
</script>
@endsection