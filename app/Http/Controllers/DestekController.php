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
      // dd($sonEls);
      if ($sonEls != null) {
        $he=1;
      return view('pages.destek', compact('sonEls', 'he'));
      }else{
        $he=0;
        return view('pages.destek', compact('he'));
      }
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

       $this->validate($req, [
        'title' => 'required',
            'view' => 'required',
            'about' => 'required',
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'required',
            'org' => 'required',
            'nov' => 'required',
            'deadline' => 'required',
    ]);

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
