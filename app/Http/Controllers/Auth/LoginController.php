<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use Storage;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        
        $messages = [
            'password.required' => 'Es necesario introducir una contraseña',
            'email.required' => 'Es necesario introducir un email',
        ];
        
        return Validator::make($data, [
            'email' => ['required'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password' => ['required'],
        ],$messages);
    }
    protected function redirectTo()
    {
      $role = Auth::user()->roleId;
      switch ($role) {
        case '1':
                return '/dashboard';
            break;
        case '2':
                return '/admin/dashboard';
            break;
        default:
                return '/home';
            break;
    }


    }

      /**
    * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $contents = file_get_contents($user->avatar_original);
            $name = $user->name . time() . '.' . 'jpg';
            Storage::put('public/avatars/'.$name, $contents);
            $newUser->imgname = $name;
            $newUser->email_verified_at = now();


            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }
}
