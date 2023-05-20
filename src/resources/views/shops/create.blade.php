@extends('shops.app')

@section('content')
<div class="text-align-right">
    <form action="{{ route('shop.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 mt-2 mb-2">
                <div class="form-group">
                    <label for="name">書店名</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="書店名を入力してください">
                    @error('name')
                        <span style="color:red;">書店名を20文字以内で入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mt-2 mb-2">
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="住所を入力してください">
                    @error('address')
                        <span style="color:red;">住所を入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mt-2 mb-2">
                <div class="form-group">
                    <label for="description">詳細</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="詳細"></textarea>
                    @error('description')
                    <span style="color:red;">詳細を140文字以内で入力してください</span>
                    @enderror
                </div>
            </div>

            <input style="display:none;" type="text" id="lng" value=""><br>

            <input style="display:none;" type="text" id="lat" value=""><br>


            <div class="col-12 mt-2 mb-2">
                <button type="submit" class="btn btn-primary w-100">登錄</button>
            </div>
        </div>
    </form>
</div>
@endsection