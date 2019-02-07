<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Lock;
use App\Key;
use App\Notification;
use App\Form;
use Hash;
use DB;
use Carbon\Carbon;
use Storage;



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


    for ($i=0; $i <= 11 ; $i++) {
      $registros[$i] = User::whereMonth('created_at', Carbon::now()->subMonths($i))->count();
    }
    for ($i=0; $i <= 11 ; $i++) {
      $months[$i] = Carbon::parse(Carbon::now()->subMonths($i))->month ;
    }


return view('pages/admin/dashboard',['users'=>$users,'locks'=>$locks,'keys'=>$keys, 'messages'=>$messages,'statBasic' => $statBasic,'statPremium' => $statPremium,'monthsPremium' => $monthsPremium,'monthsBasic' => $monthsBasic,'registros' => $registros,'months' => $months]);
}
public function profile(){
  return view('pages/user/profile');
  }
  public function settings(){

    return view('pages/admin/settings');
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
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha creado el usuario ". $user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha creado el usuario ". $user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->user_id = $user->id;
  $notification->save();
  $newUser = User::where('email',$request->input('email'))->first();

  return view('pages/admin/user',['user'=>$newUser]);
}
public function userDelete($id)
{

  $user = User::find($id);
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha eliminado el usuario ". $user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha eliminado el usuario ". $user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 0;
  $notification->user_id = $user->id;
  $notification->save();
  $user->delete();

  //$user = User::onlyTrashed()->find($id);
  return redirect()->action('AdminController@user', ['id' => $id]);
  //return view('pages/admin/user',['user'=>$user]);
}
public function userRecover($id)
{
  $user = User::onlyTrashed()->find($id);
  $user->restore();
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha desbaneado el usuario ". $user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha desbaneado el usuario ". $user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->user_id = $user->id;
  $notification->save();
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
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha editado el usuario ". $user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha editado el usuario ". $user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->user_id = $user->id;
  $notification->save();

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
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha editado la imagen del usuario ". $user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha editado la imagen del usuario ". $user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->user_id = $user->id;
  $notification->save();
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
public function newKey()
{
  $locks = Lock::all();
  $user = User::all();
  return view('pages/admin/newKey',['locks'=>$locks, 'users'=>$user]);
}
public function insertKey(Request $request)
{
  $key = new Key;
  $key->name = $request->input('name');
  $key->device = rand(10000, 999999999);
  $key->user_id = $request->input('user');
  $key->lock_id = $request->input('lock');
  $user = User::find($key->user_id);
  $lock = Lock::find($key->lock_id);
  $key->save();
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha creado la llave ". $key->name." para el usuario ".$user->email. " para la cerradura ".$lock->name;
  $notification->message = "El administrador ".Auth::user()->email." ha creado la llave ". $key->name." para el usuario ".$user->email. " para la cerradura ".$lock->name." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->user_id = $user->id;
  $notification->key_id = $key->id;
  $notification->lock_id = $lock->id;
  $notification->save();
  $keys = Key::all();
  return view('pages/admin/keys',['keys'=>$keys]);
}
public function locks()
{
  $locks = Lock::all();
  return view('pages/admin/locks',['locks'=>$locks]);
}
public function newLock()
{
  $locks = Lock::all();
  $user = User::all();
  return view('pages/admin/newLock',['locks'=>$locks, 'users'=>$user]);
}
public function insertLock(Request $request)
{
  $lock = new Lock;
  $lock->name = $request->input('name');
  $lock->serial_n = $request->input('serial_n');
  $lock->user_id = $request->input('user');
  $lock->save();
  $user = User::find($lock->user_id);
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha creado la cerradura ". $lock->name." para el usuario ".$user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha creado la cerradura ". $lock->name." para el usuario ".$user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->user_id = $user->id;
  $notification->lock_id = $lock->id;
  $notification->save();
  $locks = Lock::all();
  return view('pages/admin/locks',['locks'=>$locks]);
}
public function lockDelete($id){
  $lock = Lock::find($id);
  $user = User::find($lock->user->id);
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha eliminado la cerradura ". $lock->name." para el usuario ".$user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha eliminado la cerradura ". $lock->name." para el usuario ".$user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->lock_id = $lock->id;
  $notification->user_id = $user->id;
  $notification->save();
  $lock->delete();
  return view('pages/admin/dashboard');
}
public function lockUpdate(Request $request, $id){
  $lock=Lock::find($id);
  $user = User::find($lock->user->id);
  $lock->name = $request->input('newLockName');
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha actualizado la cerradura ". $lock->name." para el usuario ".$user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha actualizado la cerradura ". $lock->name." para el usuario ".$user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->lock_id = $lock->id;
  $notification->user_id = $user->id;
  $notification->save();
  $lock->save();


  return view('pages/admin/lock',['lock'=>$lock]);
}
public function lockInsertPrivilege(Request $request, $id)
{
  $lock = Lock::find($id);
  $email = $request->input('email');
  $mod = $request->input('role');
  $user = User::where('email', $email)->first();
  $lock->privileges()->attach($user,['privilege' => $mod]);
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha dado acceso a la cerradura ". $lock->name." para el usuario ".$user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha dado acceso a la cerradura ". $lock->name." para el usuario ".$user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->lock_id = $lock->id;
  $notification->user_id = $user->id;
  $notification->save();
  return redirect()->action('AdminController@lock',['id'=>$lock->id]);
}
public function lockDeletePrivilege($lock, $user)
{
  $lock = Lock::find($lock);
  $user = User::find($user);
  $notification = new Notification;
  $notification->title = "El administrador ".Auth::user()->email." ha quitado acceso a la cerradura ". $lock->name." para el usuario ".$user->email;
  $notification->message = "El administrador ".Auth::user()->email." ha quitado acceso a la cerradura ". $lock->name." para el usuario ".$user->email." el ".date("Y-m-d H:i:s");
  $notification->marker = 5;
  $notification->notificable = 1;
  $notification->lock_id = $lock->id;
  $notification->user_id = $user->id;
  $notification->save();
  $lock->privileges()->detach($user);

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
