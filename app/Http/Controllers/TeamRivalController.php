<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamRivalController extends Controller
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
        $team1Id = $request->input('team1');
        $team2Id = $request->input('team2');

        $matchDate = $request->input('date');
        $matchTime = $request->input('time');

        if (
            is_numeric($team1Id) and 
            is_numeric($team2Id) and 
            $team1Id !== $team2Id and 
            $matchDate !== NULL and 
            $matchTime !== NULL
        ) {
            
            $team1 = Team::find($team1Id);
            $team2 = Team::find($team2Id);

            if (!$team1->rivals->contains($team2) and !$team2->rivals->contains($team1)) {

                $team1->rivals()->save($team2, [
                    'match_date' => $matchDate,
                    'match_time' => $matchTime,
                ]);

                $team2->rivals()->save($team1, [
                    'match_date' => $matchDate,
                    'match_time' => $matchTime,
                ]);

                return view('admin.teams.fix', [
                    'teams' => Team::all(),
                    'team1' => $team1->name,
                    'team2' => $team2->name,
                    'matchDate' => $matchDate,
                    'matchTime' => $matchTime,
                ]);
            }
            else {
                return redirect('/teams/fix-a-match');
            }
        }

        return redirect('/teams/fix-a-match');
        
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
