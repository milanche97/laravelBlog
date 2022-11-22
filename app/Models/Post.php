<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body'];            //bez ovog se pravi greska, zbog zabrane da neko sa strane popunjava sta hoce od polja
    protected $table = 'post';
    public static function published(){
        return self::where('published', 1)->get();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addComment(){
        $this->comments()->create(['body'=> request('body')]);
    }
}
