<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{VedioAlbum  as MainTable, Language, Album, Vedio};


class VedioAlbumController extends Controller
{
    public $table = "dashboard.vedioalbum";
    public $redirect = "vedioalbum";
    public function index()
    {
        $data =  MainTable::join('albums', 'albums.id', 'vedioalbums.album_id')
            ->join('languages', 'languages.id', 'vedioalbums.language_id')
            ->join('vedioes', 'vedioes.id', 'vedioalbums.vedio_id')
            ->select('vedioalbums.*', 'languages.name as languagename', 'albums.albumimage as albumimage', 'albums.name as albumname', 'vedioes.title as vedioname')
            ->orderBy('created_at', 'desc')->paginate(5);
        $count = 1;

        return View($this->table . ".vedioalbum", compact('data', 'count'))->with([$this->redirect . 's' => $data]);
    }
    public function create()
    {
        $languages = Language::all();
        $albums = Album::all()->where('category', '=', 'vedio');
        $vedioes = Vedio::all();
        return View($this->table . ".create", compact('languages', 'albums', 'vedioes'));
    }
    public function store(Request $req)
    {
        $req->validate([
            'album_id' => 'required',
            'vedio_id' => 'required',
            'language_id' => 'required',

        ]);


        $vedioalbum = new MainTable;
        $vedioalbum->album_id = $req->album_id;
        $vedioalbum->language_id = $req->language_id;
        $vedioalbum->vedio_id = $req->vedio_id;


        $vedioalbum->save();
        return redirect()->route($this->redirect . ".index");
    }
    public function delete(Request $req)
    {
        MainTable::destroy($req->id);
        return redirect()->route($this->redirect . ".index");
    }
    public function update(Request $req)
    {
        $languages = Language::all();
        $albums = Album::all();
        $vedioes = Vedio::all();
        $data = MainTable::find($req->id);
        return View($this->table . ".update", compact('languages', 'albums', 'vedioes'))->with([$this->redirect => $data]);
    }
    public function updatedb(Request $req)
    {
        $req->validate([
            'album_id' => 'required',
            'vedio_id' => 'required',
            'language_id' => 'required',

        ]);

        $vedioalbum = MainTable::find($req->id);
        $vedioalbum->album_id = $req->album_id;
        $vedioalbum->language_id = $req->language_id;
        $vedioalbum->vedio_id = $req->vedio_id;
        $vedioalbum->save();
        return redirect()->route($this->redirect . ".index");
    }
}
