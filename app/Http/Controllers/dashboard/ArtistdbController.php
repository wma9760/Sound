<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use App\Models\Artist as MainTable;

use App\Models\Language;use Illuminate\Http\Request;

class ArtistdbController extends Controller
{
    public $table = "dashboard.artist";
    public $redirect = "artist";
    public function index()
    {
        $data = MainTable::join('languages', 'languages.id', 'artists.language_id')
            ->select('artists.*', 'languages.name as laguagename')
            ->orderBy('created_at', 'desc')->paginate(5);
        $count = 1;
        return View($this->table . ".artist", compact('data', 'count'))->with([$this->redirect . 's' => $data]);
    }
    public function create()
    {
        $languages = Language::all();
        return View($this->table . ".create", compact('languages'));
    }
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'artistimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'DOB' => 'required' | 'date',
            'language_id' => 'required',

        ]);

        if ($req->hasfile('artistimage')) {
            $file = $req->file('artistimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Artist' . rand(1, 99999999999) . time() . '.' . $extenstion;
            $file->move('frontend/images/artist', $filename);
        }

        $artist = new MainTable;
        $artist->name = $req->name;
        $artist->language_id = $req->language_id;
        $artist->DOB = $req->DOB;
        $artist->desc = $req->desc;
        $artist->featured = $req->featured;
        $artist->trending = $req->trending;
        $artist->recommended = $req->recommended;
        $artist->status = $req->status;
        $artist->artistimage = $filename;
        if (is_null($artist->featured = $req->featured) || empty($artist->featured = $req->featured)) {
            $artist->featured = 0;
        }
        if (is_null($artist->recommended = $req->recommended) || empty($artist->recommended = $req->recommended)) {
            $artist->recommended = 0;
        }
        if (is_null($artist->trending = $req->trending) || empty($artist->trending = $req->trending)) {
            $artist->trending = 0;
        }
        if (is_null($artist->status = $req->status) || empty($artist->status = $req->status)) {
            $artist->status = 0;
        }
        $artist->save();

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
        $languages = Language::all();
        return View($this->table . ".update", compact('languages'))->with([$this->redirect => $data]);

    }

    public function updatedb(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'artistimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
            'DOB' => 'required' | 'date',
            'language_id' => 'required',

        ]);
        $artist = MainTable::find($req->id);

        if ($req->file('artistimage') != null) {
            $file = $req->file('artistimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Artist' . rand(1, 99999999999) . time() . '.' . $extenstion;
            $file->move('frontend/images/artist', $filename);
            $artist->artistimage = $filename;
        }
        $artist->name = $req->name;
        $artist->DOB = $req->DOB;
        $artist->desc = $req->desc;
        $artist->language_id = $req->language_id;
        $artist->featured = $req->featured;
        $artist->trending = $req->trending;
        $artist->recommended = $req->recommended;
        $artist->status = $req->status;

        if (is_null($artist->featured = $req->featured) || empty($artist->featured = $req->featured)) {
            $artist->featured = 0;
        }
        if (is_null($artist->trending = $req->trending) || empty($artist->trending = $req->trending)) {
            $artist->trending = 0;
        }
        if (is_null($artist->recommended = $req->recommended) || empty($artist->recommended = $req->recommended)) {
            $artist->recommended = 0;
        }
        if (is_null($artist->status = $req->status) || empty($artist->status = $req->status)) {
            $artist->status = 0;
        }
        $artist->save();
        return redirect()->route($this->redirect . ".index");

    }

//

    public function artist(Request $req)
    {
        $data = MainTable::find($req->id);

//   echo $data;
        return View($this->table . ".artistprofile", compact('data'))->with([$this->redirect . 's' => $data]);
    }
    public function view(Request $req)
    {
        $data = MainTable::find($req->id);
    }
}