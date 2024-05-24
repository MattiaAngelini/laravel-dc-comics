@extends('layouts.app')

@section('content')


<h1>COMICS LIST:</h1>

<section class="d-flex flex-wrap container">
@foreach ($comics as $comic)

 <div class="card" style="width: 16rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$comic->title}}</h5>
      <h3>{{$comic->original_title}}</h3>
      <div>{{$comic->series}}</div>
      <p class="card-text">{{$comic->description}}</p>
      <div>GENERE:{{$comic->type}}</div>
      <div>DATA:{{$comic->sale_date}}</div>
    </div>
  </div>

@endforeach
</section>

    
@endsection