@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Sales List</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('sale.create') }}" class="btn btn-info" >Add Sale</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Quantity</th>
               <th>Product</th>
               <th>Provider</th>
             </thead>
             <tbody>
              @if($sales->count())  
              @foreach($sales as $sale)  
              <tr>
                <td>{{$sale->quantity}}</td>
                <td>{{$sale->products_id}}</td>
                <td>{{$sale->providers_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('SaleController@edit', $sale->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('SaleController@destroy', $sale->id)}}" method="post">
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
      {{ $sales->links() }}
    </div>
  </div>
</section>

@endsection