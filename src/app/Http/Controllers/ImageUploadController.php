<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->file('image')->extension();  

        $path = Storage::disk('s3')->put('images', $request->file('image'));
        $imagePath = Storage::disk('s3')->url($path);

        // 以下のコードで画像のパスをデータベースに保存します
        $image = new Image;
        $image->image_path = $imagePath;
        $image->shop_id = $request->input('shop_id');
        $image->save();

        return back()
            ->with('success', 'You have successfully uploaded the image.')
            ->with('image', $imagePath);
    }

}