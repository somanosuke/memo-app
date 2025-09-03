<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    //テーブル名
    protected $table = 'memos';
    //可変項目
    protected $fillable = [
        'content',
    ];
}
