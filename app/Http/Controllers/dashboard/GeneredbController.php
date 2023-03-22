<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Gnere as MainTable};

class GeneredbController extends Controller
{
    public $table="dashboard.gnere";
    public $redirect="gnere";
    public function index()
    {
        $data=MainTable::orderBy('created_at','desc')->paginate(5);
        $count=1;
         return View($this->table.".gnere",compact('data','count'))->with([$this->redirect.'s'=>$data]);
    }
    public function create()
    {
        return View($this->table.".create");
    }


    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'gnereimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ]);
        $gnere=new MainTable();
        $file = $req->file('gnereimage');
        $extenstion = $file->getClientOriginalExtension();
        $filename = 'Gnere'.rand(1,9999999999).$req->id.time().'.'.$extenstion;
        $file->move('frontend/images/gnere', $filename);

$gnere->name = $req->name;
$gnere->gnereimage = $filename;
$gnere->status = $req->status;

    if(is_null( $gnere->status = $req->status) || empty( $gnere->status = $req->status)){
        $gnere->status=0;
    }
    $gnere->save();
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
            'gnereimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500000',
        ]);
        $gnere=MainTable::find($req->id);

        if($req->file('gnereimage')!=null)
        {
            $file = $req->file('gnereimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Gnere'.rand(1,9999999999).$req->id.time().'.'.$extenstion;
            $file->move('frontend/images/gnere', $filename);
            $gnere->gnereimage = $filename;
           }
               $gnere->name = $req->name;
               $gnere->status = $req->status;
               if(is_null( $gnere->status = $req->status) || empty( $gnere->status = $req->status)){
                   $gnere->status=0;
               }
               $gnere->save();
               return redirect()->route($this->redirect.".index");
           }
}
