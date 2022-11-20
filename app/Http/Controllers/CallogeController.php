<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallogeRequest;
use App\Models\Calloge;
use Illuminate\Http\Request;

class CallogeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Calloge.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calloge  $calloge
     * @return \Illuminate\Http\Response
     */
    public function show(Calloge $calloge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calloge  $calloge
     * @return \Illuminate\Http\Response
     */
    public function edit(Calloge $calloge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calloge  $calloge
     * @return \Illuminate\Http\Response
     */
    public function update(CallogeRequest $request,$calloge)
    {
        $data=$request->validated();
        // dd($data);
        $calloge=Calloge::findOrFail($calloge);
        $calloge->update($data);
        return redirect(route('collage.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calloge  $calloge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calloge $calloge)
    {
        //
    }
}
