@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List of categories</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('category.create') }}" class="btn btn-info" >Add category</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <th>Description</th>
             </thead>
             <tbody>
              @if($categories->count())  
              @foreach($categories as $category)  
              <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('CategoryController@edit', $category->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
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
      {{ $categories->links() }}
    </div>
  </div>
</section>

@endsection