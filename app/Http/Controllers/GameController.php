<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $games = Game::when(request('trash'),fn($q)=>$q->onlyTrashed())
            ->when(request('keyword'),fn($q)=>$q->search())
            ->latest("id")
            ->paginate(10);
        return view('game.index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGameRequest $request)
    {
        $game = new Game();
        $game->title = $request->title;
        $game->slug = Str::slug($request->title);
        $game->description = $request->description;
        $game->profile = $request->profile;
        $game->cover = $request->cover;
        $game->save();
        return redirect()->route('game.index')->with('status','Game Create Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        if(request('mode') === "restore"){
            Game::withTrashed()->findOrFail($id)->restore();
            return redirect()->route('game.index',["trash"=>true])->with('status','Game Restore Successful');
        }
        return view('game.show',[
            "game" => Game::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('game.edit',compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGameRequest $request, Game $game)
    {

        $game->title = $request->title;
        $game->slug = Str::slug($request->title);
        $game->description = $request->description;
        $game->profile = $request->profile;
        $game->cover = $request->cover;
        $game->save();
        return redirect()->route('game.index')->with('status','Game Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(request('force_delete')){
            Game::withTrashed()->findOrFail($id)->forceDelete();
            $message = "Game is permanently deleted";
            return redirect()->route('game.index',["trash"=>true])->with('status',$message);

        }

        Game::findOrFail($id)->delete();
        $message = "Game is deleted";
        return redirect()->route('game.index')->with('status',$message);
    }
}
