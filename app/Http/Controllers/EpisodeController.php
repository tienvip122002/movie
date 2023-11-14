<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_episode = Episode::with('movie')->orderBy('movie_id', 'DESC')->get();
        return view('admin.episode.index', compact('list_episode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title','id');
        return view('admin.episode.form', compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $ep = new Episode();
        $ep->movie_id = $data['movie_id'];
        $ep->link_movie = $data['link_movie'];
        $ep->episode = $data['episode'];
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title','id');
        $episode = Episode::find($id);
        return view('admin.episode.form', compact('episode','list_movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $ep =  Episode::find($id);
        $ep->movie_id = $data['movie_id'];
        $ep->link_movie = $data['link_movie'];
        // $ep->episode = $data['episode'];
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->route('episode.index');
    }

    public function select_movie(){
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output ='<option>------Chọn tập phim------</option>';

        for($i=1; $i<=$movie->sotap; $i++){
            $output.='<option value="'.$i.'">'.$i.'</option>';
        }

        echo $output;
    }

    public function add_ep($id){
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie')->where('movie_id',$id)->orderBy('episode', 'DESC')->get();
        return view('admin.episode.add_episode', compact('list_episode','movie'));
    }
}
