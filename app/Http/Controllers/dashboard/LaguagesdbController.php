<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Language as MainTable};

class LaguagesdbController extends Controller
{
    public $table="dashboard.language";
    public $redirect="language";
    public function index()
    {
        $data=MainTable::orderBy('created_at','desc')->paginate(5);
        $count=1;

         return View($this->table.".language",compact('data','count'))->with([$this->redirect.'s'=>$data]);
    }
    public function create()
    {
        return View($this->table.".create");
    }


    public function store(Request $req)
    {  $req->validate([
        'name' => 'required|max:255',
    ]);
        $language=new MainTable();
        $language->name=$req->name;
        $language->save();
        return redirect()->route($this->redirect.".index");
    }


    public function delete(Request $req)
    {
        MainTable::destroy($req->id);
        return redirect()->route($this->redirect.".index");
    }


    public function update(Request $req)
    {
        $data=MainTable::find($req->id); // select * from categories
        return View($this->table.".update")->with([$this->redirect=>$data]);

    }


    public function updatedb(Request $req)
    {
         $req->validate([
            'name' => 'required|max:255',
        ]);
        $language=MainTable::find($req->id);
        $language->name=$req->name;
        $language->save();
        return redirect()->route($this->redirect.".index");
    }
}
