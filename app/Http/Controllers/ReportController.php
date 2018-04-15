<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;

class ReportController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $result = "";

        if($request->name === 'all' || $request->name === '')
        {
            $data = Report::orderBy('created_at', 'desc')->paginate(20);
            foreach ($data as $report) {

                $result.= "<tr data-id=".$report->report_id.">";
                    $result.= "<td>".$report->vehicle_number."</td>";    
                    $result.= "<td>".$report->driver_name."</td>";    
                    $result.= "<td>".$report->shore_tank_number."</td>";    
                    $result.= "<td>".$report->order_number."</td>";    
                    $result.= "<td>".$report->waybill_number."</td>";    
                    $result.= "<td>".$report->customer."</td>";    
                    $result.= "<td>".$report->obs_litres."</td>";    
                    $result.= "<td>".$report->obs_temperature."</td>";    
                    $result.= "<td>".$report->density."</td>";    
                    $result.= "<td>".$report->litres_at_15_deg."</td>";    
                    $result.= "<td>".$report->metric_tons_vac."</td>";    
                    $result.= "<td>".$report->metric_tons_air."</td>";    
                    $result.= "<td><i class='fa fa-trash modal-trigger' data-action='delete.report' data-target='delete-modal'></i>
                                <i class='fa fa-pencil modal-trigger' data-action='update.report' data-target='edit-modal'></i></td>";    
                $result.= "</tr>";
            }
        }
        else{

            $data = Report::where('user_id', $request->name)->orderBy('created_at', 'desc')->paginate(20);
            foreach ($data as $report) {
                $result.= "<tr data-id=".$report->report_id.">";
                    $result.= "<td>".$report->vehicle_number."</td>";    
                    $result.= "<td>".$report->driver_name."</td>";    
                    $result.= "<td>".$report->shore_tank_number."</td>";    
                    $result.= "<td>".$report->order_number."</td>";    
                    $result.= "<td>".$report->waybill_number."</td>";    
                    $result.= "<td>".$report->customer."</td>";    
                    $result.= "<td>".$report->obs_litres."</td>";    
                    $result.= "<td>".$report->obs_temperature."</td>";    
                    $result.= "<td>".$report->density."</td>";    
                    $result.= "<td>".$report->litres_at_15_deg."</td>";    
                    $result.= "<td>".$report->metric_tons_vac."</td>";    
                    $result.= "<td>".$report->metric_tons_air."</td>";    
                    $result.= "<td><i class='fa fa-trash modal-trigger' data-action='delete.report' data-target='delete-modal'></i>
                                <i class='fa fa-pencil modal-trigger' data-action='update.report' data-target='edit-modal'></i></td>";    
                $result.= "</tr>";
            }
        }
        return response()->json(['data' => $result]);
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
    public function update(Request $request, $id)
    {
        //
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
}
