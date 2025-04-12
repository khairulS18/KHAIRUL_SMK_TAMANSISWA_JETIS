<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

    public function ManageGame() {
        $data['games'] = Game::get();

        // dd($data);

        return view('gaming-portal.manage-games', $data);
    }

    public function create()
    {
        return view('gaming-portal.manage-games-form');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:games',
        //     'description' => 'required',
        //     'thumbnail' => 'required|image'
        // ], [
        //     'title.required' => 'Please filled title!',
        //     'title.unique' => 'Title cant same!',
        //     'description.required' => 'Please filled description!',
        //     'thumbnail.required' => 'Please filled thumbnail!',
        //     'thumbnail.image' => 'Thumbnail only image format!'
        // ]);

        $pathThumbnail = public_path() . '/games-images';
        if (!File::exists($pathThumbnail)) {
            File::isDirectory($pathThumbnail) or File::makeDirectory($pathThumbnail, 0777, true, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->thumbnail;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($pathThumbnail, $fileName);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'created_by' => '3', 
            'image' => $pathThumbnail,
        ];

        if (Game::create($data)) {
            return redirect()->route('pages.manage-game.index')->with('success', 'Game Has Been Add!');
        } else {
            return redirect()->route('pages.manage-game.index')->with('error', 'Game Failed To Add!');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['game'] = Game::where('id', $id)->first();

        dd($data);

        return view('gaming-portal.detail-games');
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
    public function destroy($id)
    {
        $game = Game::where('id', $id)->first();

        $game->delete();

        return redirect()->route('pages.manage-game.index');
        //
    }
}
