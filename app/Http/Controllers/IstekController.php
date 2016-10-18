<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Elan;
use Auth;
use Session;
use Carbon\Carbon;

class IstekController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      if (Auth::guest()) {
        Session::flash('istekerror' , "İstək əlavə etmək üçün daxil olun və yaxud qeydiyyatdan keçin keçin");
        return redirect('/login');
      }
  }

    public function show(){
      return view('pages.istek');
    }

    public function isteklerim(){
      $istekler = Elan::all();
    return view('pages.profilqeyd',compact('istekler'));
    }

     public function delete($id)
      {
        $isteksil=Elan::find($id);
        unlink('image/'.$isteksil->image);
        $isteksil->delete();
        return back();
      }

      public function edit($id){
        $istekedit = Elan::find($id);
      return view('pages.istekedit',compact('istekedit'));
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
        Session::flash('istekedited' , "İstəyiniz uğurla dəyişdirildi və yoxlamadan keçəndən sonra dərc olunacaq.");
        $istekedit = Elan::find($id);
        $istekedit->title = $req->title;
        $istekedit->location = $req->location;
        $istekedit->lat = $req->lat;
        $istekedit->lng = $req->lng;
        $istekedit->about = $req->about;
        $istekedit->image = $photoname;
        $istekedit->name = $req->name;
        $istekedit->email = $req->email;
        $istekedit->org = $req->org;
        $istekedit->nov = $req->nov;
        $istekedit->deadline = $req->date;
        $istekedit->phone = $req->phone;
        $istekedit->status = 0;
        $istekedit->update();
        return redirect("/istekedit/$istekedit->id");
      }

    public function store(Request $req){
      Session::flash('istekadded' , "İstəyiniz uğurla əlavə olundu və yoxlamadan keçəndən sonra dərc olunacaq.");
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


      $direction='image';
      $filetype=$req->file('image')->getClientOriginalExtension();
      $filename=time().'.'.$filetype;
      $req->file('image')->move(public_path('image'),$filename);

      $data = [
            'type_id'=>'2',
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
            'nov'=>$req->nov,
            'deadline'=>$req->date
          ];

       Auth::user()->elanlar()->create($data);
       return redirect('/isteklerim');
      }
}
