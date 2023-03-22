<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Language, Gnere, Artist,Slider, Vedio as MainTable};
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

class VediodbController extends Controller
{

    public $table = "dashboard.vedio";
    public $redirect = "vedio";

    public function index()
    {
        $data = MainTable::join('gneres', 'gneres.id', 'vedioes.gnere_id')
            ->join('languages', 'languages.id', 'vedioes.language_id')
            ->join('artists', 'artists.id', 'vedioes.artist_id')
            ->select('vedioes.*', 'languages.name as laguagename', 'gneres.name as gnerename', 'artists.name as artistname')
            ->where('vedioes.aproval', '=', 1)->orderBy('created_at','desc')->paginate(5);
        $count = 1;
        $notification = MainTable::join('gneres', 'gneres.id', 'vedioes.gnere_id')
            ->join('languages', 'languages.id', 'vedioes.language_id')
            ->join('artists', 'artists.id', 'vedioes.artist_id')
            ->select('vedioes.*', 'languages.name as laguagename', 'gneres.name as gnerename', 'artists.name as artistname')
            ->where('vedioes.aproval', '=', 0)->count();
        return View($this->table . ".vedio", compact('data', 'count','notification'))->with([$this->redirect . 's' => $data]);
    }
    public function uservedio()
    {
        $data = MainTable::join('gneres', 'gneres.id', 'vedioes.gnere_id')
            ->join('languages', 'languages.id', 'vedioes.language_id')
            ->join('artists', 'artists.id', 'vedioes.artist_id')
            ->select('vedioes.*', 'languages.name as laguagename', 'gneres.name as gnerename', 'artists.name as artistname')
            ->where('vedioes.aproval', '=', 0)
            ->orderBy('created_at','desc')->paginate(5);
        $count = 1;

        return View($this->table . ".uservedio", compact('data', 'count'))->with([$this->redirect . 's' => $data]);
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
        return view('frontend.pages.addvedio', compact('languages', 'artists', 'gneres','Language'));
    }
    public function store(Request $req)
    {

        $req->validate([
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'audioimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'vedio' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime|max:500000',
            'language_id'=>'required',
            'artist_id'=>'required',
            'gnere_id'=>'required',
        ]);


        if ($req->hasfile('vedioimage')) {
            $file = $req->file('vedioimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'vedio' . time() . $req->id . rand() . '.' . $extenstion;
            $file->move('frontend/images/vedio', $filename);
        }
        if ($req->hasFile('vedio')) {
            $vediofile = $req->file('vedio');
            $extenstion = $vediofile->getClientOriginalExtension();
            $vedioname = 'vedio' . time() . $req->id . rand() . '.' . $extenstion;
            $vediofile->move('frontend/storage/vedio', $vedioname);
        }
        $vedio = new MainTable;
        $vedio->vedio = $vedioname;
        $vedio->title = $req->title;
        $vedio->language_id = $req->language_id;
        $vedio->artist_id = $req->artist_id;
        $vedio->gnere_id = $req->gnere_id;
        $vedio->vedioimage = $filename;
        $vedio->desc = $req->desc;
        $vedio->featured = $req->featured;
        $vedio->trending = $req->trending;
        $vedio->recommended = $req->recommended;
        $vedio->status = $req->status;
        if (is_null($vedio->featured = $req->featured) || empty($vedio->featured = $req->featured)) {
            $vedio->featured = 0;
        }
        if (is_null($vedio->trending = $req->trending) || empty($vedio->trending = $req->trending)) {
            $vedio->trending = 0;
        }
        if (is_null($vedio->recommended = $req->recommended) || empty($vedio->recommended = $req->recommended)) {
            $vedio->recommended = 0;
        }
        if (is_null($vedio->status = $req->status) || empty($vedio->status = $req->status)) {
            $vedio->status = 0;
        }
        if (auth()->user()->type == 'admin') {
            $vedio->aproval = 1;
        } else {
            $vedio->aproval = 0;
        }

        $vedio->save();
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
            'vedio' => 'mimetypes:video/avi,video/mpeg,video/quicktime|max:500000',
            'language_id'=>'required',
            'artist_id'=>'required',
            'gnere_id'=>'required',
        ]);

        $vedio = MainTable::find($req->id);
        if ($req->file('userimage') != null) {
            $file = $req->file('vedioimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'vedio' . time() . $req->id . rand() . '.' . $extenstion;
            $file->move('frontend/images/vedio', $filename);
            $vedio->vedioimage = $filename;
        }
        if ($req->file('vedio') != null) {
            $vediofile = $req->file('vedio');
            $extenstion = $vediofile->getClientOriginalExtension();
            $vedioname = 'vedio' . time() . $req->id . rand() . '.' . $extenstion;
            $vediofile->move('frontend/storage/vedio', $vedioname);
            $vedio->vedio = $vedioname;
        }
        $vedio->title = $req->title;
        $vedio->language_id = $req->language_id;
        $vedio->artist_id = $req->artist_id;
        $vedio->gnere_id = $req->gnere_id;
        $vedio->desc = $req->desc;
        $vedio->featured = $req->featured;
        $vedio->trending = $req->trending;
        $vedio->recommended = $req->recommended;
        $vedio->status = $req->status;
        if (is_null($vedio->featured = $req->featured) || empty($vedio->featured = $req->featured)) {
            $vedio->featured = 0;
        }
        if (is_null($vedio->trending = $req->trending) || empty($vedio->trending = $req->trending)) {
            $vedio->trending = 0;
        }
        if (is_null($vedio->recommended = $req->recommended) || empty($vedio->recommended = $req->recommended)) {
            $vedio->recommended = 0;
        }
        if (is_null($vedio->status = $req->status) || empty($vedio->status = $req->status)) {
            $vedio->status = 0;
        }

        $vedio->save();
        return redirect()->route($this->redirect . ".index");
    }
    public function aprove(Request $req)
    {
        $vedio = MainTable::find($req->id);
        $vedio->aproval = 1;

        $vedio->save();

        return redirect()->route($this->redirect . ".index");

}
}