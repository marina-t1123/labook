<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //データ登録許可のカラム指定
    protected $fillable = [
        'user_id',
        'title',
        'comment',
    ];

    //relation
    // public function user()
    // {
    //     return $this->hasMany('App\Models\Post');
    // }

    //function

}
