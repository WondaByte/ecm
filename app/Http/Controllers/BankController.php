<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    //
    public function dashboard()
    {
    	return view('pages.bank-dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = Bank::create($request->all());
        return response()->json(['error' => false, 'message' => 'Bank added sucessfully']);
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
        $bank = Bank::find($request->id);
        $bank->update($request->all());

        return response()->json(['error' => false, 'message' => 'Bank updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Bank::find($request->id)->delete();
        return response()->json(['error' => false, 'message' => 'Bank deleted successfully']);
    }
}
