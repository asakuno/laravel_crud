@extends('shops.app')

@section('content')
    <div class="mt-5">
        <div class="flex justify-center">
            <input type="text" id="keyword" class="input input-bordered bg-gray-100" placeholder="地名で検索" />
            <button id="search" class="btn btn-outline btn-secondary" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </button>
        </div>
    </div>
    <div class="mx-5 mt-3 flex justify-center" style="overflow-x: auto;">
      <a href="{{ route('shops.index') }}" class="btn btn-outline btn-info mb-3 mr-4">書店一覧</a>
      @auth
          <a href="{{ route('shop.create') }}" class="btn btn-outline btn-success mb-3">書店登録</a>
      @endauth
    </div>
    <div class="inset-0 flex items-center justify-center">
        <div id="map" style="height: 500px; width: 500px;"></div>
    </div>
    <script>
    let defaultLocation
    let map
    let spotLatLng
    let geocoder
    let currentInfoWindow
    let markerCurrentLocation

    const marker = []
    const infoWindow = []
    const spotData = @json($shops);

    window.initMap = () => {
        defaultLocation = new window.google.maps.LatLng(35.6803997, 139.7690174)

        map = new window.google.maps.Map(document.getElementById('map'), {
          center: defaultLocation,
          zoom: 14,
        })

        createMarker()

        geocoder = new window.google.maps.Geocoder()

        document.getElementById('search').addEventListener('click', function (event) {
            event.preventDefault();

            const inputKeyword = document.getElementById('keyword').value

            geocoder.geocode({ address: inputKeyword }, function (results, status) {
                if (status == 'OK') {
                    if (markerCurrentLocation) {
                        markerCurrentLocation.setVisible(false)
                    }

                    map.setCenter(results[0].geometry.location)
                    setCurrentLocation(results[0].geometry.location)
                } else {
                    alert('該当する結果はありませんでした:' + status)
                }
            })
        })
    }

    function setCurrentLocation(setPlace) {
        markerCurrentLocation = new window.google.maps.Marker({
            position: setPlace,
            map: map,
        })
    }


    function createMarker() {
      for (let i = 0; i < spotData.length; i++) {
        let id = spotData[i]['id']

        spotLatLng = new window.google.maps.LatLng({
          lat: spotData[i]['latitude'],
          lng: spotData[i]['longitude'],
        })

        marker[i] = new window.google.maps.Marker({
          position: spotLatLng,
          map: map,
        })

        infoWindow[i] = new window.google.maps.InfoWindow({
          content: `<a href='/shops/${id}'>${spotData[i]['name']}</a>`,
        })

        marker[i].addListener('click', function () {
          if (currentInfoWindow) {
            currentInfoWindow.close();
          }
          infoWindow[i].open(map, marker[i])
          currentInfoWindow = infoWindow[i]
        });
      }
    }
    </script>
@endsection
