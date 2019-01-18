<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Lock;
use App\Key;
use App\Form;
use Hash;
use DB;
use Carbon\Carbon;



class AdminController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }
  public function index()
  {
    $users = User::select('id')->count();
    $locks = Lock::select('id')->count();
    $keys = Key::select('id')->count();
    //$users = User::select('id')->count();
    $messages = Form::select('id')->count();

   //Cantidad de users Basicos
    $statBasic=DB::table('users')
    ->where('roleId', 0)
    ->count();

   //Cantidad de users Premium
    $statPremium=DB::table('users')
    ->where('roleId', 1)
    ->count();

    $monthsBasic =$this->queryRegistros(0);
    $monthsPremium =$this->queryRegistros(1);

    $year=now()->year;
    $month=date('m');
    $day=now()->day;

/*  <  for ($i=0; $i < 13 ; $i++) {
      if ($monthsBasic[$i]['fecha'] == $year.$month) {
        $regBasic[i]= $monthsBasic[$i]['contador'];
      }else{
        $regBasic[i]=0;
      }

    }
    */


    return view('pages/admin/dashboard',['users'=>$users,'locks'=>$locks,'keys'=>$keys, 'messages'=>$messages,'statBasic' => $statBasic,'statPremium' => $statPremium,'monthsPremium' => $monthsPremium,'monthsBasic' => $monthsBasic]);
  }
  public function users()
  {
    $users = User::all();
    $button = true;
    return view('pages/admin/users',['users'=>$users,'button'=>$button]);
  }
  public function messages()
  {
    $messages = Form::all();
    return view('pages/admin/messages',['messages'=>$messages]);
  }
  public function usersDeleted()
  {
    $users = User::onlyTrashed()->get();
    $button = false;
    return view('pages/admin/users',['users'=>$users,'button'=>$button]);
  }
  public function user($id)
  {
    $user = User::withTrashed()->find($id);

    return view('pages/admin/user',['user'=>$user]);
  }
  public function newUser()
  {
    return view('pages/admin/newUser');
  }
  public function insertUser(Request $request)
  {
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->roleId = $request->input('role');
    $user->save();

    $newUser = User::where('email',$request->input('email'))->first();

    return view('pages/admin/user',['user'=>$newUser]);
  }
  public function userDelete($id)
  {
    User::find($id)->delete();
    //$user = User::onlyTrashed()->find($id);
    return redirect()->action('AdminController@user', ['id' => $id]);
    //return view('pages/admin/user',['user'=>$user]);
  }
  public function userRecover($id)
  {
    User::onlyTrashed()->find($id)->restore();
    //$user = User::find($id);
    return redirect()->action('AdminController@user', ['id' => $id]);
    //return view('pages/admin/user',['user'=>$user]);
  }
  public function userEdit(Request $request, $id)
  {
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $user = User::find($id);
    if ($name != '') {
      $user->name = $name;
    }
    if ($email != '') {
      $user->email = $email;
    }
    if ($password != '') {
      $user->password = Hash::make($password);
    }
    $user->save();
    return view('pages/admin/user',['user'=>$user]);
  }
  public function userEditImg(Request $request, $id)
  {
    $image = $request->file('img');
    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
    $request->file('img')->storeAs('public/avatars', $input['imagename']);

    $user = User::find($id);
    if ($user->imgname != '') {
      Storage::delete('avatars/'.$user->imgname);
    }
    $user->imgname = $input['imagename'];
    $user->save();
    Auth::login($user);
    return view('pages/admin/user',['user'=>$user]);
  }
  public function keys()
  {
    $keys = Key::all();
    return view('pages/admin/keys',['keys'=>$keys]);
  }
  public function key($id)
  {
    $key = Key::find($id);
    return view('pages/admin/key',['key'=>$key]);
  }
  public function locks()
  {
    $locks = Lock::all();
    return view('pages/admin/locks',['locks'=>$locks]);
  }
  public function lockDelete($id){
    Lock::find($id)->delete();
    return view('pages/admin/dashboard');
  }
  public function lockUpdate(Request $request, $id){
    $lock=Lock::find($id);

    $lock->name = $request->input('newLockName');

    $lock->save();


    return view('pages/admin/lock',['lock'=>$lock]);
  }
  public function lockInsertPrivilege(Request $request, $id)
  {
    $lock = Lock::find($id);
    $email = $request->input('email');
    $mod = $request->input('role');
    $user = User::where('email', $email)->get();
    $lock->privileges()->attach($user,['privilege' => $mod]);

    return redirect()->action('AdminController@lock',['id'=>$lock->id]);
  }
  public function lock($id)
  {
    $lock = Lock::find($id);
    return view('pages/admin/lock',['lock'=>$lock]);
  }
  public function queryRegistros($roleId)
  {
  $months=DB::select("SELECT count(*) as contador, date_format(created_at, '%Y%m') as fecha FROM users WHERE roleId='$roleId' GROUP BY fecha ORDER BY fecha desc");
return $months;
}
}
