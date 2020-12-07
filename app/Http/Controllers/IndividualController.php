<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\individual;

class IndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individuals=individual::orderBy('id','DESC')->paginate(3);
        return view('individual.index',compact('individuals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('individual.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'ci'=>'required', 'telephone'=>'required', 'address'=>'required', 'rols_id'=>'required']);
        Individual::create($request->all());
        return redirect()->route('individual.index')->with('success','Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $individual=individual::find($id);
        return view('individual.edit',compact('individual'));
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
        $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'ci'=>'required', 'telephone'=>'required', 'address'=>'required', 'rols_id'=>'required']);
        individual::find($id)->update($request->all());
        return redirect()->route('individual.index')->with('success','Record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Individual::find($id)->delete();
        return redirect()->route('individual.index')->with('success','Record successfully deleted');
    }
}
