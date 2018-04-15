<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'phone' => 'required',
        ]);

        if ($request->password != $request->password_confirmation){
            
            return response()->json(['error' => true, 'message' => 'password and password confirmation do not match!']);
        }
        else{

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
            ]);

            DB::table('role_user')->insert(['user_id' => $user->user_id, 'role_id' => $request->role]);
            return response()->json(['error' => false, 'message' => 'User added successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->password != $request->password_confirmation){
            
            return response()->json(['error' => true, 'message' => 'password and password confirmation do not match!']);
        }
        /*else{
            
            $user = User::find($request->input('id'));
            $user->update($request->all());
            return response()->json(['error' => false, 'message' => 'updated successfully']);
        }*/
        dd($request->all());
        // return response()->json(['error' => false, 'message' => 'Subject updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->input('id'))->delete();
        DB::table('role_user')->where('user_id', $user->user_id)->delete();
        return response()->json(['error' => false, 'message' => 'user removed successfully']);   
    }
}
