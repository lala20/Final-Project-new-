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
        unlink('image/'.$desteksil->image);
        $desteksil->delete();
        return back();
      }

    public function store(Request $req){

      $this->validate($req, [
      'title' => 'required',
          'about' => 'required',
          'location' => 'required',
          'lat' => 'required',
          'lng' => 'required',
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'image' => 'required',
          'nov' => 'required',
  ]);

      Session::flash('destekadded' , "Dəstəyiniz uğurla əlavə olundu və yoxlamadan keçəndən sonra dərc olunacaq.");
      $direction='image';
      $filetype=$req->file('image')->getClientOriginalExtension();
      $filename=time().'.'.$filetype;
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

    public function edit($id){
     $destekedit = Elan::find($id);
   return view('pages.destekedit',compact('destekedit'));
   }

   public function update($id , Request $req){
      //validate
      $this->validate($req, [
      'title' => 'required',
          'about' => 'required',
          'location' => 'required',
          'lat' => 'required',
          'lng' => 'required',
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'nov' => 'required',
  ]);
   if ($req->image == '') {
      $sekil = Elan::find($id);
      $photoname = $sekil->image;
   }else{
  // image upload
  $dir='image';
  $phototype=$req->file('image')->getClientOriginalExtension();
  $photoname=time().'.'.$phototype;
  $req->file('image')->move(public_path('image'),$photoname);

}
     Session::flash('destekedited' , "Dəstəyiniz uğurla dəyişdirildi və yoxlamadan keçəndən sonra dərc olunacaq.");
     $destekedit = Elan::find($id);
     $destekedit->title = $req->title;
     $destekedit->location = $req->location;
     $destekedit->lat = $req->lat;
     $destekedit->lng = $req->lng;
     $destekedit->about = $req->about;
     $destekedit->image = $photoname;
     $destekedit->name = $req->name;
     $destekedit->email = $req->email;
     $destekedit->org = $req->org;
     $destekedit->nov = $req->nov;
     $destekedit->deadline = $req->date;
     $destekedit->phone = $req->phone;
     $destekedit->status = 0;
     $destekedit->update();
     return redirect("/destekedit/$destekedit->id");
   }
}
