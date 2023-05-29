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

        setCurrentLocation(defaultLocation)

        // 「現在地へ」ボタンを表示
        const locationButton = document.createElement('button');

        locationButton.textContent = '現在地へ'
        locationButton.classList.add('custom-map-control-button')
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

        locationButton.addEventListener('click', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    let currentLocation = new window.google.maps.LatLng(
                        position.coords.latitude,
                        position.coords.longitude
                    )

                    map = new window.google.maps.Map(document.getElementById('map'), {
                        center: currentLocation,
                        zoom: 14,
                    })

                    setCurrentLocation(currentLocation)

                    createMarker()
                })
            } else {
                alert('現在地を取得できませんでした。')
            }
        });

        const svgMarker = {
            path: "M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
            fillColor: "blue",
            fillOpacity: 0.6,
            strokeWeight: 0,
            rotation: 0,
            scale: 2,
            anchor: new google.maps.Point(0, 20),
        };

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
            animation: google.maps.Animation.DROP,
            icon: {
            fillColor: "#000000",                //塗り潰し色
            fillOpacity: 0.8,                    //塗り潰し透過率
            path: google.maps.SymbolPath.CIRCLE, //円を指定
            scale: 16,                           //円のサイズ
            strokeColor: "#FF0000",              //枠の色
            strokeWeight: 1.0                    //枠の透過率
          },
          label: {
            text: 'You',                           //ラベル文字
            color: '#FFFFFF',                    //文字の色
            fontSize: '10px'                     //文字のサイズ
          }
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
