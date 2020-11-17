@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List of providers</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('provider.create') }}" class="btn btn-info" >Add provider</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <th>Telephone</th>
               <th>Address</th>
               <th>Web_site</th>
               
             </thead>
             <tbody>
              @if($providers->count())  
              @foreach($providers as $provider)  
              <tr>
                <td>{{$provider->name}}</td>
                <td>{{$provider->telephone}}</td>
                <td>{{$provider->address}}</td>
                <td>{{$provider->web_site}}</td>
                
                <td><a class="btn btn-primary btn-xs" href="{{action('ProviderController@edit', $provider->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ProviderController@destroy', $provider->id)}}" method="post">
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
      {{ $providers->links() }}
    </div>
  </div>
</section>

@endsection