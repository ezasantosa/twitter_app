<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\User;
use App\Http\Requests;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        return view('User');
    }

    public function getProfile()
    {
        $userId = Auth::id();
        $users = DB::table('users')->where('id', '=', $userId)->get();
        return View::make('profile')->with('users', $users);
    }

    public function saveProfile(Request $request){


        $userId = Auth::id();
        $user = New User;
        $data_profile = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => $request->password
                        ];

        $user->where('id', $userId)->update($data_profile);

        $response = ['title' => 'Sukses', 'message' => 'Data berhasil diubah', 'type' => 'success'];

        return response()->json($response);

    }
}
