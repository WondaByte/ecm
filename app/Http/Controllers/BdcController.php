<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bdc;

class BdcController extends Controller
{
    
    public function dashboard()
    {
    	return view('pages.bdc-dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = Bdc::create($request->all());
        return response()->json(['error' => false, 'message' => 'Bdc added sucessfully']);
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
        $bdc = Bdc::find($request->id);
        $bdc->update($request->all());

        return response()->json(['error' => false, 'message' => 'Bdc updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Bdc::find($request->id)->delete();
        return response()->json(['error' => false, 'message' => 'Bdc deleted successfully']);
    }
}
