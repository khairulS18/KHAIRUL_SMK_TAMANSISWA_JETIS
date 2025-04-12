<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        

        $data['games'] = Game::get();
        $data['scores'] = Score::withCount('gameversion')->get();

        // dd($data['scores']);

        // $data['scores'] = $users->scores()->get(); 
        // $data['games'] = $query->get();

        return view('gaming-portal.discover-games', $data);
        //
    }

    // public function ListGames() {
    //     $query = Game::query()->with('user');

    //     $data['games'] = $query->paginate(10);

    //     return view('development-portal.games', $data);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('development-portal.games-form');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
