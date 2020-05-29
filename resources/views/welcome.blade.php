@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="d-flex flex-column">
            <h1 class="display-3">La super tienda</h1>
            <h2 class="h2">Lista de Productos</h2>   
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
                    <a href="{{ route('details', $product->id)}}" class="btn btn-link">Ver</a>
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection