@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List of people</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('individual.create') }}" class="btn btn-info" >Add person</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <th>Last Name</th>
               <th>C.I.</th>
               <th>Telephone</th>
               <th>Address</th>
               <th>Rol</th>
             </thead>
             <tbody>
              @if($individuals->count())  
              @foreach($individuals as $individual)  
              <tr>
                <td>{{$individual->name}}</td>
                <td>{{$individual->lastname}}</td>
                <td>{{$individual->ci}}</td>
                <td>{{$individual->telephone}}</td>
                <td>{{$individual->address}}</td>
                <td>{{$individual->rols_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('IndividualController@edit', $individual->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('IndividualController@destroy', $individual->id)}}" method="post">
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
      {{ $individuals->links() }}
    </div>
  </div>
</section>

@endsection