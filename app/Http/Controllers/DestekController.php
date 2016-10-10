<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Elan;
use Auth;
use Session;

class DestekController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      if (Auth::guest()) {
        Session::flash('destekerror' , "Dəstək əlavə etmək üçün daxil olun və yaxud qeydiyyatdan keçin keçin");
        return redirect('/login');
      }
  }
    public function show(){
      $sonEls=Elan::orderBy('created_at','desc')->first();
      return view('pages.destek', compact('sonEls'));
    }

    public function desteklerim(){
      $destekler = Elan::all();
    return view('pages.profilqatqi',compact('destekler'));
    }

         public function delete($id) //yeni gunel
      {
        $desteksil=Elan::find($id);
        $desteksil->delete();
        return back();
      }

    public function store(Request $req){
      Session::flash('destekadded' , "Dəstəyiniz uğurla əlavə olundu və yoxlamadan keçəndən sonra dərc olunacaq.");
      $direction='image';
      $filetype=$req->file('image')->getClientOriginalExtension();
      $filename=rand(11111,99999).'.'.$filetype;
      $req->file('image')->move(public_path('image'),$filename);

      $data = [
            'type_id'=>'1', //yeni gunel
            'title'=>$req->title,
            'view' => '0',
            'about'=>$req->about,
            'location'=>$req->location,
            'lat'=>$req->lat,
            'lng'=>$req->lng,
            'name'=>$req->name,
            'phone'=>$req->phone,
            'email'=>$req->email,
            'image'=>$filename,
            'org'=>$req->org,
            'nov'=>$req->nov
          ];

        Auth::user()->elanlar()->create($data);
        return redirect('/desteklerim');
    }
}
