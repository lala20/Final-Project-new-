<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use App\Elan;
use App\User;
use Auth;
use DateTime;

class PagesController extends Controller
{
  public function index()
  {
      $datas=Elan::orderBy('created_at','desc')->take(4)->get();
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

      return view('pages.index',compact('datas','datamaps'));
  }

    public function haqqimizda(){
      return view('pages.haqqimizda');
    }

    public function elaqe(){
      return view('pages.elaqe');
    }

    public function single($id){
        $single = Elan::find($id);
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
      $filename=rand(11111,99999).'.'.$filetype;
      $req->file('image')->move(public_path('image/'),$filename);

      $data = [
            'avatar'=>$filename
          ];

       Auth::user()->update($data);
       return redirect('/profil');
      }



    public function update(Request $req) //yeniiiiii
    {
      Auth::user()->update($req->all());
      return redirect('/profil');
    }
    public function desteklerim(){
    return view('pages.profilqatqi');
    }


}
