<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Movie::with('category','movie_genre','country','genre')->orderBy('id','DESC')->get();

        $path = public_path()."/json_file/";

        if (!is_dir($path)) {mkdir($path, 0777, true);}
        File::put($path.'movies.json',json_encode($list));

        return view('admin.movie.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        $list = Movie::with('category','country','genre')->orderBy('id', 'DESC')->get();
        return view('admin.movie.form',compact('list','category', 'genre', 'country', 'list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->movie_time = $data['movie_time'];
        $movie->name_eng = $data['name_eng'];
        $movie->phimhot = $data['phimhot'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        

        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }

        
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');


        //thêm img
        $get_img = $request ->file('image');

        $path = 'uploads/movie/';

        if($get_img){
            $get_name_image = $get_img ->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_img->getClientOriginalExtension();
            $get_img -> move($path,$new_image);
        
            $movie->image = $new_image;
        }

        $movie->save();

        //thêm nhiều thể loại cho phim
        $movie->movie_genre()->attach($data['genre']);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
  

        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list = Movie::with('category','country','genre')->orderBy('id', 'DESC')->get();
        $movie =  Movie::find($id);
        $movie_genre = $movie->movie_genre;
        $list_genre = Genre::all();
        return view('admin.movie.form',compact('list','category', 'genre', 'country', 'movie','list_genre', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $movie =  Movie::find($id);
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->movie_time = $data['movie_time'];
        $movie->name_eng = $data['name_eng'];
        $movie->phimhot = $data['phimhot'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        
        // thêm nhiều thể loại phim
        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');

        //thêm img
        $get_img = $request ->file('image');

        $path = 'uploads/movie/';

        if($get_img){
            if(file_exists('uploads/movie/'.$movie->image))
        {
            unlink('uploads/movie/'.$movie->image);
        }else{
            $get_name_image = $get_img ->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_img->getClientOriginalExtension();
            $get_img -> move($path,$new_image);
        
            $movie->image = $new_image;
        }
    }
        $movie->save();


        $movie->movie_genre()->sync($data['genre']);

        return redirect()->route('movie.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image))
        {
            unlink('uploads/movie/'.$movie->image);
        }
        
         // xóa thể loại
 
         Movie_Genre::whereIn('movie_id', [$movie->id])->delete();

        //xóa tập phim thì xóa luôn phim nếu phim hết
            Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie ->delete();
        return redirect()->back();
    }

    public function update_year(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();

    }

    public function update_season(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();

    }

    public function update_tt(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_view']);
        $movie->topview = $data['topview'];
        $movie->save();

    }

    public function show_topview(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('ngaycapnhat', 'DESC')->take(20)->get();
        $output = '';
        foreach($movie as $key => $value){
                if($value->resolution==0){
                $text = 'HD';
                }
            elseif($value->resolution==1){
                $text = 'SD';
            
            }
            elseif($value->resolution==2){

                $text = 'HDCam';
            
            }
            elseif($value->resolution==3){
                $text = 'Cam';
                }
            else{
                $text = 'FullHD';
                }
            
            $output.='<div class="item">
            <a href="'.url('phim/'.$value->slug).'" title="'.$value->title.'">
               <div class="item-link">
                  <img src="'.url('uploads/movie/'.$value ->image).'" class="lazy post-thumb" alt="'.$value->title.'" title="'.$value->title.'" />
                  <span class="is_trailer">'.$text.'</span>
               </div>
               <p class="title">'.$value->title.'</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
               <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
               <span style="width: 0%"></span>
               </span>
            </div>
         </div>';
            }
         echo $output;
         
}
public function show_topview_df(Request $request){
    $data = $request->all();
    $movie = Movie::where('topview',0)->orderBy('ngaycapnhat', 'DESC')->take(20)->get();
    $output = '';
    foreach($movie as $key => $value){
            if($value->resolution==0){
            $text = 'HD';
            }
        elseif($value->resolution==1){
            $text = 'SD';
        
        }
        elseif($value->resolution==2){

            $text = 'HDCam';
        
        }
        elseif($value->resolution==3){
            $text = 'Cam';
            }
        else{
            $text = 'FullHD';
            }
        
        $output.='<div class="item">
        <a href="'.url('phim/'.$value->slug).'" title="'.$value->title.'">
           <div class="item-link">
              <img src="'.url('uploads/movie/'.$value ->image).'" class="lazy post-thumb" alt="'.$value->title.'" title="'.$value->title.'" />
              <span class="is_trailer">'.$text.'</span>
           </div>
           <p class="title">'.$value->title.'</p>
        </a>
        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
        <div style="float: left;">
           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
           <span style="width: 0%"></span>
           </span>
        </div>
     </div>';
        }
     echo $output;
     
}
}
