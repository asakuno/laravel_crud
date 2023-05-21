@extends('shops.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
<a class="btn btn-success" href="{{ url('/shops') }}?page={{ $page_id }}">戻る</a>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h1 class="text-3xl font-bold underline">書店詳細</h1>
        </div>
        <div class="text-align-right">
            <div class="row">
                <div class="col-12 mt-2 mb-2">
                    <div class="form-group">
                        <label for="name">書店名</label>
                        <p>{{ $shop->name }}</p>
                    </div>
                </div>

                <div class="col-12 mt-2 mb-2">
                    <div class="form-group">
                        <label for="address">住所</label>
                        <p>{{ $shop->address }}</p>
                    </div>
                </div>

                <div class="col-12 mt-2 mb-2">
                    <div class="form-group">
                        <label for="description">詳細</label>
                        <p>{{ $shop->description }}</p>
                    </div>
                </div>

                <div class="col-12 mt-2 mb-2">
                    <div class="form-group">
                        <label for="latitude">緯度</label>
                        <p>{{ $shop->latitude }}</p>
                    </div>
                </div>
                <div class="col-12 mt-2 mb-2">
                    <div class="form-group">
                        <label for="longitude">詳細</label>
                        <p>{{ $shop->longitude }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection