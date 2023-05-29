<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'posts';

    //データ登録許可のカラム指定
    protected $fillable = [
        'user_id',
        'title',
        'comment',
    ];

    //relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //function

}
