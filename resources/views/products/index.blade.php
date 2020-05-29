@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex flex-column">
      <h1 class="display-3">Lista de Productos</h1>   
      <div>
      <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">Nuevo producto</a>
      </div>   
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
    @endif
    </div>
    </div>
      <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Foto</td>
            <td>Precio</td>
            <td colspan = 2>Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($products as $product)
          <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>
                <img src="{{ asset('storage').'/'.$product->photo}}" alt="{{$product->name}}" width="200" />
              </td>
              <td>{{$product->amount}}</td>
              <td>
                <p class="mb-1">
                  <a href="{{ route('products.show',$product->id)}}" class="btn btn-link">Ver</a>
                </p>
                <p class="mb-1">
                  <a href="{{ route('products.edit',$product->id)}}" class="btn btn-link">Editar</a>
                </p>
                  <p class="mb-0">
                    <form action="{{ route('products.destroy', $product->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                  </p>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>



@endsection