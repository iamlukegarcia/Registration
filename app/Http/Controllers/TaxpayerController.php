<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\taxpayer;
use DataTables;

class TaxpayerController extends Controller
{
    public function index(Request $request)
    {   
        
        if ($request->ajax()) {

            $data = taxpayer::query();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if ($row->confirmed !== "Confirmed")
                            {
                            $btn = '<button data-id="'.$row->id.'"  class="btn btn-sm btn-success confirm-btn"> Confirm </button>';
                            return $btn;
                        }
                        else
                            return '<span class="text-gray"> </span>';
                           
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('Taxpayers');
    }

    public function confirm($id)
    {
        $taxpayer = taxpayer::findOrFail($id);
        $taxpayer-> confirmed = "Confirmed";
        $taxpayer->save();

        return response()->json(['success' => true]);
    }

}
