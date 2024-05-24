@extends('layouts.app')

@section('content')

    <div>

        <h5>TITOLO:{{$comic->title}}</h5>
        <h3>{{$comic->original_title}}</h3>
        <div>{{$comic->series}}</div>
        <p class="card-text">{{$comic->description}}</p>
        <div>GENERE:{{$comic->type}}</div>
        <div>DATA:{{$comic->sale_date}}</div>


    </div>
    
@endsection