<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use App\Elan;
use App\User;
use App\Contact;
use Auth;
use DateTime;
use Session;
use Mail;
class PagesController extends Controller
{
  public function index()
  {
      $datas=Elan::orderBy('created_at','desc')->get();
      $datamaps=Elan::all();
      foreach ($datamaps as $check_date) {
      $dbdate=new DateTime($check_date->deadline);
      $newdate=new DateTime('now');
      $diff = date_diff($newdate,$dbdate);
      if ($diff->d == 0 && $diff->m==0) {
        $check_date->status = 0;
        $check_date->update();
      }

    }

      return view('pages.index',compact('datas','datamaps','diff'));
  }

    public function haqqimizda(){
      return view('pages.haqqimizda');
    }

    public function elaqe(){
      return view('pages.elaqe');
    }

    public function single($id){

        $single = Elan::find($id);
        if ($single->status == 0) {
          return redirect('/');
        }
        $single->view = $single->view+1;
        $date = $single->deadline;
        $dbdate=new DateTime($date);
        $newdate=new DateTime('now');
        $diff = date_diff($newdate,$dbdate);
        if (!$diff->d== 0) {
          $single->update();
        }
        elseif ($diff->d == 0 && $diff->m) {
        $single->status = 0;
        $single->save();
        return redirect('/');
      }

      return view('pages.single',compact('single','diff'));
    }

    public function desteklist()
    {
      $desteklist=Elan::paginate(6);
      return view('pages.ds',compact('desteklist'));
    }
        public function isteklist()
    {
      $isteklist=Elan::paginate(2);
      return view('pages.isteklist',compact('isteklist'));
    }
     public function profil(){
       $city=City::all();
    return view('pages.profil', compact('city'));
    }

        public function avatar(Request $req)
    {
      $direction='image/';
      $filetype=$req->file('image')->getClientOriginalExtension();
      $filename=time().'.'.$filetype;
      $req->file('image')->move(public_path('image/'),$filename);

      $data = [
            'avatar'=>$filename
          ];

       Auth::user()->update($data);
       return redirect('/profil');
      }




    public function update(Request $data) //yeniiiiii
    {
      $dat = [
            'username' => $data['username'],
            'name' => $data['name'],
            'phone' => '+994'.$data['operator'].$data['phone'],
            'email' => $data['email'],
            'city' => $data['city']
        ];
        Auth::user()->update($dat);
      return redirect('/profil');
    }
    public function desteklerim(){
    return view('pages.profilqatqi');
    }

    public function elaqesave(Request $request)
    {
      $this->validate($request, [
         'name' => 'required',
         'surname' => 'required',
         'email' => 'required',
         'message' => 'required',
      ]);
      $data=[
        'name' => $request->name,
        'surname' => $request->surname,
        'email' => $request->email,
        'contactMessage' => $request->message,
      ];
      Mail::send('pages.contactMail',$data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('alfagen4@gmail.com');
      });


      $send = new Contact;
      $send->create($request->all());
      Session::flash('send', 'İsmarıcınız müvəffəqiyyətlə göndərildi.');
      return back();
    }

}
