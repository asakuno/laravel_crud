<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'description',
        'latitude',
        'longitude'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search !== null) {
            // 検索文字列を半角文字に置き換え
            $search_convert = mb_convert_kana($search, 's');
            // 検索文字列を空白で分割
            $search_split = preg_split('/[\s]+/', $search_convert);

            foreach ($search_split as $keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%'); // nameカラムを部分一致で検索条件に追加
            }
                    
            return $query;
        }
    }

}