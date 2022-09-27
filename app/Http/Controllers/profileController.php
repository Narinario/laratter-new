<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Tweet;
use Auth;
use App\Models\User;
use App\Models\profile;


class profileController extends Controller
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
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile' => 'required | max:191'
        ]);
        if ($validator->fails()) {
            return redirect()
            ->route('profile.create')
            ->whithInput()
            ->withErrors($validator);
        };
        if (Profile::where('user_id', '=', Auth::user()->id)->exists()) {
            Profile::where('user_id', '=', Auth::user()->id)->update([
                'user_id' => Auth::user()->id,
                'profile' => $request->input('profile'),
                'updated_at' => now()
            ]);
        } else {
            $data = new Profile();
            $data->user_id = Auth::user()->id;
            $data->profile = $request->input('profile');
            $data->save();
        }
        return redirect()->route('tweet.index');
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
