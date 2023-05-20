@extends('shops.app')

@section('content')
    <div class="mx-5 my-5 bg-white" style="overflow-x: auto;">
    <a href="{{ route('shop.create') }}" class="btn btn-outline btn-success mb-3">書店登録</a>
        <table class="table table-bordered table-responsive">
            <tr>
                <th>No</th>
                <th>名前</th>
                <th>住所</th>
                <th>緯度</th>
                <th>経度</th>
            </tr>
            @foreach ($shops as $shop)
                <tr>
                    <td style="text-align:right">{{ $shop->id }}</td>
                    <td style="text-align:left">{{ $shop->name }}</td>
                    <td style="text-align:right">{{ $shop->address }}</td>
                    <td style="text-align:right">{{ $shop->latitude }}</td>
                    <td style="text-align:left">{{ $shop->longitude }}</td>
                </tr>
            @endforeach
        </table>
        {!! $shops->links('pagination::bootstrap-5') !!}
    </div>
@endsection