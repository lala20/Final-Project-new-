<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Elan;
use App\User;
use Auth;
class AdminController extends Controller
{
  public function _construct()
  {

  }

  public function index()
  {
     return view('admin.index');
  }
  public function login()
  {
     return view('auth.login-admin');
  }

  public function postLogin(Request $request)
  {

    $validator= validator($request->all(), [
      'email' => 'required|min:3|max:100',
      'password' => 'required|min:3|max:100',
  ]);

    //  return view('admin.index');
    if ($validator->fails() ) {
        return redirect('/alfagen/login')
                ->withErrors($validator)
                ->withInput();
    }
    $details=['email' => $request->get('email'), 'password' => $request->get('password')];
    if (auth()->guard('admin')->attempt($details) )
    {
      return redirect('/alfagen');
    }
    else
    {
      return redirect('/alfagen/login')
              ->withErrors(['errors' => 'Duzgun deyl!'])
              ->withInput();
    }
  }
    public function logout()
    {
      auth()->guard('admin')->logout();
      return redirect('/alfagen/login');
    }


  public function lists()
  {
     return view('admin.index');
  }

  public function desteklist()
  {
    $destekler=Elan::all();
     return view('admin.desteklist',compact('destekler'));
  }

  public function isteklist()
  {
     $istekler=Elan::all();
     return view('admin.isteklist',compact('istekler'));
  }

  public function userlist()
  {
     $users=User::all();
     return view('admin.userlist', compact('users'));
  }

   public function activate($id)
  {
    $status=Elan::find($id);
    $status->status='1';
    $status->save();
    return back();
  }

   public function deactivate($id)
  {
    $status=Elan::find($id);
    $status->status='0';
    $status->save();
    return back();
  }
}
