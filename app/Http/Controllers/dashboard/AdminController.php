<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Artist, Audio,Vedio,AudioAlbum,VedioAlbum};


class AdminController extends Controller
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
  
    public function index()
    {   
        $artist=Artist::all()->count();
        $user=User::all()->count();
        $audio=Audio::all()->count();
        $vedio=Vedio::all()->count();
        $audio_album=AudioAlbum::all()->count();
        $vedio_album=VedioAlbum::all()->count();
        $tracks=Audio:: join('artists', 'artists.id', 'audioes.artist_id')
        ->select('audioes.*',  'artists.name as artistname') 
        ->latest()->take(5)->get();
        
        return view("dashboard.admin",compact('artist','user','audio','vedio','audio_album','vedio_album','tracks'))->with(['tracks'=>$tracks]);
    }
}
