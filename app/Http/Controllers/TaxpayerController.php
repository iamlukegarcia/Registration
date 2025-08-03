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
                            $editBtn = '<button data-id="'.$row->id.'" data-guest="'.$row->GuestName.'" class="btn btn-sm btn-warning edit-btn ">  Edit  </button>';
                            return  $editBtn. ' ' . $btn;
                       
                            }
                        else
                            return '<span class="text-gray"> </span>';
                        
                          
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('Taxpayers');
    }

    public function updateGuest(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:taxpayers,id',
            'guest_name' => 'required|string|max:255',
        ]);

        $taxpayer = Taxpayer::findOrFail($request->id);
        $taxpayer->GuestName = $request->guest_name;
        $taxpayer->save();

        return response()->json(['success' => true]);
    }


    public function confirm($id)
    {
        $taxpayer = taxpayer::findOrFail($id);
        $taxpayer-> confirmed = "Confirmed";
        $taxpayer->save();

        return response()->json(['success' => true]);
    }

}
