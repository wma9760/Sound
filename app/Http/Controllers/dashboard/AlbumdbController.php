<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{VedioAlbum, AudioAlbum, Audio, Album as MainTable, Artist, Vedio};

use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class AlbumdbController extends Controller
{
    public $table = "dashboard.album";
    public $redirect = "album";
    public function index()
    {
        $data = MainTable::orderBy('created_at', 'desc')->paginate(5);
        $count = 1;
        return View($this->table . ".album", compact('data', 'count'))->with([$this->redirect . 's' => $data]);
    }
    public function create()
    {
        return View($this->table . ".create");
    }
    public function store(Request $req)
    {

      $req->validate([
            'name' => 'required|unique:albums|max:255',
            'albumimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'desc' => 'required|max:255',
            'category'=>'required',
        ]);

        $album = new MainTable();
        if ($req->hasfile('albumimage')) {
            $file = $req->file('albumimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('frontend/images/album', $filename);
        }
        $album->name = $req->name;
        $album->albumimage = $filename;
        $album->desc = $req->desc;
        $album->category = $req->category;
        $album->featured = $req->featured;
        $album->trending = $req->trending;
        $album->recommended = $req->recommended;
        $album->status = $req->status;
        if (is_null($album->featured = $req->featured) || empty($album->featured = $req->featured)) {
            $album->featured = 0;
        }
        if (is_null($album->trending = $req->trending) || empty($album->trending = $req->trending)) {
            $album->trending = 0;
        }
        if (is_null($album->recommended = $req->recommended) || empty($album->recommended = $req->recommended)) {
            $album->recommended = 0;
        }
        if (is_null($album->status = $req->status) || empty($album->status = $req->status)) {
            $album->status = 0;
        }

        $album->save();


        return redirect()->route($this->redirect . ".index");
    }
    public function delete(Request $req)
    {
        MainTable::destroy($req->id);
        return redirect()->route($this->redirect . ".index");
    }
    public function update(Request $req)
    {
        $data = MainTable::find($req->id);
        return View($this->table . ".update")->with([$this->redirect => $data]);
    }
    public function updatedb(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'category'=>'required',
            'albumimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500000',

        ]);


        $album = MainTable::find($req->id);

        if($req->file('albumimage')!=null)
        {
            $file = $req->file('albumimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Album'.rand(1,9999999999).time().'.'.$extenstion;
            $file->move('frontend/images/album', $filename);
            $album->albumimage = $filename;
        }


        $album->name = $req->name;
        $album->desc = $req->desc;
        $album->category = $req->category;
        $album->featured = $req->featured;
        $album->trending = $req->trending;
        $album->recommended = $req->recommended;
        $album->status = $req->status;
        if (is_null($album->featured = $req->featured) || empty($album->featured = $req->featured)) {
            $album->featured = 0;
        }
        if (is_null($album->trending = $req->trending) || empty($album->trending = $req->trending)) {
            $album->trending = 0;
        }
        if (is_null($album->recommended = $req->recommended) || empty($album->recommended = $req->recommended)) {
            $album->recommended = 0;
        }
        if (is_null($album->status = $req->status) || empty($album->status = $req->status)) {
            $album->status = 0;
        }

        $album->save();
        return redirect()->route($this->redirect . ".index");
    }
    public function albumlist(Request $req)
    {
        $data = MainTable::all()->where('id', '=', $req->id);
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
            )
            ->get();
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
        $artist = Artist::all();

        $count = 1;
        return View($this->table . ".albumList", compact('data', 'artist', 'audio', 'vedio', 'count'))->with([$this->redirect . 's' => $data]);
    }
    public function play(Request $req)
    {
        $data = Vedio::all()->where('id', '=', $req->id);
        return View($this->table . ".playvedio", compact('data'))->with([$this->redirect . 's' => $data]);
    }
}
