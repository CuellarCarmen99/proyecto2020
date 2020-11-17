<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills=bill::orderBy('id','DESC')->paginate(3);
        return view('bill.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'date'=>'required', 'amount'=>'required', 'clients_id'=>'required', 'employee_id'=>'required', 'sales_id'=>'required']);
        Bill::create($request->all());
        return redirect()->route('bill.index')->with('success','Record created successfully');
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
        $bill=bill::find($id);
        return view('bill.edit',compact('bill'));
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
        $this->validate($request,[ 'date'=>'required', 'amount'=>'required', 'clients_id'=>'required', 'employee_id'=>'required', 'sales_id'=>'required']);
        bill::find($id)->update($request->all());
        return redirect()->route('bill.index')->with('success','Record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::find($id)->delete();
        return redirect()->route('bill.index')->with('success','Record successfully deleted');
    }
}
