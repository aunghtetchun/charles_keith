<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Resources\PhotoResource;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $photos = Photo::latest("id")->paginate(36);
        return PhotoResource::collection($photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $photos = Photo::latest("id")->paginate(36)->through(function($photo){
            $photo->thumbnail = asset('storage/thumbnail_'.$photo->name);
            $photo->md = asset('storage/md_'.$photo->name);
            $photo->lg = asset('storage/lg_'.$photo->name);
            return $photo;
        });

        $posts = Post::latest()->get();
        return view('photo.create',compact('photos','posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePhotoRequest $request)
    {
        foreach($request->file('upload') as $image)
        {
            $newName = uniqid()."_"."photo.".$image->extension();

            $thumbnail = Image::make($image)->fit(300,300);
            $thumbnail->save(public_path("storage/thumbnail_".$newName));

            $md = Image::make($image)->resize(900, null, fn($constraint)=>$constraint->aspectRatio());
            $md->save(public_path("storage/md_".$newName));

            $lg = Image::make($image)->resize(1500, null,fn($constraint)=>$constraint->aspectRatio());
            $lg->save(public_path("storage/lg_".$newName));

            $photo = new Photo();
            $photo->name = $newName;
            $photo->post_id=$request->post;
            $photo->save();
        }

        return redirect()->route('photo.create')->with('status','Photo Upload Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Photo $photo)
    {
        Storage::delete('public/thumbnail_'.$photo->name);
        Storage::delete('public/md_'.$photo->name);
        Storage::delete('public/lg_'.$photo->name);
        $photo->delete();
        return redirect()->route('photo.create')->with('status','Photo delete Successfully');
    }
}
