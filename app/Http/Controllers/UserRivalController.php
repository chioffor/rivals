<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rival;

class UserRivalController extends Controller
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
    public function store(Request $request, $id)
    {
        $user = $request->user();
        $rival = User::find($id);

        $user->rivals()->save($rival, ['status' => 'sent']);
        $rival->rivals()->save($user, ['status' => 'pending']);

        return redirect('/home/rivals/invite');
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

    
    public function update(Request $request, $id)
    {
        $user = $request->user();
        $rival = User::find($id);

        $user->rivals()->updateExistingPivot($rival->id, ['status' => 'connected']);
        $rival->rivals()->updateExistingPivot($user->id, ['status' => 'connected']);

        return redirect('/home/rivals/invite');

    }

    
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $rival = User::find($id);

        $user->rivals()->detach($rival->id);
        $rival->rivals()->detach($user->id);

        return redirect('/home/rivals/invite');
    }
}
