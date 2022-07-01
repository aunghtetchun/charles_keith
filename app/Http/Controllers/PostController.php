<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::when(request('trash'),fn($q)=>$q->onlyTrashed())
            ->when(request('keyword'),fn($q)=>$q->search())
            ->latest("id")
            ->paginate(10)->withQueryString();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description);
        $post->price = $request->price;
        $post->sale_price=$request->sale_price;
        $post->detail=$request->detail;
        $post->color_name=$request->color_name;
        $post->item_code=$request->item_code;
        $post->user_id = Auth::id();
        $post->category_id = $request->category;

        $newName = uniqid()."_"."photo.".$request->color_photo->extension();

        $thumbnail = Image::make($request->color_photo)->fit(300,300);
        $thumbnail->save(public_path("storage/thumbnail_".$newName));

        $post->color_photo = $newName;
        $post->save();

        return redirect()->route('post.index')->with('status','New Post is added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        if(request('mode') === "restore"){
            Post::withTrashed()->findOrFail($id)->restore();
            return redirect()->route('post.index',["trash"=>true])->with('status','Post Restore Successful');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description);
        $post->price = $request->price;
        $post->sale_price=$request->sale_price;
        $post->detail=$request->detail;
        $post->color_name=$request->color_name;
        $post->item_code=$request->item_code;
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->color_photo){
            $newName = uniqid()."_"."photo.".$request->color_photo->extension();

            $thumbnail = Image::make($request->color_photo)->fit(300,300);
            $thumbnail->save(public_path("storage/thumbnail_".$newName));

            $post->color_photo = $newName;
        }

        $post->update();

        return redirect()->route('post.index')->with('status','Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(request('force_delete')){
            Post::withTrashed()->findOrFail($id)->forceDelete();
            $message = "Post is permanently deleted";
            return redirect()->route('post.index',["trash"=>true])->with('status',$message);

        }

        Post::findOrFail($id)->delete();
        $message = "Post is deleted";
        return redirect()->route('post.index')->with('status',$message);
    }
}
