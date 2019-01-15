<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\KeyEditRequest;
use App\Http\Requests\CreateKeyRequest;
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
    public function store(CreateKeyRequest $request)
    {

     

        $user = User::find(Auth::user()->id);
        $validated = $request->validated();

        $key = new Key;
        $key->name = $request->input('keyName');
        $key->device = 2;
        $key->user_id = $user->id;
<<<<<<< HEAD
        $key->lock_id = $request->input('lock');
=======
        $key->lock_id = 1; 
>>>>>>> cbb73bdf74c57d4406b90c7010f30da398d7e1eb
        $hashed = Hash::make($key->device.$key->user_id.$key->lock_id, [
            'rounds' => 12
            ]);
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

<<<<<<< HEAD
=======



>>>>>>> cbb73bdf74c57d4406b90c7010f30da398d7e1eb
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
        public function update(KeyEditRequest $request, $id)
        {
            $validated = $request->validated();

            if (Key::where('id',$id)->exists()) {
                $key=Key::find($id);
                if (Auth::user()->id == $key->user_id){
                    $key->name = $request->input('newKeyName');
                    $key->save();
                    //return view('pages/key/editKey',['key'=>$key]);
                    return redirect()->action('KeyController@edit',['key'=>$key]);
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
                    //return view('pages/key/keys',['keys'=>$keys]);
                    return redirect()->action('KeyController@index');
                }else{
                    abort(404);
                }
            }else{
                abort(404);
            }
        }
    }
