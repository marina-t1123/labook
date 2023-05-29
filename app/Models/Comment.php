<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'comments';

    //データ登録無許可のカラム指定
    // protected $guarded = [
    //     'id',
    // ];

    //データ登録許可のカラム指定
    protected $fillable = [
        'user_id',
        'post_id',
        'sentence',
    ];

    // relation
    public function post()
    {
        return $this->belongsTo(Post::class);
    }


}
