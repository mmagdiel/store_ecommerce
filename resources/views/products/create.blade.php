@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Agregar un producto</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="description">Descripción:</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <div class="form-group">
              <label for="file">Foto:</label>
              <input type="file" class="form-control" name="file"/>
          </div>

          <div class="form-group">
              <label for="amount">Precio:</label>
              <input type="text" class="form-control" name="amount"/>
          </div>                      
          <button type="submit" class="btn btn-primary">Añadir producto</button>
      </form>
  </div>
</div>
</div>
@endsection