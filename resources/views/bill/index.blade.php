@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List of bills</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('bill.create') }}" class="btn btn-info" >Add bill</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Date</th>
               <th>Amount</th>
               <th>Client</th>
               <th>Employee</th>
               <th>Sale</th>
             </thead>
             <tbody>
              @if($bills->count())  
              @foreach($bills as $bill)  
              <tr>
                <td>{{$bill->date}}</td>
                <td>{{$bill->amount}}</td>
                <td>{{$bill->clients_id}}</td>
                <td>{{$bill->employee_id}}</td>
                <td>{{$bill->sales_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('BillController@edit', $bill->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('BillController@destroy', $bill->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">There is no record !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $bills->links() }}
    </div>
  </div>
</section>

@endsection