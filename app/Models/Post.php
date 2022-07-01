<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use HasFactory,SoftDeletes;

    protected $with = ["category","user","photo","stock"];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function photo(){
        return $this->hasMany(Photo::class);
    }
    public function stock(){
        return $this->hasMany(Stock::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($q){
        $keyword = request('keyword');
        $q->orWhere("title","like","%$keyword%")
            ->orWhere("description","like","%$keyword%");
        return $q;
    }

}
