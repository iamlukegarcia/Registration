<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barangays;
use App\Models\School;
use App\Models\Watchers;
use App\Models\Precinct;
use App\Models\VotingTransaction;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
      
        $confirmed = DB::table('taxpayers')
                ->where('confirmed','Confirmed')
                ->count();
        
        
        return view('Reports')->with('confirmed', $confirmed);
    }

    public function test(Request $request)
    {
        $Baclarancount = DB::table('voting_transactions')->where('brgy_id', 1)->where('updated_at', '<>', null)->count();
        return $Baclarancount;
    }
}
