<?php

namespace App\Http\Controllers;

use App\Home;
use Auth;
use View;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = DB::table('twitter')->select('user_id', 'status')->orderBy('id', 'desc')->get();
       // return view('home');
        $data = DB::table('twitter as t')
                ->join('users as u', 'u.id', '=', 't.user_id')
                ->select('t.user_id', 't.status', 'u.name' )
                ->orderBy('t.id', 'desc')
                ->get();
        return View::make('home')->with('data', $data);
    }

    public function getData(){

        $datas = DB::table('twitter as t')
                ->join('users as u', 'u.id', '=', 't.user_id')
                ->select('t.user_id', 't.status', 'u.name' )
                ->orderBy('t.id', 'desc')
                ->get();

        return View::make('home')->with('data', $datas);
        //return View::make('home')->with('datas', $datas);
       
    }


     public function save(Request $request){

        $home = New Home;
        $user_id =  Auth::id();

        $home->user_id          = $user_id;
        $home->status           = $request->status;
        //$home->date             = date('Y-m-d H:i:s');
        $home->save();

        $response = ['title' => 'Sukses', 'message' => 'Data berhasil disimpan', 'type' => 'success'];


        

        return response()->json($response);

    }

    public function upload() {
        if(Input::hasFile('file')) {
          //upload an image to the /img/tmp directory and return the filepath.
          $file = Input::file('file');
          $tmpFilePath = '/img/tmp/';
          $tmpFileName = time() . '-' . $file->getClientOriginalName();
          $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
          $path = $tmpFilePath . $tmpFileName;
          return response()->json(array('path'=> $path), 200);
        } else {
          return response()->json(false, 200);
        }
    }
}
