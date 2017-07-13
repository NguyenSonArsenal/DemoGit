<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use App\Http\Requests\BettingCreateRequest;

use App\Match;



class BettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request());
        $matches = Match::all(); //eloquent collections

        return view('admin.betting.index', compact('matches'));
    }


    function showDashboard()
    {
        return view('admin.dashboard');
    }


    function showDetail($id)
    {
        $match_detail = Match::find($id);

        return view('admin.betting.detail', compact('match_detail'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo 'page create';

        return view('admin.betting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
                'home_team_id' => 'required|max:50',
                'away_team_id' => 'required|max:50|different:home_team_id',
                'bet_home' => 'required|numeric|min:0',
                'bet_draw' => 'required|numeric|min:0',
                'bet_away' => 'required|numeric|min:0',
                'time_start_match' => 'required|before:time_end_match',
                'time_end_match' => 'required|after:time_start_match',
            ],[
                'away_team_id.different' => ' Away team name must not replace home team name',
                'time_start_match.before' => ' Time start match must before time end match',
            ]
        );

        //dd('You are successfully added all fields.');
        
        $input = $request->all();
        //dd($input);
        Match::create($input);

        return redirect()->route('betting.index')->with('message_created', 'A new match has created');  

    }

    // public function store(BettingCreateRequest $request)
    // {
        
    //     $input = $request->all();
    //     // dd($input);
    //     Match::create($input);

    //     return redirect()->route('betting.index')->with('message_created', 'A new match has created');  

    // }

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
        $match = Match::findOrFail($id);

        return view('admin.betting.edit', compact('match'));
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
        $match = Match::findOrFail($id);

        $active = isset($request->active) ? 1 : 0;

        //var_dump($active);die;

        if($active == 0) {
            $input = $request->all();
            $input['active'] = $active;
        } else {
            $input = $request->all();
        }

        //var_dump($input);die;
        // dd($input);

        $match->update($input);

        return redirect()->route('betting.index');    
    }

    public function updateScore($id)
    {
        $match = Match::findOrFail($id);
        return view('admin.betting.update_score',compact('match'));
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

        $match = Match::find($id);



        // if the match has public on web then not delete
        if ($match->active == 1 ) {

            if ($match->bets->count() > 0) {
                return redirect()->route("betting.index")->with('message_not_deleted', 'The match has betted then not delete');
            } else {
                Match::destroy($id);
                return redirect()->route("betting.index")->with('message_deleted', 'A match has deleted');
            }

        } else{

            Match::destroy($id);
            return redirect()->route("betting.index")->with('message_deleted', 'A match has deleted');

        }
    }


    // public function A()
    // {
    //     return 6;
    // }

    // function B(){
    //     return 12 + $this->A();
    // }



}
