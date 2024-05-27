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
      <div class="">
        <form action="">
          <button type="button" class="btn btn-info mt-2">MODIFICA</button>
        </form>
        <form action="{{route('comics.destroy',['comic' => $comic->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mt-2">ELIMINA</button>
        </form>
      </div>
   
    </div>
  </div>

@endforeach
</section>

    
@endsection