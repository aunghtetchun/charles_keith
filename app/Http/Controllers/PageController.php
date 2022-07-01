<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::latest("id")->limit(4)->get();
        return view('index',compact('posts'));
    }
    public function catlogDetail($slug){
        $cid=Category::where("slug",$slug)->first();
        $pid=Category::where("parent_id",$cid->parent_id)->get();
        foreach($pid as $p){
            $amount=Post::where("category_id",$p->id)->count();
            $p->amount=$amount;
        }
        $posts=Post::where("category_id",$cid->id)->latest()->get();
        return view('catlog-detail',compact('posts','pid'));
    }

    public function itemDetail($id){
        $post=Post::where("id",$id)->first();
        $colors=Post::where("item_code",$post->item_code)->get();
        return view('item-detail',compact('post','colors'));
    }

    public function search()
    {
        $posts = Post::when(request('keyword'),fn($q)=>$q->search())
            ->latest("id")->get();

        $pid=[];
        return view('catlog-detail',compact('posts','pid'));
    }

    public function about(){
        return view('about');
    }

    public function games(){
        $games = Game::when(request('keyword'), fn($q) => $q->search())
            ->latest("id")
            ->paginate(10)->withQueryString();
        return view('games', compact('games'));
    }

    public function gameDetail($slug)
    {
        $game = Game::where("slug",$slug)->firstOrFail();
        return view('game-detial',compact('game'));
    }


    public function blog(){
        $posts = Post::when(request('keyword'),fn($q)=>$q->search())
            ->latest("id")
            ->paginate(10)->withQueryString();
        return view('blog',compact('posts'));
    }

    public function blogDetail($id){
        return Post::findOrFail($id);
    }
}
