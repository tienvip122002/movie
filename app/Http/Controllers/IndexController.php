<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search()
    {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
            
            $movie = Movie::withCount('episode')->where('title','LIKE','%'. $search.'%' )->orderBy('ngaycapnhat','DESC')->paginate(40);
            $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
            return view('pages.search',compact('category', 'genre', 'country','search', 'movie', 'phimhot_sidebar'));
        }
        else{
            return redirect()->to('/');
        }
        
    }


    public function home()
    {
        $phimhot = Movie::withCount('episode')->where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->get();
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home = Category::with(['movie'=> function($q) {$q->withCount('episode');}])->orderBy('id', 'DESC')->where('status', 1)->get();
        return view('pages.home',compact('category', 'genre', 'country', 'category_home', 'phimhot', 'phimhot_sidebar'));
    }

    public function category($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        return view('pages.category',compact('category', 'genre', 'country','cate_slug', 'movie', 'phimhot_sidebar'));
    }
    public function year($year)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('ngaycapnhat','DESC')->paginate(40);
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        return view('pages.year',compact('category', 'genre', 'country','year', 'movie', 'phimhot_sidebar'));
    }
    public function tag($tag)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE' ,'%'.$tag.'%')->orderBy('ngaycapnhat','DESC')->paginate(40);
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        return view('pages.tag',compact('category', 'genre', 'country','tag', 'movie', 'phimhot_sidebar'));
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();

        // nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $value){
            $many_genre[] = $value ->movie_id;
        }

        $movie = Movie::withCount('episode')->whereIn('id', $many_genre)->orderBy('ngaycapnhat','DESC')->paginate(40);

        return view('pages.genre',compact('category', 'genre', 'country','genre_slug', 'movie', 'phimhot_sidebar'));
    }
    public function country($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::withCount('episode')->where('country_id', $country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        return view('pages.country',compact('category', 'genre', 'country','country_slug', 'movie', 'phimhot_sidebar'));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::where('status', 1)->where('slug', $slug)->first();
        $movie_lienquan = Movie::where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        $episode_tapdau = Episode::where('movie_id', $movie->id)->orderBy('episode','ASC')->take(1)->first();
        //lấy ra 3 tập gần nhất
        $episode = Episode::where('movie_id', $movie->id)->orderBy('episode','DESC')->take(3)->get();
        //lấy ra all tập count
        $episode_current = Episode::where('movie_id', $movie->id)->get();
        $episode_current_all =  $episode_current->count();

        $check_episode = $episode_current;


       

        return view('pages.movie',compact('category', 'genre', 'country', 'movie', 'movie_lienquan', 'phimhot_sidebar',
         'episode','episode_tapdau','episode_current','episode_current_all','check_episode'));
    }
    public function watch($slug,$tap)
    {
        if(isset($tap)){
            $tapphim = $tap;
        }else{
            $tapphim = 1;
        }
        $tapphim = substr($tap, 4,1);
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category','country','genre','movie_genre','episode')->where('status', 1)->where('slug', $slug)->first();
        
        $movie_lienquan = Movie::where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        $episode = Episode::where('movie_id', $movie->id)->where('episode',$tapphim)->first();
        $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
        // return response()->json($movie);
        return view('pages.watch',compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar','episode','tapphim','movie_lienquan'));
    }
    public function episode()
    {
        return view('pages.episode');
    }


    public function loc()
    {
        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];
        if ($sapxep == '' && $genre_get=='' && $country_get=='' && $year_get=='')
        {
        return redirect()->back();  
        }else{
            $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();

            $phimhot_sidebar = Movie::where('phimhot', 1)->where('status', 1)->orderBy('ngaycapnhat','DESC')->take('15')->get();
            // $movie = Movie::with('country','genre','movie_genre')->withCount('episode');
            // if($genre_get){
            //     $movie = $movie->where('genre_id','=',$genre_get);
            // }elseif($country_get){
            //     $movie = $movie->where('country_id','=',$country_get );
            // }elseif($year_get){
            //     $movie = $movie->where('year','=',$year_get );
            // }else{
            //     $movie = $movie ->orderBy('ngaycapnhat','DESC')->paginate(40);

            // }
            // $movie = $movie ->orderBy('ngaycapnhat','DESC')->paginate(40);
            $movie = Movie::withCount('episode')->orwhere('genre_id',$genre_get)->orwhere('country_id',$country_get )->orwhere('year',$year_get )->orderBy('ngaycapnhat','DESC')->paginate(40);
            return view('pages.locphim',compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar'));
        }
        
    }
  
}
