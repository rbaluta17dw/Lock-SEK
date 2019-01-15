<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Key;
use App\User;
use App\Lock;
use Auth;

class KeyController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

        $keys = Key::where('user_id', Auth::user()->id)->get();
        
        return view('pages/key/keys',['keys'=>$keys]);
        
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('pages/key/create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
<<<<<<< HEAD


=======
        
        
>>>>>>> c116f55d09d467d704907af9ef7a27dca40d4993
        $user = User::find(Auth::user()->id);

        $key = new Key;
        $key->name = $request->input('keyName');
        $key->device = 2;
        $key->user_id = $user->id;
        $key->lock_id = 2;
        $hashed = Hash::make($key->device.$key->user_id.$key->lock_id, [
            'rounds' => 12
            ]);
<<<<<<< HEAD
       //Aqui faltan cosas
       $key->save();

       Storage::put("/storage/keys/".time().".key", $hashed);

       return Storage::download("/storage/keys/".time().".key");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $key= Key::find($id);

        return view('pages/key/editKey')->with('key', $key);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $key=Key::find($id);

        $key->name = $request->input('newKeyName');

        $key->save();

        $keys = Key::where('user_id', Auth::user()->id)->get();

        return view('pages/key/keys',['keys'=>$keys]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        $key = Key::find($id);
        $key->delete();


        $keys = Key::where('user_id', Auth::user()->id)->get();

        return view('pages/key/keys',['keys'=>$keys]);;

=======
            //Aqui faltan cosas
            $key->save();
            Storage::put("/storage/keys/".time().".key", $hashed);
            return Storage::download("/storage/keys/".time().".key");  
        }
        
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            if (Key::where('id',$id)->exists()) {
                $key= Key::find($id);
                if (Auth::user()->id == $key->user_id) {
                    return view('pages/key/editKey')->with('key', $key);
                }else{
                    abort(404);
                }
            }else{
                abort(404);
            }
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            
            if (Key::where('id',$id)->exists()) {
                $key=Key::find($id);
                if (Auth::user()->id == $key->user_id){
                    $key->name = $request->input('newKeyName');
                    $key->save();
                    return view('pages/key/editKey',['key'=>$key]);
                }else{
                    abort(404);
                }
            }else{
                abort(404);
            }
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            if (Key::where('id',$id)->exists()) {
                
                $key = Key::find($id);
                if (Auth::user()->id == $key->user_id){
                    $key->delete();
                    $keys = Key::where('user_id', Auth::user()->id)->get();
                    return view('pages/key/keys',['keys'=>$keys]);;
                }else{
                    abort(404);  
                }
            }else{
                abort(404);
            }
        }
>>>>>>> c116f55d09d467d704907af9ef7a27dca40d4993
    }
    