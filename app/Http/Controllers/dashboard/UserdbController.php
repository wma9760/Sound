<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Country,User as MainTable};
use Illuminate\Support\Facades\Hash;


class UserdbController extends Controller
{
    public $table="dashboard.users";
    public $redirect="user";
    public function index()
    {
        $data=MainTable::join('countries','countries.id','users.country_id')
        ->select('users.*','countries.name as countriesname')
        ->orderBy('created_at','desc')->paginate(5);
        $count=1;
         return View($this->table.".user",compact('data','count'))->with([$this->redirect.'s'=>$data]);
    }
    public function create()
{
     $countries = Country::all();
        return View($this->table.".create",compact('countries'));

}
public function store(Request $req)
{   $req->validate([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
    'mobileNo' => ['required', 'numeric', 'min:11'],
    'gender' => ['required', 'string'],
    'address' => ['required', 'string', 'max:255' ],
    'country_id' => ['required', 'string'],
    'userimage' =>['required','mimes:jpeg,png,jpg,gif,svg'],
]);



    if($req->hasfile('userimage'))
    {
        $file = $req->file('userimage');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('frontend/images/users', $filename);
    }

    $user = new MainTable;
    $user->name = $req->name;
    $user->gender = $req->gender;
    $user->mobileNo = $req->mobileNo;
    $user->address = $req->address;
    $user->country_id = $req->country_id;
    $user->email = $req->email;
    $user->type = $req->type;
    $user->password = Hash::make($req['password']);
    $user->userimage = $filename;


    $user->save();
    return redirect()->route($this->redirect.".index");

}

public function delete(Request $req)
{
    MainTable::destroy($req->id);
    return redirect()->route($this->redirect.".index");
}
public function update(Request $req)
{
    $countries=Country::all();
    $data=MainTable::find($req->id);
        return View($this->table.".update",compact('countries'))->with([$this->redirect=>$data]);

}

public function updatedb(Request $req)
{
    $user=MainTable::find($req->id);
    $req->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'mobileNo' => ['required', 'numeric', 'min:11'],
        'gender' => ['required', 'string'],
        'address' => ['required', 'string', 'max:255' ],
        'country_id' => ['required', 'string'],
        'userimage' =>['mimes:jpeg,png,jpg,gif,svg'],
    ]);


 if($req->file('userimage')!=null)
 {
     $file = $req->file('userimage');
     $extenstion = $file->getClientOriginalExtension();
     $filename ='User'.rand(1,9999999999).$req->id. time().'.'.$extenstion;
     $file->move('frontend/images/users', $filename);
     $user->userimage = $filename;
 }
    $user->name = $req->name;
    $user->gender = $req->gender;
    $user->type = $req->type;
    $user->mobileNo = $req->mobileNo;
    $user->address = $req->address;
    $user->country_id = $req->country_id;
    $user->email = $req->email;
    $user->save();
    return redirect()->route($this->redirect.".index");
}
public function user(Request $req )
{
  $data=MainTable::where('users.id',$req->id)
    ->join('countries','countries.id','users.country_id')
    ->select('users.*','countries.name as countriesname')
    ->get();

    return View($this->table.".userprofile",compact('data'))->with([$this->redirect.'s'=>$data]);
}
}
