<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Slider, Artist, Language, Audio, Vedio, Album,
    AudioAlbum, VedioAlbum,Audio_ratings, Comment, Gnere, Vedio_ratings};


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Slider::all();
        dd($data);
        exit();
        $Language = Language::orderBy('id', 'DESC')->get();
        if (session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $featured = Artist::all()->where('language_id', '=', $lang_session)
        ->where('status', '=', 1)
        ->where('featured', '=', 1);
        $audio = Audio::all()->where('language_id', '=', $lang_session)
        ->where('status', '=', 1)
        ->where('feattrendingred', '=', 1);
        return View('frontend.home', compact('data', 'featured', 'Language','audio'))->with(['sliders' => $data]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  adminnhome
    public function adminHome(Request $req)
    {
        if (session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $data = Slider::all();
        $featured = Artist::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1);
        $Language = Language::orderBy('id', 'DESC')->get();
        $audio = Audio::all()->where('language_id', '=', $lang_session)
        ->where('status', '=', 1)
        ->where('trending', '=', 1);
        $audioalbum = Album::all()->where('language_id', '=', $lang_session)
        ->where('status', '=', 1)->where('category','=','audio');
        return View('frontend.home', compact('data', 'featured', 'Language','audio','audioalbum'))->with(['sliders' => $data]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    //  Home
    public function home(Request $req)
    {
        if ($req->session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $data = Slider::all();
        $featured = Artist::where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1)->take(6)->get();
        $Language = Language::orderBy('id', 'DESC')->get();
        $audio = Audio::all()->where('language_id', '=', $lang_session)
        ->where('status', '=', 1)
        ->where('trending', '=', 1);
        $audioalbum=Album::where('category','=','audio')
        ->where('status', '=', 1)->get();
        return View('frontend.home', compact('data', 'featured', 'Language','audio','audioalbum'))->with(['sliders' => $data]);
    }

    // Language
    public function language(Request $req)
    {
        $lang = $req->lang;
        $req->session()->put('name', $lang);
        $req->session()->save();
        return back();
    }

    // Artists Playlist View Freontend
    public function view(Request $req)
    {
        if ($req->session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $Language = Language::orderBy('id', 'DESC')->get();

        $data = Artist::where('artists.id', $req->id)->get();
        $audio = Audio::where('artist_id', $req->id)->get();
        $vedio = Vedio::where('artist_id', $req->id)->get();
// $track=Audio::where('artist_id', $req->id)->pluck('id');
//         // dd($audio);
//         $rating=Audio_ratings::where('track_id',$track);
//     $rating_sum=Audio_ratings::where('track_id',$track)->sum('stars_rated');
//     if($rating->count()>0){
//         $rating_value=$rating_sum/$rating->count();
//     }
//     else{
//         $rating_value=0;
//     }
        $count = 1;
        return view('frontend.artist.view', compact('data', 'count', 'audio',
        'Language','vedio',
        // 'rating','rating_value'
        ))->with(['artist' => $data]);
    }
  // Artists Playlist View Freontend
  public function gnereview(Request $req)
  {
      if ($req->session()->has('name')) {

          $lang_session = session()->get('name');
      } else {
          $lang_session = 1;
      }
      $Language = Language::orderBy('id', 'DESC')->get();

      $data = Gnere::where('gneres.id', $req->id)->get();
      $audio = Audio::where('gnere_id', $req->id)->get();
      $vedio = Vedio::where('gnere_id', $req->id)->get();

//       $rating=Audio_ratings::where('track_id',$req->id);
//   $rating_sum=Audio_ratings::where('track_id',$req->id)->sum('stars_rated');
//   if($rating->count()>0){
//       $rating_value=$rating_sum/$rating->count();
//   }
//   else{
//       $rating_value=0;
//   }
      $count = 1;
      return view('frontend.gnere.view', compact('data', 'count', 'audio','Language','vedio',
    //   'rating','rating_value'
      ))->with(['artist' => $data]);
  }



    // frontend Tracks
    public function track(Request $req)
    {
        if ($req->session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $Language = Language::orderBy('id', 'DESC')->get();
        $featured = Audio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1);
        $trending = Audio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('trending', '=', 1);
        $recommended = Audio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('recommended', '=', 1);
        $top = Audio::latest()->take(5)->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1)
            ->where('trending', '=', 1)
            ->where('recommended', '=', 1)->get();

        $featured_v = Vedio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1);
        $trending_v = Vedio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('trending', '=', 1);
        $recommended_v = Vedio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('recommended', '=', 1);
        $top_v = Vedio::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1)
            ->where('trending', '=', 1)
            ->where('recommended', '=', 1);

            $artist=Artist::all();
        return view("frontend.pages.track",
        compact('featured', 'trending', 'recommended', 'top','artist',
        'featured_v', 'trending_v', 'recommended_v', 'top_v', 'Language'));
    }
    //Frontend Albums

    public function album(Request $req)
    {
        if ($req->session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $Language = Language::orderBy('id', 'DESC')->get();
        // $audioalbum = AudioAlbum::all()->where('language_id', '=', $lang_session);
        $featured=Album::all()
        ->where('featured', '=', 1)
        ->where('status', '=', 1)->where('category','=','audio');
        $featured_v=Album::all()
        ->where('featured', '=', 1)
        ->where('status', '=', 1)->where('category','=','vedio');

        return view("frontend.pages.album", compact('Language','featured','featured_v'))->with(['album' => $featured]);;
    }

    // Frontend Artists
    public function artist(Request $req)
    {
        if ($req->session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $audio=Audio::distinct()->get(['artist_id']);
        $test=Audio::all();
        // foreach($test as $test){

        //     if(Artist::where('id',$test->artist_id)){
        //         $artist=Artist::where('id',$test->artist_id);
        //         $artist->status=0;
        //         $artist->save();

        //     }
        // }
        $Language = Language::orderBy('id', 'DESC')->get();

        $featured = Artist::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1);
        $trending = Artist::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('trending', '=', 1);
        $recommended = Artist::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('recommended', '=', 1);
        $top = Artist::all()->where('language_id', '=', $lang_session)
            ->where('status', '=', 1)
            ->where('featured', '=', 1)
            ->where('trending', '=', 1)
            ->where('recommended', '=', 1);

        return view("frontend.pages.artist", compact('featured', 'trending', 'recommended', 'top', 'audio','Language'));
    }

    // VedioPlayer
public function playvedio(Request $req)
{ if ($req->session()->has('name')) {

    $lang_session = session()->get('name');
} else {
    $lang_session = 1;
}
$Language = Language::orderBy('id', 'DESC')->get();
    $data = Vedio::where('id',$req->id)->first();;
    $rating=Vedio_ratings::where('track_id',$req->id);
    $rating_sum=Vedio_ratings::where('track_id',$req->id)->sum('stars_rated');
    if($rating->count()>0){
        $rating_value=$rating_sum/$rating->count();
    }
    else{
        $rating_value=0;
    }
    return View("frontend.playvedio", compact('data','Language','rating','rating_value'))->with(['vedioes' => $data]);


}
// playaudio
public function playaudio(Request $req)
{ if ($req->session()->has('name')) {

    $lang_session = session()->get('name');
} else {
    $lang_session = 1;
}
$Language = Language::orderBy('id', 'DESC')->get();
    $data =Audio::where('id', $req->id)->first();
//     $track=Comment::where('track_id',$req->id)->with('user:id,name','comments.replies',
//     'user:id,name')->first();
// dd($track);
    $rating=Audio_ratings::where('track_id',$req->id);
    $rating_sum=Audio_ratings::where('track_id',$req->id)->sum('stars_rated');
    if($rating->count()>0){
        $rating_value=$rating_sum/$rating->count();
    }
    else{
        $rating_value=0;
    }
    $artist=Artist::all();
    return View("frontend.playaudio", compact('data','Language','artist','rating','rating_value'))
    ->with(['audioes' => $data]);


}
// albumview
public function albumviewaudio(Request $req)
{ if ($req->session()->has('name')) {

    $lang_session = session()->get('name');
} else {
    $lang_session = 1;
}
$Language = Language::orderBy('id', 'DESC')->get();
$audio =  AudioAlbum::join('albums', 'albums.id', 'audioalbums.album_id')
->join('languages', 'languages.id', 'audioalbums.language_id')
->join('audioes', 'audioes.id', 'audioalbums.audio_id')
->select(
    'audioalbums.*',
    'languages.name as languagename',
    'albums.albumimage as albumimage',
    'albums.name as albumname',
    'audioes.title as audioname',
    'audioes.audioimage as audioimage',
    'audioes.audio as audio',
    'audioes.id as audioid',
    'audioes.artist_id as artistid'
)->where('album_id', '=', $req->id)
->get();
$artist=Artist::all();

    $album=Album::all()->where('id', '=', $req->id);
    return View("frontend.pages.albumviewaudio", compact('Language','album','audio','artist'))->with(['Audioes' => $audio]);
}
// albumvedioview
public function albumviewvedio(Request $req){
    if ($req->session()->has('name')) {

        $lang_session = session()->get('name');
    } else {
        $lang_session = 1;
    }
    $Language = Language::orderBy('id', 'DESC')->get();
    $artist=Artist::all();
    $album=Album::all()->where('id', '=', $req->id);
    $vedio = VedioAlbum::join('albums', 'albums.id', 'vedioalbums.album_id')
    ->join('languages', 'languages.id', 'vedioalbums.language_id')
    ->join('vedioes', 'vedioes.id', 'vedioalbums.vedio_id')
    ->select(
        'vedioalbums.*',
        'languages.name as languagename',
        'albums.albumimage as albumimage',
        'albums.name as albumname',
        'vedioes.title as vedioname',
        'vedioes.vedioimage as vedioimage',
        'vedioes.vedio as vedio',
        'vedioes.artist_id as artistid'

        )
        ->get();
        $count=1;
        return View("frontend.pages.albumviewvedio",
         compact('Language','album','vedio','artist','count'))->with(['Audioes' => $vedio]);

}
    //Gnere
    public function gnere(Request $req)
    {
        if ($req->session()->has('name')) {

            $lang_session = session()->get('name');
        } else {
            $lang_session = 1;
        }
        $Language = Language::orderBy('id', 'DESC')->get();
        $gnere=Gnere::all();
        return view("frontend.pages.gnere",compact('Language','gnere'));
    }
    public function search(Request $req)
    {if ($req->session()->has('name')) {

        $lang_session = session()->get('name');
    } else {
        $lang_session = 1;
    }
    $Language = Language::orderBy('id', 'DESC')->get();
    $search=$req['search']??"";
    if($search !=""){
$audio=Audio::where('title', 'Like', '%'.$search.'%')->get();
$artist=Artist::where('name', 'Like', '%'.$search.'%')->get();
$vedio=Vedio::where('title', 'Like', '%'.$search.'%')->get();
$gnere=Gnere::where('name', 'Like', '%'.$search.'%')->get();
$audioalbum=Album::where('category','=','audio')->where('name', 'Like', '%'.$search.'%')->get();
$vedioalbum=Album::where('category','=','vedio')->where('name', 'Like', '%'.$search.'%')->get();
    }
    else{
$artist=Artist::all();
        $audio=Audio::all();
        $vedio=Vedio::all();
        $gnere=Gnere::all();
        $audioalbum=Album::where('category','=','audio')->get();
        $vedioalbum=Album::where('category','=','vedio')->get();
    }
       return view("frontend.search",compact('Language','audio','artist','vedio','audioalbum','vedioalbum','gnere'));

    }
}
