<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Language, Gnere, Artist,Slider, Audio as MainTable};

class AudiodbController extends Controller
{
    public $table = "dashboard.audio";
    public $redirect = "audio";
    public function index()
    {
        $data = MainTable::join('gneres', 'gneres.id', 'audioes.gnere_id')
            ->join('languages', 'languages.id', 'audioes.language_id')
            ->join('artists', 'artists.id', 'audioes.artist_id')
            ->select('audioes.*', 'languages.name as laguagename', 'gneres.name as gnerename', 'artists.name as artistname')
            ->where('audioes.aproval', '=', 1)->orderBy('created_at','desc')->paginate(5);
        $count = 1;
        $notification = MainTable::join('gneres', 'gneres.id', 'audioes.gnere_id')
            ->join('languages', 'languages.id', 'audioes.language_id')
            ->join('artists', 'artists.id', 'audioes.artist_id')
            ->select('audioes.*', 'languages.name as laguagename', 'gneres.name as gnerename', 'artists.name as artistname')
            ->where('audioes.aproval', '=', 0)->count();
        return View($this->table . ".audio", compact('data', 'count','notification'))->with([$this->redirect . 's' => $data]);
    }
    public function useraudio()
    {
        $data = MainTable::join('gneres', 'gneres.id', 'audioes.gnere_id')
            ->join('languages', 'languages.id', 'audioes.language_id')
            ->join('artists', 'artists.id', 'audioes.artist_id')
            ->select('audioes.*', 'languages.name as laguagename', 'gneres.name as gnerename', 'artists.name as artistname')
            ->where('audioes.aproval', '=', 0)
            ->orderBy('created_at','desc')->paginate(5);
        $count = 1;

        return View($this->table . ".useraudio", compact('data', 'count'))->with([$this->redirect . 's' => $data]);
    }

    public function create()
    {
        $languages = Language::all();
        $Language = Language::all();
        $artists = Artist::all();
        $gneres = Gnere::all();
        if (auth()->user()->type == 'admin') {

            return View($this->table . ".create", compact('languages', 'artists', 'gneres'));
        }
        return view('frontend.pages.addAudio', compact('languages', 'artists', 'gneres','Language'));
    }
    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'audioimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:500000',
            'language_id'=>'required',
            'artist_id'=>'required',
            'gnere_id'=>'required',
        ]);
        if ($req->hasfile('audioimage')) {
            $file = $req->file('audioimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Audio' . rand(1,9999999999).time() . $req->id  . '.' . $extenstion;
            $file->move('frontend/images/audio', $filename);
        }
        if ($req->hasFile('audio')) {
            $audiofile = $req->file('audio');
            $extenstion = $audiofile->getClientOriginalExtension();
            $audioname = 'Audio' . rand(1,9999999999).time() . $req->id  . '.' . $extenstion;
            $audiofile->move('frontend/storage/audio', $audioname);
        }
        $audio = new MainTable;
        $audio->title = $req->title;
        $audio->language_id = $req->language_id;
        $audio->artist_id = $req->artist_id;
        $audio->gnere_id = $req->gnere_id;
        $audio->audioimage = $filename;
        $audio->audio = $audioname;
        $audio->desc = $req->desc;
        $audio->featured = $req->featured;
        $audio->trending = $req->trending;
        $audio->recommended = $req->recommended;
        $audio->status = $req->status;
        if (is_null($audio->featured = $req->featured) || empty($audio->featured = $req->featured)) {
            $audio->featured = 0;
        }
        if (is_null($audio->trending = $req->trending) || empty($audio->trending = $req->trending)) {
            $audio->trending = 0;
        }
        if (is_null($audio->recommended = $req->recommended) || empty($audio->recommended = $req->recommended)) {
            $audio->recommended = 0;
        }
        if (is_null($audio->status = $req->status) || empty($audio->status = $req->status)) {
            $audio->status = 0;
        }
        if (auth()->user()->type == 'admin') {
            $audio->aproval = 1;
        } else {
            $audio->aproval = 0;
        }

        $audio->save();
        if (auth()->user()->type == 'admin') {

            return redirect()->route($this->redirect . ".index");
        }
        $lang_session=session()->get('name');
        $data = Slider::all();
        $artist = Artist::all()->where('language_id','=',$lang_session)
        ->where('status', '=', 1)
        ->where('featured', '=', 1);
        $Language = Language::orderBy('id', 'DESC')->get();

        return View('frontend.home', compact('data', 'artist', 'Language', ))->with(['sliders' => $data]);
        }
    public function delete(Request $req)
    {
        MainTable::destroy($req->id);
        return redirect()->route($this->redirect . ".index");
    }
    public function update(Request $req)
    {
        $gneres = Gnere::all();
        $languages = Language::all();
        $artists = Artist::all();
        $data = MainTable::find($req->id);
        return View($this->table . ".update", compact('languages', 'artists', 'gneres'))->with([$this->redirect => $data]);
    }
    public function updatedb(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'audioimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'audio' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:500000',
            'language_id'=>'required',
            'artist_id'=>'required',
            'gnere_id'=>'required',
        ]);

        $audio = MainTable::find($req->id);
        if ($req->file('audioimage') != null) {
            $file = $req->file('audioimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Audio' . rand(1,9999999999).time() . $req->id  .'.' . $extenstion;
            $file->move('frontend/images/audio', $filename);
            $audio->audioimage = $filename;
        }
        if ($req->file('audio') != null) {
            $audiofile = $req->file('audio');
            $extenstion = $audiofile->getClientOriginalExtension();
            $audioname = 'Audio' . rand(1,9999999999).time() . $req->id  . '.' . $extenstion;
            $audiofile->move('frontend/storage/audio', $audioname);
            $audio->audio = $audioname;
        }
        $audio->title = $req->title;
        $audio->language_id = $req->language_id;
        $audio->artist_id = $req->artist_id;
        $audio->gnere_id = $req->gnere_id;
        $audio->desc = $req->desc;
        $audio->featured = $req->featured;
        $audio->trending = $req->trending;
        $audio->recommended = $req->recommended;
        $audio->status = $req->status;
        if (is_null($audio->featured = $req->featured) || empty($audio->featured = $req->featured)) {
            $audio->featured = 0;
        }
        if (is_null($audio->trending = $req->trending) || empty($audio->trending = $req->trending)) {
            $audio->trending = 0;
        }
        if (is_null($audio->recommended = $req->recommended) || empty($audio->recommended = $req->recommended)) {
            $audio->recommended = 0;
        }
        if (is_null($audio->status = $req->status) || empty($audio->status = $req->status)) {
            $audio->status = 0;
        }

        $audio->save();
        return redirect()->route($this->redirect . ".index");
    }
    public function aprove(Request $req)
    {
        $audio = MainTable::find($req->id);
        $audio->aproval = 1;

        $audio->save();

        return redirect()->route($this->redirect . ".index");

}
}