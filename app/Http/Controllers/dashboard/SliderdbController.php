<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Slider as MainTable};

class SliderdbController extends Controller
{
    public $table = "dashboard.slider";
    public $redirect = "slider";
    public function index()
    {
        $data = MainTable::orderBy('created_at', 'desc')->paginate(5);
        $count = 1;

        return View($this->table . ".slider", compact('data', 'count'))->with([$this->redirect . 's' => $data]);
    }
    public function create()
    {
        return View($this->table . ".create");
    }


    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'gnereimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ]);
        $slider = new MainTable();

        $file = $req->file('sliderimage');
        $extenstion = $file->getClientOriginalExtension();
        $filename = 'Slider' . rand(1,9999999999) . $req->id . time() . '.' . $extenstion;
        $file->move('frontend/images/slider', $filename);

        $slider->title = $req->title;
        $slider->sliderimage = $filename;
        $slider->status = $req->status;

        if (is_null($slider->status = $req->status) || empty($slider->status = $req->status)) {
            $slider->status = 0;
        }
        $slider->save();
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
            'gnereimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ]);

        $slider = MainTable::find($req->id);

        if ($req->file('sliderimage') != null) {
            $file = $req->file('sliderimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Slider' . rand(1,9999999999) . $req->id . time() . '.' . $extenstion;
            $file->move('frontend/images/slider', $filename);
            $slider->sliderimage = $filename;
        }
        $slider->title = $req->title;
        $slider->status = $req->status;
        if (is_null($slider->status = $req->status) || empty($slider->status = $req->status)) {
            $slider->status = 0;
        }
        $slider->save();
        return redirect()->route($this->redirect . ".index");
    }
}
