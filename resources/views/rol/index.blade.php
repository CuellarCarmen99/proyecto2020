@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Rols List</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('rol.create') }}" class="btn btn-info" >Add Rol</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
             </thead>
             <tbody>
              @if($rols->count())  
              @foreach($rols as $rol)  
              <tr>
                <td>{{$rol->name}}</td>
                
                <td><a class="btn btn-primary btn-xs" href="{{action('RolController@edit', $rol->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('RolController@destroy', $rol->id)}}" method="post">
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
      {{ $rols->links() }}
    </div>
  </div>
</section>

@endsection