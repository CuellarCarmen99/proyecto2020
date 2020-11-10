@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Productos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('product.create') }}" class="btn btn-info" >Añadir Producto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <th>Price</th>
               <th>Expiration</th>
               <th>Existence</th>
               <th>Category</th>
               <th>Provider</th>
             </thead>
             <tbody>
              @if($products->count())  
              @foreach($products as $product)  
              <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->expiration}}</td>
                <td>{{$product->existence}}</td>
                <td>{{$product->categories_id}}</td>
                <td>{{$product->providers_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ProductController@edit', $product->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $products->links() }}
    </div>
  </div>
</section>

@endsection