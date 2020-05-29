@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">El producto</h1>
        <div class="container">
            <ul class="list-unstyled">
                <li>{{$product->name}}</td>
                <li>{{$product->description}}</td>
                <li>                <img src="{{ asset('storage').'/'.$product->photo}}" alt="{{$product->name}}" width="200" /></td>
                <li>{{$product->amount}}</td>
            <ul>
        </div> 
    </div>
</div>
        
@endsection