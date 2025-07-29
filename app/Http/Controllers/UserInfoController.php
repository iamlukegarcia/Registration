<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Watchers;
use App\Models\Precinct;
use App\Models\User;
use App\Models\VotingTransaction;
use Illuminate\Support\Carbon;

$now = Carbon::now();
class UserInfoController extends Controller
{
    public function index(Request $request)
    {
        $UserID = Auth::user()->id;
        $name = DB::table('userinfo')->where('id', $UserID)->value('name');
        

       
        return view('UserInput', [
            'name' => $name,
        ]);
    }

    public function UpdateVote(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'numeric'],
            'vote' => ['required', 'numeric'],
        ]);
        $LastVoteUpdate = $request->LastVoteUpdate;
        $LastInvalidVoteUpdate = $request->LastInvalidVoteUpdate;
        $Registered = $request->Registered;
        $vote = $request->vote;
        $Invalidvote = $request->Invalidvote;
        $id = $request->id;
        $now = now();
        if ($LastVoteUpdate <= $vote && $LastInvalidVoteUpdate <= $Invalidvote && $vote <= $Registered ) {
            DB::table('voting_transactions')
                ->where('Precinct_id', $id)
                ->update(['NumberofVotes' => $vote, 'Invalid_Votes' => $Invalidvote, 'updated_at' => $now]);

            //Log transaction to Watchers log
            $FirstName = DB::table('watchers')->where('Precinct_id', $id)->value('FirstName');
            $LastName = DB::table('watchers')->where('Precinct_id', $id)->value('LastName');
            $BarangayID = DB::table('precincts')->where('PrecinctCode', $id)->value('Brgy_id');
            $BarangayName = DB::table('barangays')->where('brgy_id', $BarangayID)->value('brgyName');
            
            DB::table('watcherslogs')
            ->insert([
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'BrgyName' => $BarangayName,
                'NumberofVotes' => $vote,
                'Invalid_Votes' => $Invalidvote,
                'updated_at' => $now,
            ]);
            return redirect('userinput')->with('Success', 'Update Success!');
        }

        return back()
            ->withErrors([
                'LastVoteUpdate' => 'Please check your input',
            ])
            ->onlyInput('LastVoteUpdate');
    }
}
