<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $jumlahUser = User::where('role', 'User')->count();
        return view('user.konten.index', [
            'jumlahUser' => $jumlahUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        return view('user.konten.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = "Edit Profile";
        $user = User::where('username', $username)->first();
        return view('user.konten.edit', [
            'user'  => $user,
            'title' => $title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // return dd($request);
        $title = "Profile";

        if (empty($request->file('images'))) {
            $user = User::where('username', $username)->first();
            $user->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'number_phone'  => $request->number_phone,
                'address'       => $request->address,
                // 'images' => $request->file('images') -> store('image-user'),
            ]);
        } else {
            $user = User::where('username', $username)->first();
            Storage::delete($user->images);
            $user->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'email'         => $request->email,
                'number_phone'  => $request->number_phone,
                'address'       => $request->address,
                'images'        => $request->file('images')->store('image-user'),
            ]);
        }


        return view('user.konten.show', [
            'user'  => $user,
            'title' => $title
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function table()
    {
        $i =1;
        $user = User::all();
        return view('user.konten.table', [
            'user' => $user,
            'i' => $i
        ]);
    }
}
