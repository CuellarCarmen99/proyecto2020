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
              <a href="{{ route('person.create') }}" class="btn btn-info" >Add person</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <th>Last Name</th>
               <th>CI</th>
               <th>Telephone</th>
               <th>Address</th>
               <th>Rol</th>
             </thead>
             <tbody>
              @if($people->count())  
              @foreach($people as $person)  
              <tr>
                <td>{{$person->name}}</td>
                <td>{{$person->lastname}}</td>
                <td>{{$person->ci}}</td>
                <td>{{$person->telephone}}</td>
                <td>{{$person->address}}</td>
                <td>{{$person->rols_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('PersonController@edit', $person->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('PersonController@destroy', $person->id)}}" method="post">
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
      {{ $people->links() }}
    </div>
  </div>
</section>

@endsection