<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory,SoftDeletes;

    protected $with = ['currencies'];

    public function currencies(){
        return $this->hasMany(Currency::class);
    }

    public function scopeSearch($q){
        $keyword = request('keyword');
        $q->orWhere("title","like","%$keyword%")
            ->orWhere("description","like","%$keyword%");
        return $q;
    }
}
