<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{AudioAlbum  as MainTable ,Language,Album,Audio, Vedio};


class AudioAlbumController extends Controller
{
    public $table = "dashboard.audioalbum";
    public $redirect = "audioalbum";
    public function index()
    {
        $data =  MainTable::join('albums', 'albums.id', 'audioalbums.album_id')
            ->join('languages', 'languages.id', 'audioalbums.language_id')
            ->join('audioes', 'audioes.id', 'audioalbums.audio_id')
            ->select('audioalbums.*', 'languages.name as languagename','albums.albumimage as albumimage','audioes.audioimage as audioimage', 'albums.name as albumname', 'audioes.title as audioname')
            ->orderBy('created_at','desc')->paginate(5);
            $count=1;
        return View($this->table . ".audioalbum", compact('data','count'))->with([$this->redirect . 's' => $data]);
    }
    public function create()
    {
        $languages = Language::all();
        $albums = Album::all()->where('category','=','audio');
        $audioes = Audio::all();
        return View($this->table . ".create", compact('languages', 'albums', 'audioes'));
    }
    public function store(Request $req)
{
    $req->validate([
        'album_id' => 'required',
        'audio_id' => 'required',
        'language_id'=>'required',

    ]);

    $audioalbum = new MainTable;
    $audioalbum->album_id = $req->album_id;
    $audioalbum->language_id = $req->language_id;
    $audioalbum->audio_id = $req->audio_id;


    $audioalbum->save();
    return redirect()->route($this->redirect.".index");

}
public function delete(Request $req)
{
    MainTable::destroy($req->id);
    return redirect()->route($this->redirect.".index");
}
public function update(Request $req)
{

    $languages = Language::all();
    $albums = Album::all();
    $audioes = Audio::all();
    $data=MainTable::find($req->id);
        return View($this->table.".update",compact('languages', 'albums', 'audioes'))->with([$this->redirect=>$data]);

}
public function updatedb(Request $req)
{   $req->validate([
    'album_id' => 'required',
    'audio_id' => 'required',
    'language_id'=>'required',

]);

    $audioalbum=MainTable::find($req->id);
    $audioalbum->album_id = $req->album_id;
    $audioalbum->language_id = $req->language_id;
    $audioalbum->audio_id = $req->audio_id;
    $audioalbum->save();
    return redirect()->route($this->redirect.".index");
}
    }

